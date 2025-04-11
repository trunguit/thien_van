<?php

namespace App\Http\View\Composers;

use App\Services\CategoryService;
use Illuminate\View\View;

class CategoryComposer
{
    public function __construct(private CategoryService $categoryService) {}

    public function compose(View $view)
    {
        $view->with('categories', $this->categoryService->categoriesHome());
    }
}