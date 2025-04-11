<div class="allblog-bg next-prevb section-space">
    <div class="topsp container">
        <h2 class="page-heading">Bài viết mới nhất</h2>
        <section class="productCarousel row"
            data-slick='{
                "dots": false,
                "infinite": false,
                "autoplay": false,
                "mobileFirst": true,
                "slidesToShow": 3,
                "slidesToScroll": 1,
                "slide": ".js-product-slide",
                "prevArrow": ".js-product-prev-arrow-blog",
                "nextArrow": ".js-product-next-arrow-blog",
                "responsive": [
                {
                    "breakpoint": 1409,
                    "settings": {
                    "slidesToScroll": 1,
                    "slidesToShow": 3
                }
                },
                {
                    "breakpoint": 1199,
                    "settings": {
                    "slidesToScroll": 1,
                    "slidesToShow": 3
                }
                },
                {
                    "breakpoint": 991,
                    "settings": {
                    "slidesToScroll": 1,
                    "slidesToShow": 2
                }
                },
                {
                    "breakpoint": 767,
                    "settings": {
                    "slidesToScroll": 1,
                    "slidesToShow": 2
                }
                },
                {
                    "breakpoint": 599,
                    "settings": {
                    "slidesToScroll": 1,
                    "slidesToShow": 2
                }
                },
                {
                    "breakpoint": 0,
                    "settings": {
                    "slidesToScroll": 1,
                    "slidesToShow": 1
                }
                }
                ]
                }'>
            @foreach ($blogs as $item)
                
           
            <div class="productCarousel-slide js-product-slide col-12 blog_webi">
                <div class="">
                    <div class="blogshadow">
                        <div class="blog-left">
                            <div class="webi-blog-image text-center">
                                <img src="{{ $item->image }}" class="img-fluid" alt="{{ $item->title }}"
                                  
                                    title="{{ $item->title }}">
                                <div class="blog-post-image-hover"> </div>
                                <div class="webi_post_hover">
                                    <div class="blog-ic">
                                        <a class="icon readmore_link" title="all blog"
                                            href="{{route('frontend.blogs.show', $item->alias)}}"><i
                                                class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="date-time">
                                <div class="blogdt">
                                    <p class="blog-date text-left"> {{ $item->created_at->format('d-m-Y') }} </p>
                                </div>
                            </div>
                        </div>
                        <div class="blog-right text-left">
                           
                            <div class="bs">
                                <h4><a title="{{ $item->title }}" href="{{route('frontend.blogs.show', $item->alias)}}">{{ $item->title }}</a></h4>

                                <div class="blog-summary">
                                    <p>{{ $item->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </section>
        <div class="all-btn recent-post">
            <button aria-label="carousel.arrowAriaLabel "
                class="js-product-prev-arrow-blog slick-prev slick-arrow"><i
                    class="fa fa-angle-left"></i></button>
            <button aria-label="carousel.arrowAriaLabel "
                class="js-product-next-arrow-blog slick-next slick-arrow"><i
                    class="fa fa-angle-right"></i></button>
        </div>
    </div>
</div>