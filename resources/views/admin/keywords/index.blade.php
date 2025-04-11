@extends('admin.layouts.master')
@section('content')
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Danh sách từ khóa</h2>
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
                                    <th>Từ khóa</th>
                                    <th class="text-end">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($keywords as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->keyword }}</td>
                                        <td class="text-end">
                                            <div class="col-action">
                                                <a href="javascript:void(0)" data-keyword="{{ $item->keyword }}" data-id="{{ $item->id }}" class="btn btn-sm edit font-sm rounded btn-brand"> <i
                                                        class="material-icons md-edit"></i> Edit </a>
                                                <a href="javascript:void(0)"
                                                    data-url="{{ route('admin.keywords.destroy', $item->id) }}"
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
                <form id="createCategoryForm" action="{{ route('admin.keywords.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="keyword" class="form-label">Từ khóa</label>
                            <input type="text" name="keyword" placeholder="Nhập tên từ khóa" class="form-control"
                                id="keyword" required>
                            <input id="id" type="hidden" name="id" value="0">
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
       
        $('.add-new').click(function() {
            $('#id').val(0);
            $('#createCategoryModalLabel').html('Thêm mới từ khóa');
            $('.create-category').html('Thêm');
            $('#keyword').val('');
        });
        $('.edit').click(function() {
            var id = $(this).attr('data-id');
            var url = $(this).attr('data-url');
            var keyword = $(this).attr('data-keyword');
            $('#keyword').val(keyword)
            $('#id').val(id);
            $('#createCategoryModalLabel').html('Chỉnh sửa từ khóa');
            $('.create-category').html('Sửa');
            $('#createCategoryModal').modal('show');
        });
    </script>
@endpush
