<div class="container section-space">
    <div class="brand-section">
        <div id="brand" class="owl-carousel">
            @foreach ($brands as $item)
            <a href="#"><img class="img-fluid lazyload mx-auto d-block" data-sizes="auto"
                src="{{ $item->logo != '' ? asset($item->logo) : asset('admin/imgs/image_default.webp') }}"
                alt="{{$item->name}}"
                title="{{$item->name}}" /></a>
            @endforeach
            
            <!-- second brand -->
          
        </div>
    </div>
</div>