<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CustomerReview;
use App\Models\Partner;
use App\Services\BannerService;
use App\Services\BlogService;
use App\Services\CategoryService;
use App\Services\PageService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use App\Settings\GeneralSettings;
class HomeController extends Controller
{
    public function __construct(
        protected ProductService $productService ,
        protected CategoryService $categoryService,
        protected BlogService $blogService,
        protected BannerService $bannerService,
        protected GeneralSettings $generalSettings,
        protected PageService $pageService
    ) {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }
    public function index()
    {   
        $blogs = $this->blogService->getBlogsHome();
        $sliders = $this->bannerService->getAllSliders();
        $banners = $this->bannerService->getAllBanners();
        $settings = $this->generalSettings;
        $categories = $this->categoryService->categoriesHome();
        $brands = Partner::where('status','active')->get();
        $reviews = CustomerReview::where('status','active')->get();
        return view('frontend.home.index',[           
            'blogs' => $blogs,
            'banners' => $banners,
            'sliders' => $sliders,
            'settings' => $settings,
            'categories' => $categories,
            'brands' => $brands,
            'reviews' => $reviews,
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search_query');
        $categories = $this->categoryService->categoriesHome();
        $products = $this->productService->search($search);
        return view('frontend.category.search', [
            'products' => $products,
            'search' => $search,
            'categories' => $categories,
        ]);
    }

    public function page(Request $request, $alias)
    {
        $page = $this->pageService->getPageByAlias($alias);
        if (!$page) {
            abort(404);
        }
        return view('frontend.page.index', [
            'page' => $page,
        ]);
    }
    
}
