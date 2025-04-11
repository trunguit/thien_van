<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Services\BlogService;

class BlogController extends Controller
{

    public function __construct(
        protected BlogService $service
    ) {}
    public function index()
    {
        $blogs = $this->service->getAllBlog();
        return view('admin.blog.index',compact('blogs'));
    }

    public function create(){
        return view('admin.blog.create');
    }
    public function edit($id){
        $blog = $this->service->getBlog($id);
        return view('admin.blog.edit',compact('blog'));
    }

    public function store(BlogRequest $request)
    {
        $validated = $request->validated();
        try {
            $isCreate  = $validated['id'] == 0 ? true : false;
            $blog = $isCreate
                ? $this->service->createBlog($validated)
                : $this->service->updateBlog($validated['id'], $validated);
            if($request->has('image')){
                $this->service->uploadImage($request->file('image'),$blog->id);
            }
            return redirect()
                ->route('admin.blogs.index')
                ->with('success', $validated['id'] == 0 ? 'Thêm bài viết thành công' : 'Cập nhật bài viết thành công');
                
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Đã xảy ra lỗi: ' . $e->getMessage());
        }
    }
    public function destroy($id)
    {
        $this->service->deleteBlog($id);
        return redirect()->route('admin.blogs.index');
    }
}
