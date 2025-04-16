@extends('frontend.layouts.master')
@section('title', 'Giỏ hàng')
@section('meta_description', 'Giỏ hàng')
@section('content')
    <div class="container all-container">
        <nav aria-label="Breadcrumb">
            <ol class="breadcrumbs breadcrumbs-bg">
                <li class="breadcrumb ">
                    <a class="breadcrumb-label" href="{{ route('home') }}">
                        <span>Trang chủ</span>
                    </a>

                </li>
                <li class="breadcrumb is-active">
                    <a class="breadcrumb-label" aria-current="page">
                        <span>Giỏ hàng</span>
                    </a>
                </li>
            </ol>
        </nav>
    </div>
    <h1 class="page-heading" data-cart-page-title="">
        Giỏ hàng của bạn <span class="total-count">({{ Cart::count() }}</span> sản phẩm)
    </h1>
    <div class="container">
        <div data-cart-status="">
        </div>

        <div class="loadingOverlay" style="display: none;"></div>

        <div data-cart-content="" class="cart-content-padding-right">
            <table class="cart" data-cart-quantity="2">
                <thead class="cart-header">
                    <tr>
                        <th class="cart-header-item" colspan="2">Sản phẩm</th>
                        <th class="cart-header-item">Giá</th>
                        <th class="cart-header-item cart-header-quantity">Số lượng</th>
                        <th class="cart-header-item">Tổng tiền</th>
                    </tr>
                </thead>
                <tbody class="cart-list">
                    @foreach ($cartItems as $item)
                        <tr class="cart-item" data-item-row="">
                            <td class="cart-item-block cart-item-figure">
                                <img src="{{ $item->options->image != '' ? asset($item->options->image) : asset('admin/imgs/image_default.webp') }}"
                                    alt="{{ $item->name }}" title="{{ $item->name }}" data-sizes="auto"
                                    class="cart-item-image lazyautosizes lazyloaded" sizes="80px">
                            </td>
                            <td class="cart-item-block cart-item-title">
                                <p class="cart-item-brand">{{ $item->options->category }}</p>
                                <h2 class="cart-item-name">
                                    <a class="cart-item-name__label"
                                        href="{{ route('product', ['slug' => $item->slug]) }}">{{ $item->name }}</a>
                                </h2>

                                <dl class="definitionList">
                                    <dt class="definitionList-key">Màu sắc:</dt>
                                    <dd class="definitionList-value">
                                        <span class="form-option-variant form-option-variant--color" title="Red"
                                            style="background-color: {{ $item->options->color }}"></span>
                                    </dd>
                                    <dt class="definitionList-key">Kích thước:</dt>
                                    <dd class="definitionList-value">
                                        {{ $item->options->size }}
                                    </dd>
                                </dl>
                            </td>
                            <td class="cart-item-block cart-item-info">
                                <span class="cart-item-label">Price</span>
                                <span class="cart-item-value ">{{ number_format($item->price) }}đ</span>
                            </td>

                            <td class="cart-item-block cart-item-info cart-item-quantity">

                                <label class="form-label cart-item-label"
                                    for="qty-30fdf1d7-d350-40b8-922b-f0676ad095cf">Quantity:</label>
                                <div class="form-increment">
                                    <button class="button button--icon" data-cart-update=""
                                        data-cart-itemid="{{$item->rowId}}" data-action="dec">
                                        <span class="is-srOnly">Decrease Quantity of freash fruit , 1 pc approx. 500 to 500
                                            gm</span>
                                        <i class="fa fa-angle-down qty-down" aria-hidden="true"></i>
                                    </button>
                                    <input class="form-input form-input--incrementTotal cart-item-qty-input"
                                        id="qty-30fdf1d7-d350-40b8-922b-f0676ad095cf"
                                        name="qty-{{$item->rowId}}" type="tel"
                                        value="{{ $item->qty }}" data-quantity-min="1" data-quantity-max="10"
                                        data-quantity-min-error="The minimum purchasable quantity is 1"
                                        data-quantity-max-error="The maximum purchasable quantity is 10" min="1"
                                        pattern="[0-9]*" data-cart-itemid="{{$item->rowId}}"
                                        data-action="manualQtyChange" aria-label="freash fruit , 1 pc approx. 500 to 500 gm"
                                        aria-live="polite">
                                    <button class="button button--icon" data-cart-update=""
                                        data-cart-itemid="{{$item->rowId}}" data-action="inc">
                                        <span class="is-srOnly">Increase Quantity of freash fruit , 1 pc approx. 500 to 500
                                            gm</span>
                                        <i class="fa fa-angle-up qty-up" aria-hidden="true"></i>
                                    </button>
                                </div>

                            </td>

                            <td class="cart-item-block cart-item-info">
                                <span class="cart-item-label">Total</span>
                                <strong class="cart-item-value  price-item-{{$item->rowId}}">{{ number_format($item->total) }}đ</strong>
                                <button class="cart-remove icon" data-cart-itemid="{{$item->rowId}}"
                                    data-confirm-delete="Are you sure you want to delete this item?"
                                    aria-label="Remove freash fruit , 1 pc approx. 500 to 500 gm from cart">
                                    <svg>
                                        <use xlink:href="#icon-close"></use>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <div data-cart-totals="" class="cart-content-padding-right">
            <ul class="cart-totals">
                {{-- <li class="cart-total">
                    <div class="cart-total-label">
                        <strong>Tạm tính:</strong>
                    </div>
                    <div class="cart-total-value">
                        <span>₹198.00</span>
                    </div>
                </li>
                <li class="cart-total">
                    <div class="cart-total-label">
                        <strong>Shipping:</strong>
                    </div>



                    <div class="cart-total-value">
                        <button data-collapsible="add-shipping" class="shipping-estimate-show"
                            aria-labelledby="estimator-add" aria-label="Add Info" aria-controls="add-shipping"
                            aria-expanded="false">
                            <span class="shipping-estimate-show__btn-name">Add Info</span>
                            <span id="estimator-add" class="u-hidden">Add Info</span>
                            <span id="estimator-close" class="u-hidden">Cancel</span>
                        </button>
                    </div>

                    <div id="add-shipping" class="shipping-estimator u-hidden" aria-hidden="true">
                        <form class="form estimator-form" data-shipping-estimator="">
                            <dl>
                                <dt class="estimator-form-label">
                                    <label class="form-label" for="shipping-country">Country</label>
                                </dt>

                                <dd class="estimator-form-input">
                                    <select class="form-select" id="shipping-country" name="shipping-country"
                                        data-field-type="Country">
                                        <option>Country</option>
                                        <option value="99">
                                            India
                                        </option>
                                    </select>
                                    <span style="display: none;"></span>
                                </dd>

                                <dt class="estimator-form-label">
                                    <label class="form-label" for="shipping-state">State/province</label>
                                </dt>

                                <dd class="estimator-form-input">
                                    <input class="form-input" type="text" id="shipping-state" name="shipping-state"
                                        data-field-type="State" placeholder="State/province">
                                </dd>

                                <dt class="estimator-form-label">
                                    <label class="form-label" for="shipping-city">Suburb/city</label>
                                </dt>
                                <dd class="estimator-form-input">
                                    <input class="form-input" type="text" id="shipping-city" name="shipping-city"
                                        value="" placeholder="Suburb/city">
                                </dd>

                                <dt class="estimator-form-label">
                                    <label class="form-label" for="shipping-zip">Zip/postcode</label>
                                </dt>
                                <dd class="estimator-form-input">
                                    <input class="form-input" type="text" id="shipping-zip" name="shipping-zip"
                                        value="" placeholder="Zip/postcode">
                                </dd>
                                <button class="button button--primary button--small shipping-estimate-submit">Estimate
                                    Shipping</button>
                            </dl>
                        </form>
                        <div class="shipping-quotes" role="alert" aria-atomic="true" aria-live="assertive"></div>
                    </div>
                </li>
                <li class="cart-total">
                    <div class="cart-total-label">
                        <strong>Coupon Code:</strong>
                    </div>
                    <div class="cart-total-value">

                        <button class="coupon-code-add">Add Coupon</button>

                        <button class="coupon-code-cancel" style="display: none;">Cancel</button>
                    </div>

                    <div class="cart-form coupon-code" style="display: none;">
                        <form class="form form--hiddenLabels coupon-form" method="post" action="/cart.php">
                            <label class="form-label" for="couponcode">Enter your coupon code</label>
                            <input class="form-input" data-error="Please enter your coupon code." id="couponcode"
                                type="text" name="couponcode" value="" placeholder="Enter your coupon code">
                            <input class="button button--primary button--small" type="submit" value="Apply">
                            <input type="hidden" name="action" value="applycoupon">
                        </form>
                    </div>
                </li>
                <li class="cart-total">
                    <div class="cart-total-label">
                        <strong>Gift Certificate:</strong>
                    </div>
                    <div class="cart-total-value">

                        <button class="gift-certificate-add">Gift Certificate</button>

                        <button class="gift-certificate-cancel" style="display: none;">Cancel</button>
                    </div>

                    <div class="cart-form gift-certificate-code" style="display: none;">
                        <form class="form form--hiddenLabels cart-gift-certificate-form" method="post"
                            action="/cart.php">
                            <label class="form-label" for="certcode">Enter your certificate code</label>
                            <input class="form-input" id="certcode" type="text" name="certcode" value=""
                                placeholder="Add Certificate">
                            <input class="button button--primary button--small" type="submit" value="Apply">
                            <input type="hidden" name="action" value="applycoupon">
                        </form>
                    </div>
                </li> --}}
                <li class="cart-total">
                    <div class="cart-total-label">
                        <strong>Thành tiền:</strong>
                    </div>
                    <div class="cart-total-value cart-total-grandTotal">
                        <span id="grand-total">{{ Cart::total() }}đ</span></span>
                    </div>
                </li>
            </ul>
        </div>

        <div data-content-region="cart_below_totals"></div>

        <div class="cart-actions cart-content-padding-right">
            <a class="button button--primary" href="{{route('checkout')}}" title="Click here to proceed to checkout">Thanh toán</a>
        </div>

    </div>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <style>
        .toast {
            min-width: 250px;
            padding: 10px 20px;
            margin: 10px;
            border: 1px solid transparent;
            border-radius: 4px;
            font-size: 14px;
            z-index: 9999;
        }

        .toast.toast-success-icon {
            background-color: #0e9749 !important;
            color: #f8f8f8 !important;
            border-color: #c3e6cb !important;
        }

        .toast-error {
            background-color: #ea0e20 !important;
            border-color: #f5c6cb !important;
            color: white !important;
        }

        .toast-close-button {
            color: inherit !important;
            font-size: 18px;
            position: relative;
            right: -10px;
            top: -2px;
        }

        .toast-top-right {
            top: 20% !important;
            right: 20px !important;
            transform: translateY(-50%) !important;
        }
    </style>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
         toastr.options = {
            positionClass: "toast-top-right",
            timeOut: 2500,
            closeButton: true,
            progressBar: false,
            newestOnTop: true,
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            tapToDismiss: true
        };
        $(document).ready(function() {
                    // Xử lý nút tăng số lượng
                    $('[data-action="inc"]').on('click', function(e) {
                        e.preventDefault();
                        updateQuantity($(this), 'inc');
                    });

                    // Xử lý nút giảm số lượng
                    $('[data-action="dec"]').on('click', function(e) {
                        e.preventDefault();
                        updateQuantity($(this), 'dec');
                    });

                    // Xử lý thay đổi số lượng bằng tay
                    $('.cart-item-qty-input').on('change', function() {
                        updateQuantity($(this), 'manual');
                    });

                    // Xử lý xóa sản phẩm
                    $('.cart-remove').on('click', function(e) {
                        e.preventDefault();
                        removeItem($(this));
                    });

                    // Hàm cập nhật số lượng
                    function updateQuantity(element, action) {
                        let rowId = element.data('cart-itemid');
                        let input = element.closest('.form-increment').find('.cart-item-qty-input');
                        let currentQty = parseInt(input.val());
                        let maxQty = parseInt(input.data('quantity-max'));
                        let minQty = parseInt(input.data('quantity-min'));

                        // Xác định số lượng mới
                        let newQty;
                        if (action === 'inc') {
                            newQty = currentQty + 1;
                            if (newQty > maxQty) {
                                toastr.error(input.data('quantity-max-error'));
                                return;
                            }
                        } else if (action === 'dec') {
                            newQty = currentQty - 1;
                            if (newQty < minQty) {
                                toastr.error(input.data('quantity-min-error'));
                                return;
                            }
                        } else {
                            newQty = parseInt(input.val());
                            if (isNaN(newQty)) newQty = currentQty;
                                if (newQty > maxQty) {
                                    toastr.error(input.data('quantity-max-error'));
                                    newQty = maxQty;
                                }
                                if (newQty < minQty) {
                                    toastr.error(input.data('quantity-min-error'));
                                    newQty = minQty;
                                }
                            }

                            // Cập nhật giá trị input
                            input.val(newQty);

                            // Gửi yêu cầu cập nhật lên server
                            $.ajax({
                                url: "{{ route('cart.update') }}",
                                method: 'PATCH',
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    qty: newQty,
                                    rowId: rowId
                                },
                                success: function(response) {
                                    if (response.success) {
                                        // Cập nhật giao diện
                                        updateCartUI(response,rowId);
                                        toastr.success('Đã cập nhật số lượng sản phẩm');
                                    } else {
                                        toastr.error(response.message || 'Có lỗi xảy ra');
                                    }
                                },
                                error: function(xhr) {
                                    toastr.error('Có lỗi xảy ra khi cập nhật giỏ hàng');
                                }
                            });
                        }

                        // Hàm xóa sản phẩm
                        function removeItem(element) {
                            if (!confirm(element.data('confirm-delete') || 'Bạn có chắc chắn muốn xóa sản phẩm này?')) {
                                return;
                            }

                            let rowId = element.data('cart-itemid');

                            $.ajax({
                                url: "{{ route('cart.remove') }}",
                                method: 'DELETE',
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    rowId : rowId
                                },
                                success: function(response) {
                                    if (response.success) {
                                        // Xóa hàng khỏi bảng
                                        element.closest('.cart-item').remove();
                                        // Cập nhật giao diện
                                        updateCartUI(response,rowId);
                                        toastr.success('Đã xóa sản phẩm khỏi giỏ hàng');

                                        // Nếu giỏ hàng trống, reload trang
                                        if (response.count === 0) {
                                            location.reload();
                                        }
                                    } else {
                                        toastr.error(response.message || 'Có lỗi xảy ra');
                                    }
                                },
                                error: function(xhr) {
                                    toastr.error('Có lỗi xảy ra khi xóa sản phẩm');
                                }
                            });
                        }

                        // Hàm cập nhật giao diện giỏ hàng
                        function updateCartUI(data,rowId) {
                            // Cập nhật tổng số sản phẩm
                            $('#cart-count').text(data.count);
                            $('.total-count').text('(' + data.count + ' sản phẩm)');

                            // Cập nhật tổng tiền
                            $('#grand-total').text(data.total + 'đ');
                            if(data.price_item != '0'){
                                $('.price-item-' + rowId).html(data.price_item + 'đ');
                            }
                           
                        }
                    });
    </script>
@endpush
