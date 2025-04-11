<?php

use App\Http\Controllers\Admin\AuthencationController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontend\BlogController as FrontendBlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TinymceController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\CustomerReivewController;
use App\Http\Controllers\Admin\KeywordController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PageController;
use App\Models\Keyword;
use App\Models\Page;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class, 'index'])->name('home');

Route::get('/login',[AuthencationController::class, 'login'])->name('login');
Route::post('/post-login',[AuthencationController::class, 'handleLogin'])->name('postLogin');
Route::middleware(['auth'])->prefix('admin')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('/tinymce/upload-image', [TinymceController::class, 'uploadImage']);
    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    // Categories routes
    Route::prefix('categories')->group(function() {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.categories.index');
        Route::get('/{id}', [CategoryController::class, 'show'])->name('admin.categories.show');
        Route::post('/move', [CategoryController::class, 'move'])->name('admin.categories.move');
        Route::post('/', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    });
    Route::prefix('partners')->group(function() {
        Route::get('/', [PartnerController::class, 'index'])->name('admin.partners.index');
        Route::get('/{id}', [PartnerController::class, 'show'])->name('admin.partners.show');
        Route::post('/', [PartnerController::class, 'store'])->name('admin.partners.store');
        Route::delete('/{id}', [PartnerController::class, 'destroy'])->name('admin.partners.destroy');
    });
    Route::prefix('customers')->group(function() {
        Route::get('/', [CustomerReivewController::class, 'index'])->name('admin.customers.index');
        Route::get('/{id}', [CustomerReivewController::class, 'show'])->name('admin.customers.show');
        Route::post('/', [CustomerReivewController::class, 'store'])->name('admin.customers.store');
        Route::delete('/{id}', [CustomerReivewController::class, 'destroy'])->name('admin.customers.destroy');
    });
    // Products routes
    Route::prefix('products')->group(function() {
        Route::get('/', [ProductController::class, 'index'])->name('admin.products.index');
        Route::get('/create', [ProductController::class, 'create'])->name('admin.products.create');
        Route::post('/upload-temp-image', [ProductController::class, 'handleUploadImageTemp'])->name('admin.products.handleUploadImageTemp');
        Route::post('/store', [ProductController::class, 'store'])->name('admin.products.store');
        Route::post('/update', [ProductController::class, 'update'])->name('admin.products.update');
        Route::get('/{id}', [ProductController::class, 'show'])->name('admin.products.show');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('admin.products.edit');
        Route::delete('/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    });

    Route::prefix('blogs')->group(function() {
        Route::get('/', [BlogController::class, 'index'])->name('admin.blogs.index');
        Route::get('/create', [BlogController::class, 'create'])->name('admin.blogs.create');
        Route::post('/store', [BlogController::class, 'store'])->name('admin.blogs.store');
        Route::post('/update', [BlogController::class, 'update'])->name('admin.blogs.update');
        Route::get('/{id}', [BlogController::class, 'show'])->name('admin.blogs.show');
        Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('admin.blogs.edit');
        Route::delete('/{id}', [BlogController::class, 'destroy'])->name('admin.blogs.destroy');
    });

    Route::prefix('pages')->group(function() {
        Route::get('/', [PageController::class, 'index'])->name('admin.pages.index');
        Route::get('/create', [PageController::class, 'create'])->name('admin.pages.create');
        Route::post('/store', [PageController::class, 'store'])->name('admin.pages.store');
        Route::post('/update', [PageController::class, 'update'])->name('admin.pages.update');
        Route::get('/{id}', [PageController::class, 'show'])->name('admin.pages.show');
        Route::get('/edit/{id}', [PageController::class, 'edit'])->name('admin.pages.edit');
        Route::delete('/{id}', [PageController::class, 'destroy'])->name('admin.pages.destroy');
    });
    Route::prefix('keywords')->group(function() {
        Route::get('/', [KeywordController::class, 'index'])->name('admin.keywords.index');
        Route::get('/create', [KeywordController::class, 'create'])->name('admin.keywords.create');
        Route::post('/store', [KeywordController::class, 'store'])->name('admin.keywords.store');
        Route::post('/update', [KeywordController::class, 'update'])->name('admin.keywords.update');
        Route::get('/{id}', [KeywordController::class, 'show'])->name('admin.keywords.show');
        Route::get('/edit/{id}', [KeywordController::class, 'edit'])->name('admin.keywords.edit');
        Route::delete('/{id}', [KeywordController::class, 'destroy'])->name('admin.keywords.destroy');
    });
    Route::prefix('banners')->group(function() {
        Route::get('/', [BannerController::class, 'index'])->name('admin.banners.index');
        Route::get('/create', [BannerController::class, 'create'])->name('admin.banners.create');
        Route::post('/store', [BannerController::class, 'store'])->name('admin.banners.store');
        Route::post('/update', [BannerController::class, 'update'])->name('admin.banners.update');
        Route::get('/{id}', [BannerController::class, 'show'])->name('admin.banners.show');
        Route::get('/edit/{id}', [BannerController::class, 'edit'])->name('admin.banners.edit');
        Route::delete('/{id}', [BannerController::class, 'destroy'])->name('admin.banners.destroy');
    });
    Route::get('/settings', [SettingController::class, 'edit'])->name('admin.settings.edit');
    Route::put('/settings', [SettingController::class, 'update'])->name('admin.settings.update');
});

Route::get('danh-muc/{alias?}.html', [FrontendCategoryController::class, 'index'])->name('category');
Route::get('san-pham/{alias?}.html', [FrontendCategoryController::class, 'product'])->name('product');
Route::get('bai-viet/{alias?}.html', [FrontendBlogController::class, 'detail'])->name('frontend.blogs.show');
Route::get('tat-ca-bai-viet.html', [FrontendBlogController::class, 'index'])->name('frontend.blogs.index');
Route::get('tim-kiem', [HomeController::class, 'search'])->name('frontend.search');
Route::get('trang/{alias?}.html', [HomeController::class, 'page'])->name('frontend.page');

Route::post('yeu-cau-bao-gia.html', [FrontendCategoryController::class, 'quotes'])->name('frontend.quotes.store');
