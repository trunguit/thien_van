@extends('admin.layouts.master')
@section('content')
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Danh sách đối tác</h2>
        </div>
        <div>
            <button href="#" class="btn btn-primary btn-sm rounded add-new" data-bs-toggle="modal"
                data-bs-target="#createCategoryModal">Thêm mới</button>
        </div>
    </div>
    <div class="card mb-4">

        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>

                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th >Logo</th>
                                    <th >Link</th>
                                    <th class="text-end">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($partners as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td><img src="{{ $item->logo ? asset($item->logo) : asset('admin/imgs/image_default.webp') }}" alt="blog" class="image-logo"></td>
                                        <td>{{ $item->link }}</td>
                                        <td class="text-end">
                                            <div class="col-action">
                                                <a href="javascript:void(0)" data-url="{{ route('admin.partners.show', $item->id) }}" data-id="{{ $item->id }}" class="btn btn-sm edit font-sm rounded btn-brand"> <i
                                                        class="material-icons md-edit"></i> Sửa </a>
                                                <a href="javascript:void(0)"
                                                    data-url="{{ route('admin.partners.destroy', $item->id) }}"
                                                    class="btn deleteCategory btn-sm font-sm btn-light rounded"> <i
                                                        class="material-icons md-delete_forever"></i> Xóa </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- .col// -->
            </div>
            <!-- .row // -->
        </div>
        <!-- card body .// -->
    </div>
    <div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createCategoryModalLabel">Thêm đối tác mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="createCategoryForm" action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="category_name" class="form-label">Tên đối tác</label>
                            <input type="text" name="name" placeholder="Nhập tên đối tác" class="form-control"
                                id="name" required>
                            <input id="id" type="hidden" name="id" value="0">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Logo</label>
                            <input type="file" name="logo" class="form-control" id="logo" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Trạng thái</label>
                            <select id="status" class="form-select" name="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Website</label>
                            <input type="text" name="website" id="website" placeholder="" class="form-control" >
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary create-category">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection
<style>
    .image-logo {
        width: 100px;
        height: 100px;
        object-fit: contain;
    }
</style>
@push('scripts')
    <script>
        $('.deleteCategory').click(function() {
            $('#deleteForm').attr('action', $(this).attr('data-url'));
            $('#deleteConfirmationModal').modal('show');
        });
       
        $('.add-new').click(function() {
            $('#id').val(0);
            $('#createCategoryModalLabel').html('Thêm mới đối tác');
            $('.create-category').html('Thêm');
            $('#status').val('active');
            $('#website').val('');
            $('#name').val('');
            $('#status').trigger('change');
        });
        $('.edit').click(function() {
            var id = $(this).attr('data-id');
            var url = $(this).attr('data-url');
            $('#id').val(id);
            $('#createCategoryModalLabel').html('Chỉnh sửa đối tác');
            $('.create-category').html('Sửa');
            $('#createCategoryModal').modal('show');
            $.ajax({
                url: url,
                method: 'get',
                success: function(data) {
                    $('#name').val(data.name)
                    $('#status').val(data.status).trigger('change');
                    $('#website').val(data.website);
                },
            })
        });
    </script>
@endpush
