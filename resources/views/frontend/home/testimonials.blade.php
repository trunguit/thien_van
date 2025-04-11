<div class="parallax-bg section-space container-fluid">
    <div class="container parallex text-center">
        <h2 class="page-heading">Khách hàng đánh giá</h2>
        <div class="row row-space">
            <div id="testi" class="owl-carousel owl-theme">
                @foreach ($reviews as $item)
                <div class="item col-12 col-space">
                    <div class="testi-box">
                        <div class="img-deat">
                            <img class="img-fluid center-block timg"
                                src="{{ $item->avatar != '' ? asset($item->avatar) : asset('admin/imgs/image_default.webp') }}">
                            <div class="testi-detail">
                                <h2>{{ $item->name }}</h2>
                                <h5>{{ $item->job }}</h5>
                            </div>
                        </div>
                        <p class="testi-description">{{ $item->comment }}.<svg width="20px"
                                height="20px">
                                <use xlink:href="#quote"></use>
                            </svg></p>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    (function($) {
        $("#testi").owlCarousel({
            itemsCustom: [
                [0, 1],
                [550, 1],
                [601, 1],
                [800, 1],
                [992, 2]
            ],
            autoPlay: false,
            navigationText: ['<svg width="26px" height="26px"><use xlink:href="#arrow-left"></use></svg>',
                '<svg width="26px" height="26px"><use xlink:href="#arrow-right"></use></svg>'
            ],
            navigation: false,
            pagination: true
        });
    }(jQuery));
</script>