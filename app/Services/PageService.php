<?php

namespace App\Services;

use App\Models\Blog;
use App\Repositories\Contracts\PageRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PageService
{
    public function __construct(
        protected PageRepositoryInterface $repository
    ) {}

    public function getAllPage()
    {
        return $this->repository->all();
    }

    public function getPage(int $id)
    {
        return $this->repository->find($id);
    }

    public function createPage(array $data)
    {
        return $this->repository->create($this->normalizePageData($data));
    }

    public function updatePage(int $id, array $data)
    {
        return $this->repository->update($id, $this->normalizePageData($data));
    }

    public function deletePage(int $id)
    {
        return $this->repository->delete($id);
    }
    protected function normalizePageData(array $data): array
    {
        return array_merge($data, [
            'alias' => Str::slug($data['title']),
        ]);
    }

    
    public function getPagesHome($limit = 5)
    {
        return $this->repository->getPagesHome($limit);
    }

    public function getPageByAlias($alias)
    {
        return $this->repository->getPageByAlias($alias);
    }
  
}
