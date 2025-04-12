<?php

namespace App\Services;

use App\Models\ProductImage;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductService
{
    public function __construct(
        protected ProductRepositoryInterface $repository
    ) {}

    public function getAllProducts()
    {
        return $this->repository->all();
    }

    public function getProduct(int $id)
    {
        return $this->repository->find($id);
    }

    public function createProduct(array $data)
    {
        return $this->repository->create($this->normalizeProductData($data));
    }

    public function handleProductAttributes($productId, array $data ,$type)
    {
        // Xử lý colors
        if (isset($data)) {
            $this->syncAttributes($productId, $type, $data);
        }
    }

    protected function syncAttributes($productId, $type, array $values)
    {
        // Xóa toàn bộ attributes cũ của loại này
        $this->repository->deleteAttributesByType($productId, $type);

        if (!empty($values)) {
            $this->repository->addAttributes($productId, $type, $values);
        }
    }

    public function updateProduct(int $id, array $data)
    {
        return $this->repository->update($id, $this->normalizeProductData($data));
    }

    public function deleteProduct(int $id)
    {
        return $this->repository->delete($id);
    }
    protected function normalizeProductData(array $data): array
    {
        return array_merge($data, [
            'alias' => Str::slug($data['name']),
            'status' => $data['status'] ?? 'active',
            'category_id' => $data['category_id'] ?? null,
            'description' => $data['description'] ?? null,
        ]);
    }

    public function handleProductImages(int $productId, string $imageDataJson, string $deletedImagesJson)
    {
        $imageData = json_decode($imageDataJson, true) ?? [];

        $deletedImages = json_decode($deletedImagesJson, true) ?? [];

        if (!empty($deletedImages)) {
            $this->deleteImages($deletedImages);
        }

        $this->updateImagesSortOrder($imageData);

        $newImages = array_filter($imageData, function ($img) {
            return !($img['isDeleted'] ?? true) && ($img['isTemp'] ?? false);
        });

        if (!empty($newImages)) {
            $this->processImages($productId, $newImages);
        }
    }
    public function deleteImages(array $imageIds)
    {
        $images = ProductImage::whereIn('id', $imageIds)->get();

        foreach ($images as $image) {
            Storage::delete(public_path($image->path));
        }

        ProductImage::whereIn('id', $imageIds)->delete();
    }
    private function updateImagesSortOrder(array $imageData)
    {
        foreach ($imageData as $index => $image) {
            if (!($image['isDeleted'] ?? true) && isset($image['id'])) {
                ProductImage::where('id', $image['id'])
                    ->update(['sort_order' => $index]);
            }
        }
    }
    public function processImages(int $productId, array $images)
    {
        $validImages = []; // Lưu danh sách ảnh hợp lệ

        foreach ($images as $index => $image) {
            try {
                $newPath = null;

                // Kiểm tra nếu ảnh bị xóa thì bỏ qua
                if (($image['isDeleted'] ?? false)) {
                    continue;
                }

                // Xử lý ảnh tạm (mới upload)
                if (($image['path'] ?? false)) {
                    $oldPath = public_path($image['path']);
                    if (!file_exists($oldPath)) {
                        throw new \Exception("File not found: {$oldPath}");
                    }

                    // Tạo thư mục đích nếu chưa tồn tại
                    $productsDir = public_path('uploads/products');
                    if (!file_exists($productsDir)) {
                        mkdir($productsDir, 0755, true);
                    }

                    // Đặt tên file mới
                    $extension = pathinfo($oldPath, PATHINFO_EXTENSION);
                    $newFilename = 'product_image_' . $productId . '_' . time() . '_' . $index . '.' . $extension;
                    $newPath = 'uploads/products/' . $newFilename;

                    // Di chuyển file
                    if (!rename($oldPath, public_path($newPath))) {
                        throw new \Exception("Failed to move file to {$newPath}");
                    }
                    $webpFilename = pathinfo($newFilename, PATHINFO_FILENAME) . '.webp';
                    $webpPath = 'uploads/products/' . $webpFilename;
                    $this->convertToWebP(public_path($newPath), public_path($webpPath));
                }

                // Lưu thông tin ảnh hợp lệ
                $validImages[] = [
                    'id' => $image['id'] ?? null,
                    'path' => $newPath ?? $image['path'] ?? null,
                    'webp_path' => $webpPath,
                    'sort_order' => $image['sort_order'] ?? $index
                ];
            } catch (\Exception $e) {
                \Log::error("Error processing image for product {$productId}: " . $e->getMessage());
                continue;
            }
        }

        // Cập nhật thứ tự ảnh
        foreach ($validImages as $imageData) {
            ProductImage::updateOrCreate(
                ['id' => $imageData['id']],
                [
                    'product_id' => $productId,
                    'path' => $imageData['path'],
                    'webp_path' => $imageData['webp_path'],
                    'sort_order' => $imageData['sort_order'] ?? 0
                ]
            );
        }
    }
    public function getProductByCategory(int $id)
    {
        return $this->repository->getProductByCategory($id);
    }

    public function getProductByAlias(string $alias)
    {
        return $this->repository->getProductByAlias($alias);
    }

    public function search(string $query)
    {
        return $this->repository->search($query);
    }

    public function getProductRelated(int $id, int $category_id)
    {
        return $this->repository->getProductRelated($id, $category_id);
    }
    private function convertToWebP(string $sourcePath, string $destinationPath): bool
    {
        try {
            // Kiểm tra xem GD có hỗ trợ WebP không
            if (!function_exists('imagewebp')) {
                throw new \Exception('WebP support is not available in your PHP installation');
            }

            // Lấy thông tin ảnh gốc
            $imageInfo = getimagesize($sourcePath);
            $mimeType = $imageInfo['mime'] ?? '';

            // Tạo ảnh từ nguồn tùy theo định dạng
            switch ($mimeType) {
                case 'image/jpeg':
                    $image = imagecreatefromjpeg($sourcePath);
                    break;
                case 'image/png':
                    $image = imagecreatefrompng($sourcePath);
                    // Giữ lại độ trong suốt cho PNG
                    imagepalettetotruecolor($image);
                    imagealphablending($image, true);
                    imagesavealpha($image, true);
                    break;
                case 'image/gif':
                    $image = imagecreatefromgif($sourcePath);
                    break;
                default:
                    throw new \Exception("Unsupported image type: {$mimeType}");
            }

            // Chất lượng WebP (0-100)
            $quality = 80;

            // Tạo ảnh WebP
            $result = imagewebp($image, $destinationPath, $quality);

            // Giải phóng bộ nhớ
            imagedestroy($image);

            if (!$result) {
                throw new \Exception("Failed to convert image to WebP");
            }

            return true;
        } catch (\Exception $e) {
            \Log::error("WebP conversion failed: " . $e->getMessage());
            return false;
        }
    }
}
