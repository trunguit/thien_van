@extends('admin.layouts.master')

@section('content')
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Thông tin bài viết</h2>
        </div>
    </div>
    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" id="product-form">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <label for="product_title" class="form-label">Tên sản phẩm</label>
                            <input type="text" name="title" placeholder="" value="{{ $blog->title }}" class="form-control"
                                id="name">
                            <input type="hidden" name="id" value="{{ $blog->id }}">
                        </div>
                        <div class="mb-4">
                            <label for="product_title" class="form-label">Hình ảnh</label>
                            <input type="file" name="image" placeholder="" class="form-control" id="image">
                        </div>
                        <div id="imagePreviewContainer" class="mt-3 {{ $blog->image != null ? '' : 'd-none' }}">
                            <img id="imagePreview" src="{{ asset($blog->image) }}" alt="Preview"
                                style="max-width: 200px; max-height: 200px;" />
                        </div>
                        <div class="mb-4">
                            <label for="product_title" class="form-label">Trạng thái</label>
                            <select name="status" id="status" class="form-select">
                                <option {{ $blog->status == 'active' ? 'selected' : '' }} value="active">Hoạt động</option>
                                <option {{ $blog->status == 'inactive' ? 'selected' : '' }} value="inactive">Không hoạt động
                                </option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="product_title" class="form-label">Mô tả bài viết</label>
                            <textarea name="description" id="" class="form-control" cols="30" rows="30">{{ $blog->description }}</textarea>
                        </div>
                    </div>
                </div>
                
               
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <label for="product_title" class="form-label">Seo Meta Title</label>
                            <input type="text" value="{{ $blog->meta_title }}" name="meta_title" placeholder="" class="form-control" id="">
                        </div>
                        <div class="mb-4">
                            <label for="product_title" class="form-label">Seo Meta Description</label>
                           <textarea name="meta_description" class="form-control" id="" cols="30" rows="10">{{$blog->meta_description}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="mb-4">
                            <label for="product_title" class="form-label">Nội dung bài viết</label>
                            <textarea name="content" id="" class="form-control tinymce" cols="30" rows="30">{!! $blog->content !!}</textarea>
                        </div>

                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection


@push('scripts')
    <script src="{{ asset('admin/js/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('admin/js/custom.js') }}"></script>
    <script>
        $('#image').change(function() {
            // Kiểm tra xem có file được chọn không
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    // Hiển thị container preview
                    $('#imagePreviewContainer').removeClass('d-none');
                    // Gán src cho thẻ img
                    $('#imagePreview').attr('src', e.target.result);
                }

                // Đọc file như URL dữ liệu
                reader.readAsDataURL(this.files[0]);
            } else {
                $('#imagePreviewContainer').hide();
            }
        });
    </script>
@endpush
