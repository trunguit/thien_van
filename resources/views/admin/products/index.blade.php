@extends('admin.layouts.master')
@section('content')
<div class="content-header">
    <div>
        <h2 class="content-title card-title">Danh sách sản phẩm</h2>
    </div>
    <div>
        <a href="{{route('admin.products.create')}}" class="btn btn-primary btn-sm rounded">Thêm mới</a>
    </div>
</div>
<div class="card mb-4">
    <div class="card-body">
        <div class="row gx-3 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-5">
            @foreach ($products as $item)
                <div class="col">
                    <div class="card card-product-grid">
                        <a href="{{route('admin.products.edit', $item->id)}}" class="img-wrap"> <img src="{{ $item->avatar ? asset($item->avatar->path) : asset('admin/imgs/image_default.webp')}}" alt="Product"> </a>
                        <div class="info-wrap">
                            <a href="{{route('admin.products.edit', $item->id)}}" class="title text-truncate">{{$item->name}}</a>
                            <!-- price.// -->
                            <a href="{{route('admin.products.edit', $item->id)}}" class="btn btn-sm font-sm rounded btn-brand"> <i class="material-icons md-edit"></i> Edit </a>
                            <a href="javascript:void(0)" class="btn btn-sm font-sm btn-light rounded deleteProduct" data-url="{{route('admin.products.destroy', $item->id)}}"> <i class="material-icons md-delete_forever"></i> Delete </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="pagination-area mt-30 mb-50">
    {!!$products->links()!!}
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