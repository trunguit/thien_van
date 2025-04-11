<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(
        protected CategoryService $categoryService ,
        protected ProductService $productService
    )
    {
        
    }
    public function index( Request $request){
        $category = $this->categoryService->getCategoryByAlias($request->alias);
        $categories = $this->categoryService->categoriesHome();
        $products = $this->productService->getProductByCategory($category->id);
        return view('frontend.category.index',compact('category','categories','products'));
    }

    public function product(Request $request){
        $product = $this->productService->getProductByAlias($request->alias);
        $products_related = $this->productService->getProductRelated($product->id, $product->category_id);
        return view('frontend.category.product',compact('product','products_related'));
    }

    public function quotes(OrderRequest $request){
        $data = $request->validated();
        $data['product_name']= $this->productService->getProduct($data['product_id'])->name;
        Order::create([
            'customer_address' => $data['customer_address'],
            'product_name' => $data['product_name'],
            'customer_phone' => $data['customer_phone'],
            'customer_name' => $data['customer_name'],
            'product_id' => $data['product_id'],
            'qty' => $data['qty'],
        ]);
        return redirect()->back()->with('success','Đặt hàng thành công');
    }
}
