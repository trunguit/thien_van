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
                                        <img src="{{ asset($product->avatar->path) }}"
                                            alt="freash vegetable , 2 pc approx. 50 to 500 gm"
                                            title="freash vegetable , 2 pc approx. 50 to 500 gm" data-sizes="auto"
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
                                            <img src="{{ asset($item->path) }}"
                                                alt="freash vegetable , 2 pc approx. 50 to 500 gm"
                                                title="freash vegetable , 2 pc approx. 50 to 500 gm" data-sizes="auto"
                                                srcset="{{ asset($item->path) }}" data-srcset="{{ asset($item->path) }}"
                                                class="lazyload" />
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                        </section>
                        <div class="col-xl-6 col-md-6 col-12">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-12 prorightw">
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
                                                    <span class="price-label">

                                                    </span>
                                                    <span class="price-now-label" style="display: none;">

                                                    </span>
                                                    <span data-product-price-without-tax=""
                                                        class="price price--withoutTax">Giá : Liên hệ</span>
                                                </div>


                                            </div>

                                            <div data-content-region="product_below_price"></div>
                                            <div class="add-to-card">
                                                <button class="button button--primary quote-request" type="button"><i
                                                        class="fa fa-shopping-bag" aria-hidden="true"></i> Báo
                                                    giá</button>
                                            </div>
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
                                    <h1 class="text-center mb-5">
                                        Hướng Dẫn Mua Hàng
                                    </h1>
                                    <div class="card">
                                        <div class="card-header">
                                            <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button aria-controls="step1" aria-selected="true"
                                                        class="nav-link active" data-bs-target="#step1"
                                                        data-bs-toggle="tab" id="step1-tab" role="tab"
                                                        type="button">
                                                        1. Đặt Hàng Online
                                                    </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button aria-controls="step2" aria-selected="false" class="nav-link"
                                                        data-bs-target="#step2" data-bs-toggle="tab" id="step2-tab"
                                                        role="tab" type="button">
                                                        2. Xác Nhận Đơn Hàng
                                                    </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button aria-controls="step3" aria-selected="false" class="nav-link"
                                                        data-bs-target="#step3" data-bs-toggle="tab" id="step3-tab"
                                                        role="tab" type="button">
                                                        3. Thành Phẩm
                                                    </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button aria-controls="step4" aria-selected="false" class="nav-link"
                                                        data-bs-target="#step4" data-bs-toggle="tab" id="step4-tab"
                                                        role="tab" type="button">
                                                        4. Giao Hàng
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
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
                                                    class="price price--withoutTax">Liên hệ</span>
                                            </div>
                                            <div class="price-section d-inline-block price-section--withoutTax non-sale-price--withoutTax"
                                                style="display: none;">

                                                <span data-product-non-sale-price-without-tax=""
                                                    class="price price--non-sale">

                                                </span>
                                            </div>
                                        </div>

                                        <figcaption class="card-figcaption">
                                            <div class="card-figcaption-body">
                                                <!-- quick view icon -->
                                                <button class="button button--small card-figcaption-button quickview"
                                                    data-product-id="111" tabindex="0"><!-- Quick view --><svg
                                                        width="20px" height="20px">
                                                        <use xlink:href="#bquick"></use>
                                                    </svg></button>
                                                <!-- compare icon -->

                                                <label class="button button--small card-figcaption-button bcom"
                                                    for="compare-111" title="Compare">
                                                    <svg width="20px" height="20px">
                                                        <use xlink:href="#compare"></use>
                                                    </svg><input class="wb-compare" type="checkbox" name="products[]"
                                                        value="111" id="compare-111" data-compare-id="111"
                                                        tabindex="0">
                                                </label>

                                            </div>
                                        </figcaption>
                                        <!-- add to cart icon -->
                                        <div class="singleprobtn">
                                            <a href="javascript:void(0)" data-event-type="product-click" title="Báo giá"
                                                class="button button--small card-figcaption-button myadcart"
                                                data-product-id="111" tabindex="0"><svg width="20px" height="20px">
                                                    <use xlink:href="#hcart"></use>
                                                </svg><span class="cart-text">Báo giá</span></a>
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
            </div>
        </div>
    </main>

    <style>
        .thumbnail-slider {
            margin-top: 10px;
        }

        .thumbnail-slider img {
            width: 70px;
            height: 70px;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
        }

        .quote-request {

            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 16px;
            line-height: 22px;
            font-weight: 700;
            margin-bottom: 10px;
            white-space: nowrap;
            padding: 13px 30px;
            border: none;
            border-radius: 10px;
            letter-spacing: 0;
            color: #347758;
            background-color: #f2b922;
            transition: all 0.3s ease;

        }

        .quote-request:hover {
            background-color: #c0951f;
            color: #000000;
            text-decoration: none;
        }

        .fa-shopping-bag {
            margin-right: 11px;
            margin-bottom: 3px;
        }

        .modal {
            z-index: 1050 !important;
        }

        .modal-backdrop {
            z-index: 1040 !important;
        }
    </style>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $(".productView-thumbnails").owlCarousel({
                items: 4,
                margin: 10,
                loop: true,
                nav: false
            });
            $(".productView-thumbnail-link").click(function(e) {
                e.preventDefault();
                var newSrc = $(this).attr("data-image-gallery-new-image-url");
                $(".productView-image img").attr("src", newSrc)
                    .attr("srcset", newSrc)
                    .attr("data-srcset", newSrc);
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
