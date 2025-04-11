<?php

namespace App\Repositories\Contracts;

interface CategoryRepositoryInterface extends BaseRepositoryInterface
{
    public function all();
    public function categories();
    public function categoriesWithoutRoot();
    public function move(int $id , string $type);
    public function categoriesHome();
    public function findByAlias(string $alias);
    
}