<div class="cate-bg section-space ">
    <div class="homecategory cate-row">
        <div class="all-cate caro-btn topsp">
            <nav class="home-cate">
                <h3 class="page-heading">Danh mục sản phẩm </h3>
                <ul class="">
                    <div class="homecate ">
                        <section class="productCarousel" data-list-name=""
                            data-slick='{
                                "infinite": false,
                                "mobileFirst": true,
                                "slidesToShow": 2,
                                "slidesToScroll": 2,
                                "rows": 1,
                                "prevArrow": ".js-product-prev-arrow-cate",
                                "nextArrow": ".js-product-next-arrow-cate",
                                "responsive": [
                                    {
                                        "breakpoint": 1409,
                                        "settings": {
                                            "slidesToShow": 4,
                                            "slidesToScroll": 1
                                        }
                                    },
                                    {
                                        "breakpoint": 1199,
                                        "settings": {
                                            "slidesToShow": 3,
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
                                            "slidesToShow": 2,
                                            "slidesToScroll": 1
                                        }
                                    },
                                    {
                                        "breakpoint": 767,
                                        "settings": {
                                            "slidesToShow": 2,
                                            "slidesToScroll": 1
                                        }
                                    },
                                    {
                                        "breakpoint": 575,
                                        "settings": {
                                            "slidesToShow": 2,
                                            "slidesToScroll": 1
                                        }
                                    },
                                    {
                                        "breakpoint": 425,
                                        "settings": {
                                            "slidesToShow": 1,
                                            "slidesToScroll": 2
                                        }
                                    },
                                    {
                                        "breakpoint": 319,
                                        "settings": {
                                            "slidesToShow": 1,
                                            "slidesToScroll": 2
                                        }
                                    },
                                    {
                                        "breakpoint": 0,
                                        "settings": {
                                            "slidesToShow": 1,
                                            "slidesToScroll": 1
                                        }
                                    }
                                ]
                            }'>
                           
                            @foreach ($categories as $category)
                            <div class="home-cate-item js-product-slide col-12 pro-col category-img">
                                <div class="subcimginner ">
                                    <div class="catebg row">
                                        <div class="cate-ti col-6">
                                            <h5 class="catename"><a href="{{route('category', $category->alias)}}">{{ $category->name }}</a></h5>
                                            <div class="">
                                                @foreach ($category->children as $item)
                                                    <li class="subcatename">
                                                        <a class="navPage-subMenu-action navPages-action has-subMenu"
                                                            href="{{route('category', $item->alias)}}"
                                                            aria-label="berries">
                                                            {{ $item->name }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                               
                                                
                                            </div>
                                        </div>
                                        <div class="cate-img col-6">
                                            <a class="" href="{{route('category', $category->alias)}}">
                                                <span>
                                                    <img src="{{$category->image != '' ? asset($category->image) : asset('frontend/cate.png')}}" alt=""
                                                        class="img-responsive img-fluid">
                                                </span>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </section>
                    </div>
                </ul>
            </nav>
        </div>
    </div>
</div>