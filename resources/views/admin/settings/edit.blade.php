@extends('admin.layouts.master')

@section('content')
<div class="content-header">
    <div>
        <h2 class="content-title card-title">Cài đặt chung</h2>
    </div>
</div>
<form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Tên website</label>
                        <input type="text" name="title" class="form-control" value="{{ $settings->site_name }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Giới thiệu</label>
                        <textarea name="introduction" class="form-control" id="" cols="30" rows="10">{{$settings->introduction}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Số điện thoại 1</label>
                        <input type="text" name="phone" class="form-control" value="{{ $settings->phone1 }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Số điện thoại 2</label>
                        <input type="text" name="phone" class="form-control" value="{{ $settings->phone2 }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Địa chỉ</label>
                        <input type="text" name="address" class="form-control" value="{{ $settings->address }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email 1</label>
                        <input type="email" name="email1" class="form-control" value="{{ $settings->email1 }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email 2</label>
                        <input type="email" name="email1" class="form-control" value="{{ $settings->email2 }}">
                    </div>
                  

                   
                </div>
            </div>
          
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Logo</label>
                        <input type="file" name="logo" class="form-control">
                        @if($settings->logo)
                            <img src="{{ $settings->logo }}" width="150" class="mt-2">
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Favicon</label>
                        <input type="file" name="favicon" class="form-control">
                        @if($settings->favicon)
                            <img src="{{ $settings->favicon }}" width="150" class="mt-2">
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Seo Meta Title</label>
                        <input type="text" name="meta_title" class="form-control" value="{{ $settings->meta_title }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Seo Meta Description</label>
                        <textarea name="meta_description" class="form-control" id="" cols="30" rows="10">{{$settings->meta_description}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Facebook URL</label>
                        <input type="url" name="facebook" class="form-control" value="{{ $settings->facebook }}">
                    </div>
        
                    <div class="mb-3">
                        <label class="form-label">Shoppe URL</label>
                        <input type="url" name="shoppe" class="form-control" value="{{ $settings->shoppe }}">
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <button type="submit" class="btn btn-primary mb-3">Lưu thay đổi</button>
</form>
@endsection