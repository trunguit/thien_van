<?php

namespace App\Repositories\Contracts;

interface ProductRepositoryInterface extends BaseRepositoryInterface
{
    public function all();
    public function syncImages(int $productId, array $images, array $deletedImages = []); 
    public function getProductByCategory(int $id);
    public function getProductByAlias(string $alias);
    public function search(string $query);
    public function getProductRelated(int $id, int $category_id);
}