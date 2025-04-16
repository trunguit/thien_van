@extends('admin.layouts.master')

@section('content')
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Chi tiết đơn hàng</h2>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-7">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="40%">Sản phẩm</th>
                                <th width="20%">Giá</th>
                                <th width="20%">Số lượng</th>
                                <th width="20%" class="text-end">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderDetails as $item)
                            <tr>
                                <td>
                                    <a class="itemside" href="#">
                                        <div class="left">
                                            <img src="{{ $item->product->avatar ? asset($item->product->avatar->path) : asset('admin/imgs/image_default.webp') }}" width="40" height="40" class="img-xs"
                                                alt="Item">
                                        </div>
                                        <div class="info">{{$item->product_name}}
                                           <p>size: {{$item->size}}</p> 
                                           <p>color: {{$item->color}}</p>
                                        </div>
                                    </a>
                                </td>
                                <td>{{number_format($item->price)}}</td>
                                <td>{{$item->qty}}</td>
                                <td class="text-end">{{number_format($item->price * $item->qty)}}</td>
                            </tr>
                            @endforeach
                          
                         
                            <tr>
                                <td colspan="4">
                                    <article class="float-end">
                                       
                                        <dl class="dlist">
                                            <dt>Tổng cộng</dt>
                                            <dd><b class="h5">{{number_format($order->total)}}</b></dd>
                                        </dl>
                                        
                                    </article>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- table-responsive// -->
            </div>
            <!-- col// -->
            <div class="col-lg-1"></div>
            <div class="col-lg-4">
                <div class="box shadow-sm bg-light">
                    <h6 class="mb-15">Thông tin khách hàng</h6>
                    <p>
                        Tên: {{$order->customer_name}} <br>
                        Email: {{$order->customer_email}} <br>
                        Số điện thoại: {{$order->customer_phone}} <br>
                        Địa chỉ: {{$order->customer_address}}
                    </p>
                </div>
                <div class="h-25 pt-4">
                    <form action="{{route('admin.orders.update')}}" method="POST">
                        <div class="mb-3">
                            <label>Ghi chú</label>
                            @csrf
                            <input type="hidden" name="id" value="{{$order->id}}">
                            <textarea class="form-control" name="note" id="note" placeholder="">{{$order->note}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Lưu ghi chú</button>
                    </form>
                </div>
            </div>
            <!-- col// -->
        </div>
    </div>
@endsection
