<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Services\PageService;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct(
        protected PageService $service
    ) {}
    public function index()
    {
        $pages = $this->service->getAllPage();
        return view('admin.pages.index',compact('pages'));
    }

    public function create(){
        return view('admin.pages.create');
    }
    public function edit($id){
        $page = $this->service->getPage($id);
        return view('admin.pages.edit',compact('page'));
    }

    public function store(PageRequest $request)
    {
        $validated = $request->validated();
        try {
            $isCreate  = $validated['id'] == 0 ? true : false;
            $page = $isCreate
                ? $this->service->createPage($validated)
                : $this->service->updatePage($validated['id'], $validated);
          
            return redirect()
                ->route('admin.pages.index')
                ->with('success', $validated['id'] == 0 ? 'Thêm trang thành công' : 'Cập nhật trang thành công');
                
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Đã xảy ra lỗi: ' . $e->getMessage());
        }
    }
    public function destroy($id)
    {
        $this->service->deletePage($id);
        return redirect()->route('admin.pages.index');
    }
}
