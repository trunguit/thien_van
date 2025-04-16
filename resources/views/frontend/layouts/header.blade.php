<header class="header" role="banner">
    <a href="#" class="mobileMenu-toggle" data-mobile-menu-toggle="menu">
        <span class="mobileMenu-toggleIcon">Toggle menu</span>
    </a>
    <div class="mainhead">
        <div class="top-header">
            <div class="row secondcusheader">
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3 text-left d-flex" id="logo">
                    <h1 class="header-logo header-logo--center">
                        <a href="{{ route('home') }}" class="header-logo__link" data-header-logo-link>
                            <img class="header-logo-image-unknown-size" src="{{ asset('admin/imgs/logo.png') }}"
                                alt="FreshGo-Vegetable" title="FreshGo-Vegetable">
                        </a>
                    </h1>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-8 head-nav">
                    <div class="navPages-container" id="menu" data-menu>
                        <nav class="navPages">
                            <ul class="navPages-list">
                                @foreach ($categories as $category)
                                    <li class="navPages-item">
                                        <a class="navPages-action has-subMenu"
                                            href="{{ route('category', $category->alias) }}">
                                            {{ $category->name }}
                                            @if ($category->children->count() > 0)
                                                <i class="icon navPages-action-moreIcon main-moreicon"
                                                    data-collapsible="navPages-23" aria-hidden="true" aria-label=""
                                                    aria-controls="navPages-23" aria-expanded="false">
                                                    <svg>
                                                        <use xlink:href="#icon-chevron-down"></use>
                                                    </svg>
                                                </i>
                                            @endif
                                        </a>
                                        @if ($category->children->count() > 0)
                                            <div class="navPage-subMenu" id="navPages-23" aria-hidden="true"
                                                tabindex="-1">
                                                <ul class="navPage-subMenu-list">
                                                    @foreach ($category->children as $child)
                                                        <li class="navPage-subMenu-item">
                                                            <a class="navPage-subMenu-action navPages-action has-subMenu"
                                                                href="{{ route('category', $child->alias) }}"
                                                                aria-label="berries">
                                                                {{ $child->name }}
                                                                <span class="collapsible-icon-wrapper"
                                                                    data-collapsible="navPages-24"
                                                                    data-collapsible-disabled-breakpoint="medium"
                                                                    data-collapsible-disabled-state="open"
                                                                    data-collapsible-enabled-state="closed">
                                                                    <i class="icon navPages-action-moreIcon"
                                                                        aria-hidden="true">
                                                                        <svg>
                                                                            <use xlink:href="#icon-chevron-down" />
                                                                        </svg>
                                                                    </i>
                                                                </span>
                                                            </a>
                                                            @if ($child->children->count() > 0)
                                                                <ul class="navPage-childList" id="navPages-24">
                                                                    @foreach ($child->children as $subchild)
                                                                        <li class="navPage-childList-item">
                                                                            <a class="navPage-childList-action navPages-action"
                                                                                href="{{ route('category', $subchild->alias) }}"
                                                                                aria-label="blueberries">
                                                                                {{ $subchild->name }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-6 logocart text-right">
                    <li id="search" class="desktop-search d-inline-block sideb siden">
                        <!-- snippet location forms_search -->
                        <div class="d-search">
                            <button id="search_toggle" class="search-toggle" data-toggle="collapse"
                                onclick="openSearch()">
                                <svg height="22px" width="22px">
                                    <use xlink:href="#mysearch"></use>
                                </svg>
                            </button>
                        </div>
                        <div id="search" class="wbSearch">
                            <form class="form" action="{{ route('frontend.search') }}" method="GET" role="search">
                                @csrf
                                <fieldset class="form-fieldset">
                                    <div class="wb-search input-group">
                                        <label class="is-srOnly" for="search_query">Search</label>
                                        <input class="form-input form-control" data-search-quick name="search_query"
                                            id="search_query" data-error-message="Search field cannot be empty."
                                            placeholder="Tìm kiếm sản phẩm" autocomplete="off">
                                        <div class="input-group-btn">
                                            <button class="wb-search-btn" align="center" type="submit" value="Search">
                                                <svg width="20px" height="20px">
                                                    <use xlink:href="#mysearch"></use>
                                                </svg>

                                                <!-- Search -->
                                            </button>
                                            <a href="javascript:void(0)" class="closebtn close-nav"
                                                onclick="closeSearch()"><i class="fa fa-close"></i>
                                            </a>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                            <section class="quickSearchResults" data-bind="html: results"></section>

                        </div>
                    </li>
                    <li class="navUser-item navUser-item--cart">
                        <a class="navUser-action itscart navUser-item--cart__hidden-s" data-cart-preview=""
                            data-dropdown="cart-preview-dropdown" data-options="align:right" href="cart.html"
                            aria-label="Cart with 0 items"><svg width="20px" height="20px">
                                <use xlink:href="#hcart"></use>
                            </svg>
                            <span class="countPill cart-quantity1" id="cart-count">{{Cart::count()}}</span>
                        </a>
                        <div class="dropdown-menu headlog-cart" id="cart-preview-dropdown" data-dropdown-content=""
                            aria-hidden="true">
                          
                        </div>
                    </li>
                </div>
            </div>
            <div class="row">
                <div class="hidenavcol"></div>
            </div>
        </div>
    </div>
</header>
