@extends('admin.layouts.master')
@section('content')
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Danh sách danh mục</h2>
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
                                    <th style="width: 200px" class="text-center">Sắp xếp</th>
                                    <th class="text-end">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><b>{!! showNestedSetName($item->name, $item->depth) !!}</b></td>
                                        <td>{!! showNestedSetUpDown($item->id) !!}</td>
                                        <td class="text-end">
                                            <div class="col-action">
                                                <a href="javascript:void(0)" data-url="{{ route('admin.categories.show', $item->id) }}" data-id="{{ $item->id }}" class="btn btn-sm edit font-sm rounded btn-brand"> <i
                                                        class="material-icons md-edit"></i> Edit </a>
                                                <a href="javascript:void(0)"
                                                    data-url="{{ route('admin.categories.destroy', $item->id) }}"
                                                    class="btn deleteCategory btn-sm font-sm btn-light rounded"> <i
                                                        class="material-icons md-delete_forever"></i> Delete </a>
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
                    <h5 class="modal-title" id="createCategoryModalLabel">Thêm danh mục mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="createCategoryForm" action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="category_name" class="form-label">Tên danh mục</label>
                            <input type="text" name="name" placeholder="Nhập tên danh mục" class="form-control"
                                id="category_name" required>
                            <input id="id" type="hidden" name="id" value="0">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Danh mục cha</label>
                            <select id="parent_id" class="form-select" name="parent_id">
                                @foreach ($categories_select as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Trạng thái</label>
                            <select id="status" class="form-select" name="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Seo Meta Title</label>
                            <input type="text" name="meta_title" placeholder="Meta Title" class="form-control" id="meta_title">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Seo Meta Description</label>
                            <textarea name="meta_description" id="meta_description" class="form-control" id="" cols="30" rows="10"></textarea>
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
@push('scripts')
    <script>
        $('.deleteCategory').click(function() {
            $('#deleteForm').attr('action', $(this).attr('data-url'));
            $('#deleteConfirmationModal').modal('show');
        });
        $(document).on('click', '.btn-move', function(event) {
            var id = $(this).attr('data-id');
            var type = $(this).attr('data-type');
            $.ajax({
                url: "{{ route('admin.categories.move') }}",
                method: 'POST',
                data: {
                    id: id,
                    type: type,
                },
                success: function(data) {
                    $('#table-list').html(data);
                },
                complete: function(data) {
                    window.location.reload();
                }
            })
        });
        $('.add-new').click(function() {
            $('#id').val(0);
            $('#createCategoryModalLabel').html('Thêm mới danh mục');
            $('.create-category').html('Thêm');
            $('#status').val('active');
            $('#meta_title').val('');
            $('#category_name').val('');
            $('#meta_description').val('');
            $('#status').trigger('change');
        });
        $('.edit').click(function() {
            var id = $(this).attr('data-id');
            var url = $(this).attr('data-url');
            $('#id').val(id);
            $('#createCategoryModalLabel').html('Chỉnh sửa danh mục');
            $('.create-category').html('Sửa');
            $('#createCategoryModal').modal('show');
            $.ajax({
                url: url,
                method: 'get',
                success: function(data) {
                    $('#category_name').val(data.name)
                    $('#status').val(data.status).trigger('change');
                    $('#parent_id').val(data.parent_id).trigger('change');
                    $('#meta_title').val(data.meta_title);
                    $('#meta_description').val(data.meta_description);
                },
            })
        });
    </script>
@endpush
