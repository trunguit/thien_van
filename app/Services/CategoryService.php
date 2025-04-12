<?php

namespace App\Services;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class CategoryService
{
    public function __construct(
        protected CategoryRepositoryInterface $repository
    ) {}

    public function getAllCategories()
    {
        return $this->repository->all();
    }

    public function getCategorySelect()
    {
        $result = [];
        $nodes = $this->repository->categories();
        foreach ($nodes as $value) {
            $result[$value['id']] = str_repeat('|---- ', $value['depth']) . $value['name'];
        }
        return $result;
    }
    public function getCategorySelectWithOutRoot()
    {
        $result = [];
        $nodes = $this->repository->categoriesWithoutRoot();
        foreach ($nodes as $value) {
            $result[$value['id']] = str_repeat('|---- ', $value['depth']) . $value['name'];
        }
        return $result;
    }
    public function getCategory(int $id)
    {
        return $this->repository->find($id);
    }
    public function getCategoryByAlias(string $alias)
    {
        return $this->repository->findByAlias($alias);
    }
    public function createCategory(array $data)
    {
        return $this->repository->create($this->normalizeCategoryData($data));
    }

    public function updateCategory(int $id, array $data)
    {
        return $this->repository->update($id, $this->normalizeCategoryData($data));
    }

    public function deleteCategory(int $id)
    {
        return $this->repository->delete($id);
    }
    protected function normalizeCategoryData(array $data): array
    {
        return array_merge($data, [
            'alias' => Str::slug($data['name']),
            'status' => $data['status'] ?? 'active',
            'parent_id' => $data['parent_id'] ?? null
        ]);
    }
    public function uploadImage($file,$id)
    {
        $category = $this->repository->find($id);
        $oldImage = $category->image;
        if ($oldImage) {
            if (file_exists($oldImage)) {
                Storage::delete($oldImage);
            }
        }

        $destinationPath = 'uploads/categories/';
        $extension = $file->getClientOriginalExtension();
        $newFilename = 'category_image_' . $id . '_' . time() . '_'  . $extension;
        $this->repository->update($id, ['image' => $destinationPath.$newFilename]);
        $file->move(public_path($destinationPath), $newFilename);
        return $destinationPath.$newFilename;
    }
    public function moveCategory(int $id , string $type){
        return $this->repository->move($id ,$type);
    }

    public function categoriesHome(){
        return $this->repository->categoriesHome();
    }

  
}