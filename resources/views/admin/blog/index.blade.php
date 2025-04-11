@extends('admin.layouts.master')
@section('content')
<div class="content-header">
    <div>
        <h2 class="content-title card-title">Danh sách bài viết</h2>
    </div>
    <div>
        <a href="{{route('admin.blogs.create')}}" class="btn btn-primary btn-sm rounded">Thêm mới</a>
    </div>
</div>
<div class="card mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th scope="col">Tên bài viết</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $item)
                    <tr>
                        <td>{{$loop->iteration + ($blogs->currentPage() - 1) * $blogs->perPage()}}</td>
                        <td><b>{{$item->title}}</b></td>
                        <td><a href="{{route('admin.blogs.edit', $item->id)}}"><img src="{{ $item->image ? asset($item->image) : asset('admin/imgs/image_default.webp')}}" alt="blog" class="img-sm"></a></td>
                        <td><span class="badge bg-{{$item->status == 'active' ? 'success' : 'warning'}}">{{$item->status}}</span> </td>
                        <td class="text-end">
                            <a href="{{route('admin.blogs.edit', $item->id)}}" class="btn btn-sm font-sm rounded btn-brand"> <i class="material-icons md-edit"></i> Edit </a>
                            <a href="javascript:void(0)" class="btn btn-sm font-sm btn-light rounded deleteProduct" data-url="{{route('admin.blogs.destroy', $item->id)}}"> <i class="material-icons md-delete_forever"></i> Delete </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
       
    </div>
</div>
<div class="pagination-area mt-30 mb-50">
    {!!$blogs->links()!!}
</div>
@endsection
@push('scripts')
    <script>
         $('.deleteProduct').click(function() {
            $('#deleteForm').attr('action', $(this).attr('data-url'));
            $('#deleteConfirmationModal').modal('show');
        });
    </script>
@endpush