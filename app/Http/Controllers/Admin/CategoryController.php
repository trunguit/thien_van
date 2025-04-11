<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
class CategoryController extends Controller
{
    public function __construct(
        protected CategoryService $service
    ) {}
    public function index()
    {
        $categories = $this->service->getAllCategories();
        $categories_select = $this->service->getCategorySelect();
        return view('admin.categories.index',compact('categories','categories_select'));
    }

    public function store(CategoryRequest $request)
    {
        $validated = $request->validated();
        try {
            
            $validated['id'] == 0
                ? $this->service->createCategory($validated)
                : $this->service->updateCategory($validated['id'], $validated);
                
            return redirect()
                ->route('admin.categories.index')
                ->with('success', $validated['id'] == 0 ? 'Tạo danh mục thành công' : 'Cập nhật danh mục thành công');
                
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Đã xảy ra lỗi: ' . $e->getMessage());
        }
    }
    
    public function destroy($id)
    {
        $this->service->deleteCategory($id);
        return redirect()->route('admin.categories.index');
    }

    public function show(Request $request)
    {
        $category = $this->service->getCategory($request->id);
        return response()->json($category);
    }

    public function move(Request $request)
    {
        $this->service->moveCategory($request->id, $request->type);
        return redirect()->route('admin.categories.index');
    }
}
