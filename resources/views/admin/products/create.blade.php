@extends('admin.layouts.master')

@section('content')
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Thông tin sản phẩm</h2>
        </div>
    </div>
    <form action="{{ route('admin.products.store') }}" method="POST" id="product-form">
        @csrf
        <div class="row">
           
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="mb-4">
                            <label for="product_title" class="form-label">Mô tả sản phẩm</label>
                            <textarea name="description" id="" class="form-control tinymce" cols="30" rows="30"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="product_title" class="form-label">Seo Meta Title</label>
                            <input type="text" name="meta_title" placeholder="" class="form-control"
                                id="meta_title">
                        </div>
                        <div class="mb-4">
                            <label for="product_title" class="form-label">Seo Meta Description</label>
                           <textarea name="meta_description" class="form-control" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="mb-4">
                            <div class="dropzone" id="myDropzone">
                                <div class="dz-message">
                                    Kéo thả hình vào đây hoặc bấm để chọn ảnh
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="mb-4">
                                    <label for="product_title" class="form-label">Tên sản phẩm</label>
                                    <input type="text" name="name" placeholder="" class="form-control"
                                        id="name">
                                    <input type="hidden" name="image_data" id="image_data" value="">
                                    <input type="hidden" name="existing_images" id="existing-images" value="[]">
                                </div>
                                <div class="mb-4">
                                    <label for="product_title" class="form-label">Danh mục sản phẩm</label>
                                    <select name="category_id" id="category_id" class="form-select">
                                        <option value="0">Chọn danh mục</option>
                                        @foreach ($categories as $key => $category)
                                            <option value="{{ $key }}">{{ $category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="product_title" class="form-label">Mã sản phẩm (Sku)</label>
                                    <input type="text" name="sku" placeholder="" class="form-control" id="sku">
                                </div>
                                <div class="mb-4">
                                    <label for="product_title" class="form-label">Mã vạch (UPC)</label>
                                    <input type="text" name="upc" placeholder="" class="form-control" id="upc">
                                </div>
                                <div class="mb-4">
                                    <label for="product_title" class="form-label">Phiên bản (Condition)</label>
                                    <input type="text" name="condition" value="New" placeholder="" class="form-control" id="condition">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Giá sản phẩm</label>
                                    <div class="d-flex gap-3 align-items-center">
                                        <div class="form-group mb-0">
                                            <label for="min_qty" class="small">Giá bán</label>
                                            <input type="number" class="form-control" id="price" name="price" placeholder="" min="0">
                                        </div>
                                        <div class="form-group mb-0">
                                            <label for="max_qty" class="small">Giá khyến mãi</label>
                                            <input type="number" class="form-control" id="sale_price" name="sale_price" placeholder="" min="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Giới hạn mua</label>
                                    <div class="d-flex gap-3 align-items-center">
                                        <div class="form-group mb-0">
                                            <label for="min_qty" class="small">Tối thiểu</label>
                                            <input type="number" class="form-control" id="min_qty" name="min_qty" placeholder="VD: 1" min="1">
                                        </div>
                                        <div class="form-group mb-0">
                                            <label for="max_qty" class="small">Tối đa</label>
                                            <input type="number" class="form-control" id="max_qty" name="max_qty" placeholder="VD: 10" min="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="product_title" class="form-label">Trạng thái</label>
                                    <select name="status" id="status" class="form-select">
                                        <option value="active">Hoạt động</option>
                                        <option value="inactive">Không hoạt động</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Kích thước</label>
                                    <div class="d-flex gap-3">
                                        @foreach($availableSizes as $size)
                                            <div class="form-check">
                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="sizes[]" 
                                                    value="{{ $size }}" 
                                                    id="size{{ $size }}"
                                                    checked
                                                >
                                                <label class="form-check-label" for="size{{ $size }}">
                                                    {{ $size }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Màu sắc</label>
                                    <div id="color-picker-wrapper">
                                        <div class="d-flex align-items-center mb-2 color-picker-item">
                                            <input type="color" name="colors[]" class="form-control form-control-color me-2" value="#000000" title="Chọn màu">
                                            <button type="button" class="btn btn-outline-danger btn-sm btn-remove-color" title="Xoá màu">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-primary" id="btn-add-color">
                                        <i class="fa fa-plus"></i> Thêm màu
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        
                    </div>
                </div>
             
            </div>
        </div>
    </form>
@endsection
<style>
    .color-picker-item input[type="color"] {
        width: 100px;
        height: 38px;
        padding: 0;
        border: none;
        background: none;
    }
</style>

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"
        integrity="sha512-U2WE1ktpMTuRBPoCFDzomoIorbOyUv0sP8B+INA3EzNAhehbzED1rOJg6bCqPf/Tuposxb5ja/MAUnC8THSbLQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>
    <script src="{{ asset('admin/js/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('admin/js/custom.js') }}"></script>
    <script>
        Dropzone.autoDiscover = false;
        document.addEventListener('DOMContentLoaded', function() {
            // Biến toàn cục
            let uploadedFiles = [];
            // 1. Kiểm tra và hủy Dropzone cũ nếu tồn tại
            if (Dropzone.instances.length > 0) {
                Dropzone.instances.forEach(instance => {
                    if (instance.element === document.getElementById("myDropzone")) {
                        instance.destroy();
                    }
                });
            }
            const myDropzone = new Dropzone("#myDropzone", {
                url: "{{ route('admin.products.handleUploadImageTemp') }}",
                paramName: "file",
                maxFilesize: 5,
                acceptedFiles: "image/*",
                addRemoveLinks: true,
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                init: function() {
                    new Sortable(this.element, {
                        draggable: ".dz-preview",
                        animation: 150,
                        ghostClass: "dz-sortable-ghost",
                        onEnd: function() {
                            setTimeout(updateSortOrders, 10);
                        }
                    });

                    this.on("success", function(file, response) {
                        if (response.success) {
                            $('.dz-message').hide();
                            file.isTemp = true;
                            file.sort_order = this.files.length - 1;
                            uploadedFiles.push({
                                id: null,
                                name: file.name,
                                size: file.size,
                                path: response.temp_path,
                                isTemp: true,
                                isDeleted: false,
                                sort_order: file.sort_order

                            });
                            updateImageData();
                        }
                    });

                    this.on("removedfile", function(file) {
                        const index = uploadedFiles.findIndex(f =>
                            (f.isTemp && f.tempPath === file.name) ||
                            (!f.isTemp && f.id == (file.id || -1))
                        );

                        if (index !== -1) {
                            uploadedFiles.splice(index, 1);
                            updateImageData();
                        }
                    });
                }
            });

            function updateSortOrders() {
                if (!myDropzone?.files) return;

                const previewElements = Array.from(
                    myDropzone.element.querySelectorAll('.dz-preview:not(.dz-processing)')
                );

                myDropzone.files = previewElements.map(el =>
                    myDropzone.files.find(file => file.previewElement === el)
                ).filter(Boolean);

                // 2. Đồng bộ sang uploadedFiles
                myDropzone.files.forEach((file, index) => {
                    file.sort_order = index;

                    // Tìm index trong uploadedFiles
                    const uploadedIndex = uploadedFiles.findIndex(f => {
                        // Với ảnh mới upload
                        if (f.isTemp && f.tempPath) {
                            return f.tempPath === file.name;
                        }
                        // Với ảnh từ server
                        return !f.isTemp && f.id === (file.id || -1);
                    });

                    if (uploadedIndex !== -1) {
                        uploadedFiles[uploadedIndex].sort_order = index;

                        // Đảm bảo các thuộc tính quan trọng được giữ nguyên
                        uploadedFiles[uploadedIndex] = {
                            ...uploadedFiles[uploadedIndex],
                            sort_order: index
                        };
                    }
                });

                // 3. Log để debug
                console.log('Current order:', {
                    dropzoneFiles: myDropzone.files.map(f => ({
                        name: f.name,
                        order: f.sort_order
                    })),
                    uploadedFiles: uploadedFiles.map(f => ({
                        name: f.name || f.path,
                        order: f.sort_order
                    }))
                });

                updateImageData();
            }

            function updateImageData() {
                // Sắp xếp uploadedFiles theo sort_order trước khi lưu
                const sortedUploadedFiles = [...uploadedFiles]
                    .sort((a, b) => a.sort_order - b.sort_order)
                    .map(file => ({
                        ...file,
                        // Đảm bảo cấu trúc dữ liệu gửi lên server
                        id: file.id || null,
                        path: file.path || file.tempPath,
                        isDeleted: file.isDeleted || false,
                        isTemp: file.isTemp || false
                    }));

                document.getElementById('image_data').value = JSON.stringify(sortedUploadedFiles);

                console.log('Data to submit:', {
                    image_data: sortedUploadedFiles,
                });
            }
        });

        $('#btn-add-color').on('click', function () {
            const html = `
                <div class="d-flex align-items-center mb-2 color-picker-item">
                    <input type="color" name="colors[]" class="form-control form-control-color me-2" value="#000000" title="Chọn màu">
                    <button type="button" class="btn btn-outline-danger btn-sm btn-remove-color" title="Xoá màu">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            `;
            $('#color-picker-wrapper').append(html);
        });

        $(document).on('click', '.btn-remove-color', function () {
            $(this).closest('.color-picker-item').remove();
        });
    </script>
@endpush
