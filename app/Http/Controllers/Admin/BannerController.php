<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Services\BannerService;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function __construct(protected BannerService $service)
    {
        
    }
    public function index(){
        $banners = $this->service->getAll();
        return view('admin.banners.index',compact('banners'));
    }

    public function create(){
        return view('admin.banners.create');
    }
    public function edit($id){
        $banner = $this->service->getBanner($id);
        return view('admin.banners.edit',compact('banner'));
    }

    public function destroy($id)
    {
        $this->service->deleteBanner($id);
        return redirect()->route('admin.banners.index');
    }
    public function store(BannerRequest $request)
    {
        $validated = $request->validated();
        try {
            $isCreate = $validated['id'] == 0 ? true : false;
            $banner = $isCreate 
                ? $this->service->createBanner($validated) 
                : $this->service->updateBanner($validated['id'], $validated);
            
            if($request->has('image')){
                $this->service->uploadImage($request->file('image'),$banner->id);
            }
            return redirect()
                ->route('admin.banners.index')
                ->with('success', $validated['id'] == 0 ? 'Thêm banner thành công' : 'Cập nhật banner thành công');
                
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Đã xảy ra lỗi: ' . $e->getMessage());
        }
    }
}
