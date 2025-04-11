<?php

namespace App\Repositories\Contracts;

interface BlogRepositoryInterface extends BaseRepositoryInterface
{
    public function all();
    public function getBlogsHome($limit);
    public function getBlogByAlias($alias);
}