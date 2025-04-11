<?php
namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Repositories\Contracts\BaseRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Support\Str;
class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function __construct(Product $model) {
        parent::__construct($model);
    }

    public function all()
    {
        $products =  $this->model->orderBy('id','DESC')
                    ->paginate(20);   
        return $products;
    }

   
    public function syncImages(int $productId, array $images, array $deletedImages = [])
    {
        if (!empty($deletedImages)) {
            ProductImage::whereIn('id', $deletedImages)->delete();
        }

        // Cập nhật hoặc thêm ảnh mới
        foreach ($images as $index => $imageData) {
            ProductImage::updateOrCreate(
                ['id' => $imageData['id'] ?? null],
                [
                    'product_id' => $productId,
                    'path' => $imageData['path'],
                    'sort_order' => $index
                ]
            );
        }

        return $this->find($productId)->load('images');
    }
    public function getProductByCategory(int $category_id){
        $category = Category::find($category_id);
        
        $ids = $category->descendantsAndSelf($category_id)->pluck('id');
        
        return Product::where('category_id', $category_id)
                   ->orWhereIn('products.category_id', $ids)
                   ->orderBy('id', 'asc')->paginate(20);
    }

    public function getProductByAlias(string $alias){
        return Product::where('alias', $alias)->first();
    }
    public function search(string $query)
    {
        return Product::where('name', 'LIKE', "%{$query}%")
            ->paginate(20);
    }
    public function getProductRelated(int $id, int $category_id){
        return Product::where('category_id', $category_id)->where('id','!=',$id)->paginate(20); 
    }
}