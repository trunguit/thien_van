<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Services\CategoryService;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    protected $availableSizes = ['S', 'M', 'L'];

    public function __construct(
        protected ProductService $productService ,
        protected CategoryService $categoryService
    ) {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }
    public function index()
    {
        $products = $this->productService->getAllProducts();
        return view('admin.products.index', compact('products'));
    }

    public function edit($id){
        $product = $this->productService->getProduct($id);
        $categories = $this->categoryService->getCategorySelectWithOutRoot();
        $availableSizes = $this->availableSizes;
        return view('admin.products.edit', compact('product', 'categories', 'availableSizes'));
    }

    public function show(Request $request)
    {
        $id = $request->id;
        $product = $this->productService->getProduct($id);
        return response()->json($product);
    }

    public function create()
    {
        $availableSizes = $this->availableSizes;
        $categories = $this->categoryService->getCategorySelectWithOutRoot();
        return view('admin.products.create', compact('categories', 'availableSizes'));
    }

    public function store(ProductRequest $request)
    {
        $validated = $request->validated();
        DB::beginTransaction();
        try {
            $product = $this->productService->createProduct($validated);
            $this->productService->handleProductImages(
                $product->id,
                $request->input('image_data', '[]') ?? '[]', // Đảm bảo luôn là string
                $request->input('deleted_images', '[]') ?? '[]'
            );
            if($request->colors){
                $this->productService->handleProductAttributes(
                    $product->id,
                    $request->input('colors', '[]') ?? '[]',
                    'color'
                );
            }
            if($request->sizes){
                $this->productService->handleProductAttributes(
                    $product->id,
                    $request->input('sizes', '[]') ?? '[]',
                    'size'
                );
            }
            DB::commit();

            return redirect()
                ->route('admin.products.index')
                ->with('success',  'Tạo sản phẩm thành công' );
        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->withInput()
                ->with('error', 'Đã xảy ra lỗi: ' . $e->getMessage());
        }
    }
    public function update(ProductRequest $request)
    {
        $validated = $request->validated();
        DB::beginTransaction();
        try {
            $product = $this->productService->updateProduct($request->id,$validated);
            $this->productService->handleProductImages(
                $product->id,
                $request->input('image_data', '[]') ?? '[]', // Đảm bảo luôn là string
                $request->input('deleted_images', '[]') ?? '[]'
            );
            if($request->colors){
                $this->productService->handleProductAttributes(
                    $product->id,
                    $request->input('colors', '[]') ?? '[]',
                    'color'
                );
            }
            if($request->sizes){
                $this->productService->handleProductAttributes(
                    $product->id,
                    $request->input('sizes', '[]') ?? '[]',
                    'size'
                );
            }
            DB::commit();

            return redirect()
                ->route('admin.products.index')
                ->with('success',  'Tạo sản phẩm thành công' );
        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->withInput()
                ->with('error', 'Đã xảy ra lỗi: ' . $e->getMessage());
        }
    }
    public function handleUploadImageTemp(Request $request)
    {
        $image = $request->file('file');
        $tempName = 'temp_'.md5(time().rand()).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('uploads/temp'), $tempName);
        
        return response()->json([
            'success' => true,
            'temp_path' => 'uploads/temp/'.$tempName
        ]);
    }

    public function destroy($id)
    {
        $this->productService->deleteProduct($id);
        return redirect()->route('admin.products.index');
    }
}
