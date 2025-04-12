@extends('admin.layouts.master')

@section('content')
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Thông tin bài viết</h2>
        </div>
    </div>
    <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data" id="product-form">
        @csrf
        <div class="row">

            <div class="col-md-6">

                <div class="mb-4">
                    <label for="product_title" class="form-label">Hình ảnh</label>
                    <input type="file" name="image" placeholder="" class="form-control" id="image">
                    <input type="hidden" name="id" value="{{ $banner->id }}">
                </div>
                <div id="imagePreviewContainer" class="mt-3 {{ $banner->image != null ? '' : 'd-none' }}">
                    <img id="imagePreview" src="{{ asset($banner->image) }}" alt="Preview"
                        style="max-width: 200px; max-height: 200px;" />
                </div>
                <div class="mb-4">
                    <label for="product_title" class="form-label">Loại</label>
                    <select name="type" id="type" class="form-select">
                        <option {{ $banner->type == 'slider' ? 'selected' : '' }} value="slider">Slider</option>
                        <option {{ $banner->type == 'banner' ? 'selected' : '' }} value="banner">Banner</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="product_title" class="form-label">Trạng thái</label>
                    <select name="status" id="status" class="form-select">
                        <option {{ $banner->status == 'active' ? 'selected' : '' }} value="active">Hoạt động</option>
                        <option {{ $banner->status == 'inactive' ? 'selected' : '' }} value="inactive">Không hoạt động
                        </option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="product_title" class="form-label">Liên kết</label>
                    <input type="text" name="link" class="form-control" id="" value="{{ $banner->link }}">
                </div>
                <div class="mb-4">
                    <button type="submit" class="btn btn-primary">Lưu</button>
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
