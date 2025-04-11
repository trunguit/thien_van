@extends('admin.layouts.master')
@section('content')
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Danh sách đơn hàng</h2>
        </div>
        <div>
            {{-- <button href="#" class="btn btn-primary btn-sm rounded add-new" data-bs-toggle="modal"
                data-bs-target="#createCategoryModal">Thêm mới</button> --}}
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
                                    <th style="width: 30%">Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th >Tên khách hàng</th>
                                    <th >Số điện thoại</th>
                                    <th >Địa chỉ</th>
                                    <th class="text-end">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->product_name }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ $item->customer_name }}</td>
                                        <td>{{ $item->customer_phone }}</td>
                                        <td>{{ $item->customer_address }}</td>
                                        <td class="text-end">
                                            <div class="col-action">
                                                <a href="javascript:void(0)"
                                                    data-url="{{ route('admin.customers.destroy', $item->id) }}"
                                                    class="btn deleteCategory btn-sm font-sm btn-light rounded"> <i
                                                        class="material-icons md-delete_forever"></i> Xóa </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div>
                        {{ $orders->links() }}
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
                <form id="createCategoryForm" action="{{ route('admin.customers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="category_name" class="form-label">Tên</label>
                            <input type="text" name="name" placeholder="Nhập tên đối tác" class="form-control"
                                id="name" required>
                            <input id="id" type="hidden" name="id" value="0">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Avatar</label>
                            <input type="file" name="avatar" class="form-control" id="avatar" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Trạng thái</label>
                            <select id="status" class="form-select" name="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Công việc</label>
                            <input type="text" name="job" id="job" placeholder="" class="form-control" >
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Bình luận</label>
                            <textarea name="comment" id="comment" class="form-control" id="" cols="30" rows="10"></textarea>
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
            $('#job').val('');
            $('#name').val('');
            $('#comment').val('');
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
                    $('#job').val(data.job);
                    $('#comment').val(data.comment);
                },
            })
        });
    </script>
@endpush
