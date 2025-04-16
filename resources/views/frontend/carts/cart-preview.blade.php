<div class="previewCartWrapper">
    <div class="previewCart">
        @if($cartItems->count() > 0)
        <ul class="previewCartList">
            @foreach($cartItems as $item)
            <li class="previewCartItem">
                <div class="previewCartItem-image">
                    <img src="{{ asset($item->options['image'])  }}" 
                         alt="{{ $item->name }}"
                         title="{{ $item->name }}"
                         class="lazyautosizes ls-is-cached lazyloaded"
                         sizes="80px">
                </div>
                <div class="previewCartItem-content">
                    <span class="previewCartItem-brand">
                        {{ $item->options['category'] ?? 'Common Good' }}
                    </span>

                    <h6 class="previewCartItem-name">
                        <a href="{{ route('product', Str::slug($item->name)) }}">
                            {{ $item->name }}
                        </a>
                    </h6>

                    <span class="previewCartItem-price">
                        <span>{{ number_format($item->price) }}₫</span>
                        <span class="previewCartItem-qty">x {{ $item->qty }}</span>
                    </span>
                </div>
            </li>
            @endforeach
        </ul>
        
        <div class="previewCartAction">
            <div class="previewCartAction-checkout">
                <a href="{{ route('checkout') }}" class="button button--small button--primary">
                    Checkout
                </a>
            </div>

            <div class="previewCartAction-viewCart">
                <a href="{{ route('cart.index') }}" class="button button--small button--action">
                    View Cart ({{ $count }} items)
                </a>
            </div>
        </div>
        @else
        <div role="alert" aria-live="polite" aria-atomic="false" class="previewCart-emptyBody">
            Your cart is empty
        </div>
        @endif
    </div>
</div>