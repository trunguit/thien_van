@extends('frontend.layouts.master')
@section('title', $product->name)
@section('meta_description', $product->meta_description)
@section('content')
    <main class="body" id="main-content" role="main" data-currency-code="INR">
        <div class="container all-container">
            <nav aria-label="Breadcrumb">
                <ol class="breadcrumbs breadcrumbs-bg">
                    <li class="breadcrumb ">
                        <a class="breadcrumb-label" href="{{ route('home') }}">
                            <span>Trang chủ</span>
                        </a>

                    </li>
                    @if ($product->category->getParentName() != '')
                        <li class="breadcrumb ">
                            <a class="breadcrumb-label" href="{{ $product->category->getParentURL() }}">
                                <span>{{ $product->category->getParentName() }}</span>
                            </a>
                        </li>
                    @endif
                    <li class="breadcrumb ">
                        <a class="breadcrumb-label" href="{{ route('category', $product->category->alias) }}"
                            aria-current="page">
                            <span>{{ $product->category->name }}</span>
                        </a>
                    </li>
                    <li class="breadcrumb is-active">
                        <a class="breadcrumb-label" href="#" aria-current="page">
                            <span>{{ $product->name }}</span>
                        </a>
                    </li>
                </ol>
            </nav>
        </div>

        <div>

            <div class="productView">
                <div class="container">
                    @include('frontend.layouts.notification')
                    <div class="row">

                        <section class="productView-images col-xl-4 col-md-4 col-12" data-image-gallery>
                            <span data-carousel-content-change-message class="aria-description--hidden" aria-live="polite"
                                role="status"></span>
                            <figure class="productView-image" data-image-gallery-main
                                data-zoom-image="{{ asset($product->avatar->path) }}">
                                <div class="productView-img-container">
                                    <a href="{{ asset($product->avatar->path) }}" target="_blank">
                                        <img src="{{ asset($product->avatar->path) }}" alt="{{ $product->name }}"
                                            title="{{ $product->name }}" data-sizes="auto"
                                            srcset="{{ asset($product->avatar->path) }}"
                                            data-srcset="{{ asset($product->avatar->path) }}"
                                            class="lazyload productView-image--default" data-main-image />
                                    </a>
                                </div>
                            </figure>

                            <ul id="addi-img" class="productView-thumbnails owl-carousel">
                                @foreach ($product->images as $item)
                                    <li class="productView-thumbnail">
                                        <a class="productView-thumbnail-link" href="{{ asset($item->path) }}"
                                            data-image-gallery-item
                                            data-image-gallery-new-image-url="{{ asset($item->path) }}"
                                            data-image-gallery-new-image-srcset="{{ asset($item->path) }}"
                                            data-image-gallery-zoom-image-url="{{ asset($item->path) }}">
                                            <img src="{{ asset($item->path) }}" alt="{{ $item->name }}"
                                                title="{{ $item->name }}" data-sizes="auto"
                                                srcset="{{ asset($item->path) }}" data-srcset="{{ asset($item->path) }}"
                                                class="lazyload" />
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                        </section>
                        <div class="col-xl-8 col-md-7 col-12">
                            <div class="row">
                                <div class="col-xl-7 col-lg-7 col-12 prorightw">
                                    <section class="productView-details product-data">
                                        <div class="productView-product">
                                            <h1 class="productView-title">{{ $product->name }}</h1>
                                            <hr>
                                            <h2 class="productView-brand">
                                                <a
                                                    href="{{ route('category', $product->category->alias) }}"><span>{{ $product->category->name }}</span></a>
                                            </h2>

                                            <div class="productView-price">

                                                <div class="price-section d-inline-block price-section--withoutTax rrp-price--withoutTax"
                                                    style="display: none;">

                                                    <span data-product-rrp-price-without-tax="" class="price price--rrp">

                                                    </span>
                                                </div>

                                                <div class="price-section d-inline-block price-section--withoutTax">
                                                    <span class="price-label" style="display: none;">

                                                    </span>
                                                    <span class="price-now-label">

                                                    </span>
                                                    <span data-product-price-without-tax=""
                                                        class="price price--withoutTax">{{ number_format($product->sale_price) }}đ</span>
                                                </div>
                                                <div
                                                    class="price-section d-inline-block price-section--withoutTax non-sale-price--withoutTax">

                                                    <span data-product-non-sale-price-without-tax=""
                                                        class="price price--non-sale">
                                                        {{ number_format($product->price) }}đ
                                                    </span>
                                                </div>
                                                <div class="price-section d-inline-block price-section--saving price"
                                                    style="display: none;">
                                                    <span class="price">(You save</span>
                                                    <span data-product-price-saved="" class="price price--saving">

                                                    </span>
                                                    <span class="price">)</span>
                                                </div>
                                            </div>

                                            <div data-content-region="product_below_price"></div>
                                            <div class="productView-rating">
                                                <div class="comments_note wb-list-product-reviews">
                                                    <span class="avg-rate bg-re3">
                                                        <span class="rate-tot winter-count">0</span><i
                                                            class="fa fa-star emstar"></i>
                                                        <span class="or-rate winter-review">
                                                            <span class="icon icon--ratingEmpty"><i
                                                                    class="fa fa-star-o"></i></span><span
                                                                class="icon icon--ratingEmpty"><i
                                                                    class="fa fa-star-o"></i></span><span
                                                                class="icon icon--ratingEmpty"><i
                                                                    class="fa fa-star-o"></i></span><span
                                                                class="icon icon--ratingEmpty"><i
                                                                    class="fa fa-star-o"></i></span><span
                                                                class="icon icon--ratingEmpty"><i
                                                                    class="fa fa-star-o"></i></span><!-- snippet location product_rating -->
                                                        </span>
                                                    </span>
                                                </div>
                                                <span>(No reviews yet)</span>
                                                <a href="#"
                                                    class="productView-reviewLink productView-reviewLink--new"
                                                    role="button">
                                                    Write a Review
                                                </a>

                                            </div>
                                            <div data-content-region="product_below_price"></div>
                                            <dl class="productView-info">
                                                <dt class="productView-info-name sku-label">SKU:</dt>
                                                <dd class="productView-info-value" data-product-sku="">
                                                    {{ $product->sku }}</dd>
                                                <dt class="productView-info-name upc-label">UPC:</dt>
                                                <dd class="productView-info-value" data-product-upc="">
                                                    {{ $product->upc }}</dd>
                                                <dt class="productView-info-name">Condition:</dt>
                                                <dd class="productView-info-value">{{ $product->condition }}</dd>
                                                <dt class="productView-info-name">Minimum Purchase:</dt>
                                                <dd class="productView-info-value">{{ $product->min_qty }} unit</dd>
                                                <dt class="productView-info-name">Maximum Purchase:</dt>
                                                <dd class="productView-info-value">{{ $product->max_qty }} units</dd>

                                            </dl>
                                        </div>

                                    </section>
                                </div>
                                <div class="col-xl-5 col-lg-5 col-12 prorightwt">
                                    <section class="productView-details">
                                        <div class="productView-options">
                                            <form class="form" method="post" action="#"
                                                enctype="multipart/form-data" data-cart-item-add>
                                                <input type="hidden" name="action" value="add">
                                                <input type="hidden" name="product_id" value="111" />
                                                <div data-product-option-change>
                                                    <div class="form-field" data-product-attribute="swatch"
                                                        role="radiogroup" aria-labelledby="swatchGroup_113">
                                                        <label
                                                            class="form-label form-label--alternate form-label--inlineSmall"
                                                            id="swatchGroup_113">
                                                            Color:
                                                            <span data-option-value></span>

                                                            <small>
                                                                *
                                                            </small>
                                                        </label>
                                                        <span
                                                            class="swatch-option-message aria-description--hidden u-hidden">
                                                            Selected Color is
                                                        </span>

                                                        @foreach ($product->colorAttributes as $item)
                                                            <div class="form-option-wrapper">
                                                                <input class="form-radio" type="radio"
                                                                    name="attribute[113]" value="{{ $item->id }}"
                                                                    id="attribute_swatch_113_{{ $item->id }}" required
                                                                    aria-label="Red">
                                                                <label class="form-option form-option-swatch"
                                                                    for="attribute_swatch_113_{{ $item->id }}"
                                                                    data-product-attribute-value="{{ $item->id }}">
                                                                    <span
                                                                        class='form-option-variant form-option-variant--color'
                                                                        title="Red"
                                                                        style="background-color: {{ $item->value }}"></span>
                                                                </label>
                                                            </div>
                                                        @endforeach


                                                    </div>

                                                    <div class="form-field" data-product-attribute="set-rectangle"
                                                        role="radiogroup" aria-labelledby="rectangle-group-label">
                                                        <label
                                                            class="form-label form-label--alternate form-label--inlineSmall"
                                                            id="rectangle-group-label">
                                                            Size:
                                                            <span data-option-value></span>

                                                            <small>
                                                                *
                                                            </small>
                                                        </label>

                                                        @foreach ($product->sizeAttributes as $item)
                                                            <div class="form-option-wrapper">
                                                                <input class="form-radio" type="radio"
                                                                    id="attribute_rectangle__114_{{ $item->id }}"
                                                                    name="size[]" value="{{ $item->id }}" required>
                                                                <label class="form-option"
                                                                    for="attribute_rectangle__114_{{ $item->id }}"
                                                                    data-product-attribute-value="{{ $item->id }}">
                                                                    <span
                                                                        class="form-option-variant">{{ $item->value }}</span>
                                                                </label>
                                                            </div>
                                                        @endforeach


                                                    </div>

                                                </div>
                                                <div class="form-field form-field--stock u-hiddenVisually">
                                                    <label class="form-label form-label--alternate">
                                                        Current Stock:
                                                        <span data-product-stock></span>
                                                    </label>
                                                </div>
                                                <div id="add-to-cart-wrapper" class="add-to-cart-wrapper">

                                                    <div class="form-field form-field--increments">
                                                        <label class="form-label form-label--alternate"
                                                            for="qty[]">Quantity:</label>
                                                        <div class="form-increment" data-quantity-change>
                                                            <button class="button button--icon" data-action="dec">
                                                                <span class="is-srOnly">Decrease Quantity of freash
                                                                    fruit , 1 pc approx. 500 to 500 gm</span>
                                                                    <i class="fa fa-angle-down qty-down" aria-hidden="true"></i>
                                                            </button>
                                                            <input class="form-input form-input--incrementTotal"
                                                                id="qty[]" name="qty[]" type="tel"
                                                                value="1" data-quantity-min="1"
                                                                data-quantity-max="10" min="1" pattern="[0-9]*"
                                                                aria-live="polite">
                                                            <button class="button button--icon" data-action="inc">
                                                                <span class="is-srOnly">Increase Quantity of freash
                                                                    fruit , 1 pc approx. 500 to 500 gm</span>
                                                                    <i class="fa fa-angle-up qty-up" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <div class="alertBox productAttributes-message" style="display:none">
                                                        <div class="alertBox-column alertBox-icon">
                                                            <icon glyph="ic-success" class="icon" aria-hidden="true">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24">
                                                                    <path
                                                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z">
                                                                    </path>
                                                                </svg>
                                                            </icon>
                                                        </div>
                                                        <p class="alertBox-column alertBox-message"></p>
                                                    </div>
                                                    <div class="form-action">
                                                        <input id="form-action-addToCart"
                                                            data-wait-message="Adding to cart…"
                                                            class="button button--primary" type="submit"
                                                            value="Add to Cart">
                                                        <span
                                                            class="product-status-message aria-description--hidden">Adding
                                                            to cart… The item has been added</span>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                    <article class="productView-description">
                        <ul class="tabs" data-tab="">
                            <li class="tab is-active">
                                <a class="tab-title" href="#tab-description">Giới thiệu sản phẩm</a>
                            </li>
                            <li class="tab ">
                                <a class="tab-title" href="#tab-warranty">Hướng dẫn mua hàng</a>
                            </li>
                        </ul>
                        <div class="tabs-contents">
                            <div class="tab-content is-active" id="tab-description">
                                <p>{!! $product->description !!}</p>
                            </div>
                            <div class="tab-content " id="tab-warranty">
                                <div class="container my-5">
                                  Đang cập nhật ...
                                </div>
                            </div>
                            <div class="tab-content" id="tab-reviews">
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <div data-content-region="product_below_content"></div>
            <div class="container realted section-space">
                <div class="all-head">
                    <h2 class="page-heading">Sản phẩm liên quan</h2>
                </div>
                @if(count($products_related) > 0)
                    
                <div class="has-jsContent next-prevb" id="tab-related">
                    <section class="productCarousel slick-initialized slick-slider slick-dotted" data-list-name=""
                        data-slick='{
                        "infinite": false,
                        "mobileFirst": true,
                        "rows": 1,
                        "prevArrow": ".js-related-product-arrow.js-product-prev-arrow-featured",
                        "nextArrow": ".js-related-product-arrow.js-product-next-arrow-featured",
                        "responsive": [
                            {
                                "breakpoint": 1199,
                                "settings": {
                                    "slidesToShow": 4,
                                    "slidesToScroll": 1
                                }
                            },
                        {
                                "breakpoint": 991,
                                "settings": {
                                    "slidesToShow": 3,
                                    "slidesToScroll": 1
                                }
                            },
                            {
                                "breakpoint": 800,
                                "settings": {
                                    "slidesToShow": 3,
                                    "slidesToScroll": 1
                                }
                            },
                            {
                                "breakpoint": 767,
                                "settings": {
                                    "slidesToShow": 3,
                                    "slidesToScroll": 1
                                }
                            },
                            {
                                "breakpoint": 600,
                                "settings": {
                                    "slidesToShow": 3,
                                    "slidesToScroll": 1
                                }
                            },
                            {
                                "breakpoint": 575,
                                "settings": {
                                    "slidesToShow": 3,
                                    "slidesToScroll": 1
                                }
                            },
                            {
                                "breakpoint": 0,
                                "settings": {
                                    "slidesToShow": 2,
                                    "slidesToScroll": 1
                                }
                            }
                        ]
                    }'>

                        @foreach ($products_related as $item)
                            <div data-product-slide=""
                                class="productCarousel-slide js-product-slide slick-slide slick-current slick-active"
                                style="width: 343px;" data-slick-index="0" aria-hidden="false">
                                <article class="new-card card card-figure ">

                                    <figure class="card-figure featured-imag">
                                        <a href="{{ route('product', ['slug' => $item->slug]) }}" tabindex="0">
                                            <div class="card-img-container">
                                                <img src="{{ asset($item->avatar->path) }}" alt="{{ $item->name }}"
                                                    title="{{ $item->name }}"
                                                    class="card-image lazyautosizes ls-is-cached lazyloaded"
                                                    sizes="320px">
                                            </div>
                                        </a>
                                    </figure>
                                    <div class="card-body featured-caption">
                                        <p class="card-text" data-test-info-type="brandName">{{ $item->category->name }}
                                        </p>
                                        <h4 class="card-title">
                                            <a href="{{ route('product', ['slug' => $item->slug]) }}"
                                                tabindex="0">{{ $item->name }}</a>
                                        </h4>
                                        <div class="card-text myprice" data-test-info-type="price">

                                            <div class="price-section d-inline-block price-section--withoutTax rrp-price--withoutTax"
                                                style="display: none;">

                                                <span data-product-rrp-price-without-tax="" class="price price--rrp">

                                                </span>
                                            </div>

                                            <div class="price-section d-inline-block price-section--withoutTax">
                                                <span class="price-label">

                                                </span>
                                                <span class="price-now-label" style="display: none;">

                                                </span>
                                                <span data-product-price-without-tax=""
                                                    class="price price--withoutTax">{{ number_format($item->sale_price) }}đ</span>
                                            </div>
                                            <div class="price-section d-inline-block price-section--withoutTax non-sale-price--withoutTax"
                                                style="display: none;">

                                                <span data-product-non-sale-price-without-tax=""
                                                    class="price price--non-sale">{{ number_format($item->price) }}đ</span>
                                                </span>
                                            </div>
                                        </div>

                                        
                                        <!-- add to cart icon -->
                                        <div class="singleprobtn">
                                            <a href="{{ route('product', ['slug' => $item->slug]) }}" data-event-type="product-click" title="Báo giá"
                                                class="button button--small card-figcaption-button myadcart"
                                                data-product-id="111" tabindex="0"><svg width="20px" height="20px">
                                                    <use xlink:href="#hcart"></use>
                                                </svg><span class="cart-text">Thêm giỏ hàng</span></a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                        <span data-carousel-content-change-message class="aria-description--hidden" aria-live="polite"
                            role="status"></span>
                    </section>

                    <div class="all-btn related-product">
                        <button aria-label="Go to slide 3 of 3"
                            class="js-related-product-arrow js-product-prev-arrow-featured slick-prev slick-arrow slick-disabled"
                            aria-disabled="true" tabindex="-1" style=""><i class="fa fa-angle-left"></i><span
                                data-carousel-tooltip="" class="carousel-tooltip"
                                aria-label="Go to slide 3 of 3"></span></button>
                        <button aria-label="Go to slide 2 of 3"
                            class="js-related-product-arrow js-product-next-arrow-featured slick-next slick-arrow"
                            aria-disabled="false" tabindex="0" style=""><i class="fa fa-angle-right"></i><span
                                data-carousel-tooltip="" class="carousel-tooltip"
                                aria-label="Go to slide 2 of 3"></span></button>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </main>


@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Initialize Owl Carousel for thumbnails
            $("#addi-img").owlCarousel({
                itemsCustom: [
                    [0, 1],
                    [320, 3],
                    [425, 4],
                    [575, 5],
                    [768, 3],
                    [991, 4],
                    [1409, 5]
                ],
                autoPlay: 7000,
                navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>',
                    '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                ],
                navigation: false,
                pagination: false
            });

            // Handle click on thumbnails to change main image
            $(".productView-thumbnail-link").click(function(e) {
                e.preventDefault();

                // Get the new image data from clicked thumbnail
                const newImageUrl = $(this).data('image-gallery-new-image-url');
                const newImageSrcset = $(this).data('image-gallery-new-image-srcset');
                const zoomImageUrl = $(this).data('image-gallery-zoom-image-url');

                // Update main image
                const mainImage = $(".productView-image--default");
                mainImage.attr('src', newImageUrl);
                mainImage.attr('srcset', newImageSrcset);

                // Update zoom image data if you're using zoom functionality
                $(".productView-image").data('zoom-image', zoomImageUrl);

                // If you're using a zoom plugin, you might need to reinitialize it here
                // For example, if using elevateZoom:
                // $(".productView-image--default").elevateZoom({zoomType: "inner", cursor: "crosshair"});
            });
        });
        $('.quote-request').click(function() {
            var productId = {{ $product->id }};
            var productName = '{{ $product->name }}';
            var productImage = '{{ asset($product->avatar->path) }}';
            $('#productImage').attr('src', productImage);
            $('#productName').html(productName);
            $('#productId').val(productId);
            $('#quoteModal').modal('show');

        })
    </script>
@endpush
