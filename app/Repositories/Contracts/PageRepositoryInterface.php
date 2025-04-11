<?php

namespace App\Repositories\Contracts;

interface PageRepositoryInterface extends BaseRepositoryInterface
{
    public function all();
    public function getPagesHome($limit);
    public function getPageByAlias($alias);
}