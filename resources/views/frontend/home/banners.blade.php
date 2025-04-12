<div class="container-fluid img-banner-des section-space">
	<div class="imgbanner">
		<div class="row mian-row">
            @foreach ($banners as $item)
            <div class="img-banner col-lg-4 col-md-6 col-12 main-col  multiben1">
				<div class="beffect">
					<a href="{{$item->link != '' ? $item->link : '#'}}"><img class="img-fluid lazyautosizes lazyloaded" data-sizes="auto" src="{{ $item->image != '' ? asset($item->image) : asset('admin/imgs/image_default.webp') }}" data-src="{{ $item->image != '' ? asset($item->image) : asset('admin/imgs/image_default.webp') }}" alt="banner" sizes="50px"></a>
				</div>
				<!-- <div class="off-text">
			  		<span class="off-title">
			  			<h2></h2>
						<h1></h1>
						<a href="#" tabindex="-1"></a>
					</span>
				</div> -->
			</div>
            @endforeach
		
		</div>
	</div>