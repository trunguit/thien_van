@extends('frontend.layouts.master')
@section('title', @$settings->site_name)
@section('description', @$settings->description)
@section('keywords', @$settings->keywords)
@section('content')
<main class="body" id="main-content" role="main" data-currency-code="INR">
    <div data-content-region="home_below_menu"></div>
    @include('frontend.home.sliders')
    <div data-content-region="home_below_carousel"></div>

    <div class="">


        <div class="main full">
            <div class="container section-space">
                <div class="row deliveryinfo row-space">
                    <div class="col-md-3 col-sm-6 col-12 service-cont">
                        <div class="list-unstyled">
                            <ul class="service">
                                <li>
                                    <span>
                                        <svg width="36px" height="36px">
                                            <use xlink:href="#support"></use>
                                        </svg>
                                    </span>
                                </li>
                                <li class="text-left">
                                    <h4>Hỗ trợ 24/7</h4>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12 sbr service-cont">
                        <div class="list-unstyled">
                            <ul class="service">
                                <li>
                                    <span>
                                        <svg width="36px" height="36px">
                                            <use xlink:href="#shipping"></use>
                                        </svg>
                                    </span>
                                </li>
                                <li class="text-left">
                                    <h4>Miễn phí vận chuyển</h4>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12 sbr service-cont">
                        <div class="list-unstyled">
                            <ul class="service">
                                <li>
                                    <span>
                                        <svg width="36px" height="36px">
                                            <use xlink:href="#money"></use>
                                        </svg>
                                    </span>
                                </li>
                                <li class="text-left">
                                    <h4>Đảm bảo hoàn tiền</h4>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12 sbr service-cont">
                        <div class="list-unstyled">
                            <ul class="service">
                                <li>
                                    <span>
                                        <svg width="36px" height="36px">
                                            <use xlink:href="#ship"></use>
                                        </svg>
                                    </span>
                                </li>
                                <li class="text-left">
                                    <h4>Ưu đãi giảm giá</h4>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @include('frontend.home.categories')

            <div class="all-btn category-img">

                <button aria-label="carousel.arrowAriaLabel "
                    class="js-product-prev-arrow-cate slick-prev slick-arrow"><i
                        class="fa fa-angle-left"></i></button>


                <button aria-label="carousel.arrowAriaLabel "
                    class="js-product-next-arrow-cate slick-next slick-arrow"><i
                        class="fa fa-angle-right"></i></button>

            </div>
            @foreach ($categories as $category)
                @include('frontend.home.product', ['category' => $category])
            @endforeach
           
        </div>
        <div data-content-region="home_below_top_products"></div>
        @include('frontend.home.banners')
        <div data-content-region="home_below_top_products"></div>
        @include('frontend.home.testimonials')



        
      
        <div data-content-region="home_below_featured_products"></div>
        @include('frontend.home.brand')
        @include('frontend.home.blogs', ['blogs' => $blogs])


    </div>

    </div>
    <div id="modal" class="modal" data-reveal data-prevent-quick-search-close>
        <button class="modal-close" type="button" title="Close">
            <span class="aria-description--hidden">Close</span>
            <span aria-hidden="true">&#215;</span>
        </button>
        <div class="modal-content"></div>
        <div class="loadingOverlay"></div>
    </div>
    <div id="alert-modal" class="modal modal--alert modal--small" data-reveal data-prevent-quick-search-close>
        <div class="alert-icon error-icon">
            <span class="icon-content">
                <span class="line line-left"></span>
                <span class="line line-right"></span>
            </span>
        </div>

        <div class="alert-icon warning-icon">
            <div class="icon-content">!</div>
        </div>

        <div class="modal-content"></div>

        <div class="button-container">
            <button type="button" class="confirm button" data-reveal-close>common.ok</button>
            <button type="button" class="cancel button" data-reveal-close>Cancel</button>
        </div>
    </div>
</main>
@endsection
