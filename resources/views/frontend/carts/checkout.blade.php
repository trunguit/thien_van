@push('css')
<link data-stencil-stylesheet
        href="../frontend/s-a4jwov0yt3/stencil/10642b80-fc20-013a-d182-5e560fa59e55/css/checkout.css"
        rel="stylesheet">
@endpush
@extends('frontend.layouts.master')
@section('title', 'Thanh toán')
@section('meta_description', 'Thanh toán')
@section('content')
<div class="container all-container mb-4">
    <nav aria-label="Breadcrumb">
        <ol class="breadcrumbs breadcrumbs-bg">
            <li class="breadcrumb ">
                <a class="breadcrumb-label" href="{{ route('home') }}">
                    <span>Trang chủ</span>
                </a>

            </li>
            <li class="breadcrumb is-active">
                <a class="breadcrumb-label" aria-current="page">
                    <span>Thanh toán</span>
                </a>
            </li>
        </ol>
    </nav>
</div>
    <div id="checkout-app">
        <div class="remove-checkout-step-numbers" data-test="checkout-page-container" id="checkout-page-container">
            <div class="layout optimizedCheckout-contentPrimary">
                <div>
                    <div class="layout-main">
                        <div class="card">
                            <div class="card-header  text-white">
                                <h4 class="mb-0">Thông tin khách hàng</h4>
                            </div>
                            <div class="card-body">
                                <form id="checkout-form" action="{{route('frontend.processCart')}}" method="POST">
                                    @csrf
                                    
                                    <!-- Thông tin khách hàng -->
                                    <div class="mb-3 mt-3">
                                        <label for="customer_name" class="form-label">Họ và tên <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                                        <div class="invalid-feedback">Vui lòng nhập họ tên</div>
                                    </div>
            
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="phone" class="form-label">Số điện thoại <span class="text-danger">*</span></label>
                                            <input type="tel" class="form-control" id="phone" name="customer_phone" pattern="[0-9]{10,11}" required>
                                            <div class="invalid-feedback">Số điện thoại 10-11 chữ số</div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="customer_email">
                                            <div class="invalid-feedback">Email không hợp lệ</div>
                                        </div>
                                    </div>
            
                                    <!-- Địa chỉ giao hàng -->
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Địa chỉ giao hàng <span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="address" name="customer_address" rows="3" required></textarea>
                                        <div class="invalid-feedback">Vui lòng nhập địa chỉ</div>
                                    </div>
            
                                    <!-- Ghi chú -->
                                    <div class="mb-3">
                                        <label for="note" class="form-label">Ghi chú đơn hàng</label>
                                        <textarea class="form-control" id="note" name="note" rows="2"></textarea>
                                    </div>
            
                                    <button type="submit" class="btn btn-primary btn-lg w-100">Hoàn tất đơn hàng</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <aside class="layout-cart">
                        <article class="cart optimizedCheckout-orderSummary" data-test="cart">
                            <header class="cart-header">
                                <h3 class="cart-title optimizedCheckout-headingSecondary">Thông tin đơn hàng</h3><a
                                    class="cart-header-link" data-test="cart-edit-link"
                                    href="{{route('cart.index')}}" id="cart-edit-link"
                                    target="_top">Cập nhật giỏ hàng</a>
                            </header>
                            <section class="cart-section optimizedCheckout-orderSummary-cartSection">
                                <h3 class="cart-section-heading optimizedCheckout-contentPrimary"
                                    data-test="cart-count-total">{{$total}} Sản phẩm</h3>
                                <ul aria-live="polite" class="productList">
                                    @foreach ($cartItems as $item)
                                    <li class="productList-item is-visible">
                                        <div class="product" data-test="cart-item">
                                            <figure class="product-column product-figure"><img
                                                    alt="{{ $item->name }}"
                                                    data-test="cart-item-image"
                                                    src="{{ $item->options->image }}">
                                            </figure>
                                            <div class="product-column product-body">
                                                <h4 class="product-title optimizedCheckout-contentPrimary"
                                                    data-test="cart-item-product-title">{{$item->qty}} x {{ $item->name }}</h4>
                                                <ul class="product-options optimizedCheckout-contentSecondary"
                                                    data-test="cart-item-product-options">
                                                    <li class="product-option" data-test="cart-item-product-option">Color
                                                        <span class="form-option-variant form-option-variant--color" title="Red"
                                            style="background-color: {{ $item->options->color }}"></span></li>
                                                    <li class="product-option" data-test="cart-item-product-option">Size
                                                        {{$item->options->size}}</li>
                                                </ul>
                                            </div>
                                            <div class="product-column product-actions">
                                                <div class="product-price optimizedCheckout-contentPrimary"
                                                    data-test="cart-item-product-price">{{number_format( $item->price*$item->qty)}}đ</div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                   
                                </ul>
                            </section>
                            <section class="cart-section optimizedCheckout-orderSummary-cartSection">
                                {{-- <div data-test="cart-subtotal">
                                    <div aria-live="polite"
                                        class="cart-priceItem optimizedCheckout-contentPrimary cart-priceItem--subtotal">
                                        <span class="cart-priceItem-label"><span data-test="cart-price-label">Subtotal
                                            </span></span><span class="cart-priceItem-value"><span
                                                data-test="cart-price-value">₹198.00</span></span></div>
                                </div>
                                <div data-test="cart-shipping">
                                    <div aria-live="polite" class="cart-priceItem optimizedCheckout-contentPrimary"><span
                                            class="cart-priceItem-label"><span data-test="cart-price-label">Shipping
                                            </span></span><span class="cart-priceItem-value"><span
                                                data-test="cart-price-value">--</span></span></div>
                                </div>
                                <div data-test="cart-taxes">
                                    <div aria-live="polite" class="cart-priceItem optimizedCheckout-contentPrimary"><span
                                            class="cart-priceItem-label"><span data-test="cart-price-label">Tax
                                            </span></span><span class="cart-priceItem-value"><span
                                                data-test="cart-price-value">₹0.00</span></span></div>
                                </div><a aria-controls="redeemable-collapsable" aria-expanded="false"
                                    class="redeemable-label" data-test="redeemable-label" href="#">Coupon/Gift
                                    Certificate</a>
                            </section> --}}
                            <section class="cart-section optimizedCheckout-orderSummary-cartSection">
                                <div data-test="cart-total">
                                    <div aria-live="polite"
                                        class="cart-priceItem optimizedCheckout-contentPrimary cart-priceItem--total"><span
                                            class="cart-priceItem-label"><span data-test="cart-price-label">Tổng tiền
                                            </span></span><span class="cart-priceItem-value"><span
                                                data-test="cart-price-value">{{ Cart::total() }}đ</span></span></div>
                                </div>
                            </section>
                        </article>
                    </aside>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush
