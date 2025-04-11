<?php

namespace App\Services;

use App\Models\Blog;
use App\Repositories\Contracts\BannerRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BannerService
{
    public function __construct(
        protected BannerRepositoryInterface $repository
    ) {}

    public function getAllBanner()
    {
        return $this->repository->all();
    }

    public function getBanner(int $id)
    {
        return $this->repository->find($id);
    }

    public function createBanner(array $data)
    {
        unset($data['id']);
        return $this->repository->create($data);
    }

    public function updateBanner(int $id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function deleteBanner(int $id)
    {
        return $this->repository->delete($id);
    }
   

    public function uploadImage($file,$id)
    {
        $blog = $this->repository->find($id);
        $oldImage = $blog->image;
        if ($oldImage) {
            if (file_exists($oldImage)) {
                Storage::delete($oldImage);
            }
        }

        $destinationPath = 'uploads/banners/';
        $extension = $file->getClientOriginalExtension();
        $newFilename = 'banner_image_' . $id . '_' . time() . '_'  . $extension;
        $this->repository->update($id, ['image' => $destinationPath.$newFilename]);
        $file->move(public_path($destinationPath), $newFilename);
        return $destinationPath.$newFilename;
    }
  
}
