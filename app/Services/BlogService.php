<?php

namespace App\Services;

use App\Models\Blog;
use App\Repositories\Contracts\BlogRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogService
{
    public function __construct(
        protected BlogRepositoryInterface $repository
    ) {}

    public function getAllBlog()
    {
        return $this->repository->all();
    }

    public function getBlog(int $id)
    {
        return $this->repository->find($id);
    }

    public function createBlog(array $data)
    {
        return $this->repository->create($this->normalizeBlogData($data));
    }

    public function updateBlog(int $id, array $data)
    {
        return $this->repository->update($id, $this->normalizeBlogData($data));
    }

    public function deleteBlog(int $id)
    {
        return $this->repository->delete($id);
    }
    protected function normalizeBlogData(array $data): array
    {
        return array_merge($data, [
            'alias' => Str::slug($data['title']),
            'status' => $data['status'] ?? 'active',
            'description' => $data['description'] ?? null,
        ]);
    }

    public function uploadImage($file,$blogId)
    {
        $blog = $this->repository->find($blogId);
        $oldImage = $blog->image;
        if ($oldImage) {
            if (file_exists($oldImage)) {
                Storage::delete($oldImage);
            }
        }

        $destinationPath = 'uploads/blogs/';
        $extension = $file->getClientOriginalExtension();
        $newFilename = 'blog_image_' . $blogId . '_' . time() . '_'  . $extension;
        $this->repository->update($blogId, ['image' => $destinationPath.$newFilename]);
        $file->move(public_path($destinationPath), $newFilename);
        return $destinationPath.$newFilename;
    }
    public function getBlogsHome($limit = 5)
    {
        return $this->repository->getBlogsHome($limit);
    }

    public function getBlogByAlias($alias)
    {
        return $this->repository->getBlogByAlias($alias);
    }
  
}
