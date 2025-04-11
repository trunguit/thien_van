@if ($category->children->count() > 0)
    <div class="container section-space tab-product">
        <!-- Nav tabs -->
        <h2 class="home-heading page-heading">{{ $category->name }}</h2>


        <ul class="nav nav-tabs pro-tab" role="tablist">
            @foreach ($category->children as $key => $item)
                <li class="nav-item">
                    <a class="nav-link {{ $key == 0 ? 'active' : '' }}" data-toggle="tab" href="#tab-{{ $item->id }}"
                        role="tab">{{ $item->name }}</a>
                </li>
            @endforeach
        </ul>

        <div class="tab-content protabcont">
            @foreach ($category->children as $key => $item)
                <div id="tab-{{ $item->id }}" class="tab-pane {{ $key == 0 ? 'active show' : 'fade' }}">
                    <section class="productCarousel" data-list-name=""
                        data-slick='{
                        "dots": false,
                        "infinite": false,        
                        "mobileFirst": true,
                        "slidesToShow": 1,
                        "rows": 1,
                        "slidesToScroll": 1,
                        "prevArrow": ".js-product-prev-arrow-new",
                        "nextArrow": ".js-product-next-arrow-new",
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
                        @foreach ($item->productsHome as $product)
                            <div data-product-slide class="productCarousel-slide js-product-slide" class="new-product">
                                <article class="new-card card card-figure ">

                                    <figure class="card-figure featured-imag">
                                        <a href="{{ route('product', $product->alias) }}">
                                            <div class="card-img-container">
                                                <img src="{{ $product->avatar->path }}" alt="{{ $product->name }}"
                                                    title="{{ $product->name }}" data-sizes="auto"
                                                    data-src="{{ $product->avatar->path }}"
                                                    class="lazyload card-image" />
                                            </div>
                                        </a>
                                    </figure>
                                    <div class="card-body featured-caption">
                                        <p class="card-text" data-test-info-type="brandName">
                                            {{ $product->category->name }}</p>
                                        <h4 class="card-title">
                                            <a href="{{ route('product', $product->alias) }}">{{ $product->name }}</a>
                                        </h4>
                                        <div class="card-text myprice" data-test-info-type="price">

                                            <div class="price-section d-inline-block price-section--withoutTax rrp-price--withoutTax"
                                                style="display: none;">

                                                <span data-product-rrp-price-without-tax class="price price--rrp">

                                                </span>
                                            </div>

                                            <div class="price-section d-inline-block price-section--withoutTax">
                                                <span class="price-label">

                                                </span>
                                                <span class="price-now-label" style="display: none;">

                                                </span>
                                                <span data-product-price-without-tax
                                                    class="price price--withoutTax">Liên hệ</span>
                                            </div>
                                            <div class="price-section d-inline-block price-section--withoutTax non-sale-price--withoutTax"
                                                style="display: none;">

                                                <span data-product-non-sale-price-without-tax
                                                    class="price price--non-sale">

                                                </span>
                                            </div>
                                        </div>                                     
                                        <!-- add to cart icon -->
                                        <div class="singleprobtn">
                                            <a href="smith-journal-13/index.html" data-event-type="product-click"
                                                title="Add to Cart"
                                                class="button button--small card-figcaption-button myadcart"
                                                data-product-id="111"><svg width="20px" height="20px">
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
                    <div class="all-btn new-product">
                        <button aria-label="carousel.arrowAriaLabel 12"
                            class="js-product-prev-arrow-new slick-prev slick-arrow"><i
                                class="fa fa-angle-left"></i></button>
                        <button aria-label="carousel.arrowAriaLabel 12"
                            class="js-product-next-arrow-new slick-next slick-arrow"><i
                                class="fa fa-angle-right"></i></button>
                    </div>
                    <div data-content-region="home_below_new_products"></div>
                </div>
            @endforeach
        </div>


    </div>
@else
    <div class="container section-space">
        <h2 class="page-heading">{{ $category->name }}</h2>
    </div>
    <div data-product-type='top'>
        <ul class="top-product">
            <section class="productCarousel" data-list-name=""
                data-slick='{
                    "dots": false,
                    "infinite": false,        
                    "mobileFirst": true,
                    "slidesToShow": 1,
                    "rows": 1,
                    "slidesToScroll": 1,
                    "prevArrow": ".js-product-prev-arrow-top",
                    "nextArrow": ".js-product-next-arrow-top",
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
                @foreach ($category->productsHome as $product)
                <div data-product-slide class="productCarousel-slide js-product-slide" class="top-product">
                    <article class="new-card card card-figure ">
                        <figure class="card-figure featured-imag">
                            <a href="{{ route('product', $product->alias) }}">
                                <div class="card-img-container">
                                    <img src="{{ $product->avatar->path }}" alt="{{ $product->name }}"
                                        title="{{ $product->name }}" data-sizes="auto"
                                      
                                        class="lazyload card-image" />
                                </div>
                               
                            </a>
                        </figure>
                        <div class="card-body featured-caption">
                            <p class="card-text" data-test-info-type="brandName">{{$product->category->name}}</p>
                            <h4 class="card-title">
                                <a href="{{ route('product', $product->alias) }}">{{ $product->name }}</a>
                            </h4>
                            <div class="card-text myprice" data-test-info-type="price">

                                <div class="price-section d-inline-block price-section--withoutTax rrp-price--withoutTax"
                                    style="display: none;">

                                    <span data-product-rrp-price-without-tax class="price price--rrp">

                                    </span>
                                </div>

                                <div class="price-section d-inline-block price-section--withoutTax">
                                    <span class="price-label" style="display: none;">

                                    </span>
                                    <span class="price-now-label">

                                    </span>
                                    <span data-product-price-without-tax class="price price--withoutTax">Liên hệ</span>
                                </div>
                               
                            </div>
                          
                    
                            <!-- add to cart icon -->
                            <div class="singleprobtn">
                                <a href="{{ route('product', $product->alias) }}" data-event-type="product-click"
                                    title="Add to Cart" class="button button--small card-figcaption-button myadcart"
                                    data-product-id="86"><svg width="20px" height="20px">
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
            <div class="all-btn top-product">
                <button aria-label="carousel.arrowAriaLabel 12"
                    class="js-product-prev-arrow-top slick-prev slick-arrow"><i
                        class="fa fa-angle-left"></i></button>
                <button aria-label="carousel.arrowAriaLabel 12"
                    class="js-product-next-arrow-top slick-next slick-arrow"><i
                        class="fa fa-angle-right"></i></button>
            </div>
        </ul>
    </div>
@endif
