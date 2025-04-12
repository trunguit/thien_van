<section class="heroCarousel"
    data-slick='{
                    "arrows": true,
                    "mobileFirst": true,
                    "slidesToShow": 1,
                    "slidesToScroll": 1,
                    "autoplay": true,
                    "autoplaySpeed": 5000,
                    "slide": "[data-hero-slide]"
                }'>
    @foreach ($sliders as $key => $item)
    <div data-hero-slide="{{$key}}">
        <div class="heroCarousel-slide  heroCarousel-slide--first">
            <a href="{{$item->link != '' ? $item->link : '#'}}" target="_blank" class="heroCarousel-image-wrapper">
                <img src="{{$item->image}}"
                    alt="" title="" data-sizes="auto"
                    class=" heroCarousel-image" />
            </a>
            <div class="heroCarousel-content">
                <p class="heroCarousel-title">{{$item->title}}</p>
            </div>
        </div>
    </div>
    @endforeach
    <span data-carousel-content-change-message class="aria-description--hidden" aria-live="polite"
        role="status"></span>
</section>
