@extends('frontend.layouts.master')
@section('title', 'Tìm kiếm sản phẩm')
@section('meta_description', 'Tìm kiếm sản phẩm')
@section('content')
    <main class="body" id="main-content" role="main" data-currency-code="INR">
        <div class="container all-container">
            <nav aria-label="Breadcrumb">
                <ol class="breadcrumbs breadcrumbs-bg">
                    <li class="breadcrumb ">
                        <a class="breadcrumb-label" href="{{ route('home') }}">
                            <span>Trang chủ</span>
                        </a>

                    </li>
                    
                    <li class="breadcrumb is-active">
                        <a class="breadcrumb-label" href="#" aria-current="page">
                            <span>Tìm kiếm sản phẩm</span>
                        </a>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="container catagory-space">
            <div class="row">
                <aside id="colm-left" class="col-lg-3 col-sm-12 col-md-12 col-xs-12 hidden-sm hidden-xs">
                    <div class="page">
                        <aside class="page-sidebar" id="faceted-search-container">
                            <nav>
                                <div id="facetedSearch" class="facetedSearch sidebarBlock">
                                    <div class="facetedSearch-refineFilters sidebarBlock">
                                        <h2 class="sidebarBlock-heading">
                                            Refine by
                                        </h2>

                                        <p>No filters applied</p>

                                    </div>

                                    <a href="#facetedSearch-navList" role="button" class="facetedSearch-toggle toggleLink"
                                        data-collapsible="" aria-label="Browse by Brand, Color &amp; more"
                                        aria-controls="facetedSearch-navList" aria-expanded="true">
                                        <span class="facetedSearch-toggle-text">
                                            Browse by Brand, Color &amp; more
                                        </span>

                                        <span class="facetedSearch-toggle-indicator">
                                            <span class="toggleLink-text toggleLink-text--on">
                                                Hide Filters

                                                <i class="icon" aria-hidden="true">
                                                    <svg>
                                                        <use xlink:href="#icon-keyboard-arrow-up"></use>
                                                    </svg>
                                                </i>
                                            </span>

                                            <span class="toggleLink-text toggleLink-text--off">
                                                Show Filters

                                                <i class="icon" aria-hidden="true">
                                                    <svg>
                                                        <use xlink:href="#icon-keyboard-arrow-down"></use>
                                                    </svg>
                                                </i>
                                            </span>
                                        </span>
                                    </a>

                                    <div id="facetedSearch-navList" class="facetedSearch-navList" aria-hidden="false">
                                        <div class="accordion accordion--navList">



                                            <div class="accordion-block">
                                                <div class="accordion-nav-clear-holder">
                                                    <button type="button" class="accordion-navigation toggleLink is-open"
                                                        data-collapsible="#facetedSearch-content--price" aria-label="Price"
                                                        aria-controls="facetedSearch-content--price" aria-expanded="true">
                                                        <span class="accordion-title">
                                                            Price
                                                        </span>

                                                        <span>
                                                            <svg
                                                                class="icon accordion-indicator toggleLink-text toggleLink-text--off">
                                                                <use xlink:href="#icon-add"></use>
                                                            </svg>
                                                            <svg
                                                                class="icon accordion-indicator toggleLink-text toggleLink-text--on">
                                                                <use xlink:href="#icon-remove"></use>
                                                            </svg>
                                                        </span>
                                                    </button>
                                                </div>

                                                <div id="facetedSearch-content--price" class="accordion-content is-open"
                                                    aria-hidden="false">
                                                    <form id="facet-range-form" class="form" method="get"
                                                        data-faceted-search-range="" novalidate="">
                                                        <input type="hidden" name="search_query" value="">
                                                        <fieldset class="form-fieldset _">
                                                            <div class="form-minMaxRow">
                                                                <div class="form-field">
                                                                    <input name="min_price" placeholder="Min."
                                                                        min="0" class="form-input form-input--small"
                                                                        required="" type="number" value="">
                                                                </div>

                                                                <div class="form-field">
                                                                    <input name="max_price" placeholder="Max."
                                                                        min="0" class="form-input form-input--small"
                                                                        required="" type="number" value="">
                                                                </div>

                                                                <div class="form-field">
                                                                    <button class="button button--small" type="submit">
                                                                        Update
                                                                    </button>
                                                                </div>
                                                            </div>

                                                            <div class="nod-success-message" style="display: none;">Max.
                                                                price is required.</div>
                                                        </fieldset>
                                                    </form>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="blocker" style="display: none;"></div>
                                    </div>
                                </div>
                            </nav>
                        </aside>
                    </div>
                </aside>
                <div class="col-lg-7 col-sm-12 col-md-12  col-xs-12 colright" id="content">
                    <div class="row cate-border">
                        <div class="col-md-6 col-3 category-grid">
                            <span id="gridProduct" class="active" title="Grid"><svg width="20px" height="20px">
                                    <use xlink:href="#cgrid"></use>
                                </svg></span>
                            <span id="listProduct" title="List"><svg width="20px" height="20px">
                                    <use xlink:href="#clist"></use>
                                </svg></span>
                        </div>
                        <div class="col-md-6 col-9 actionbar-filter">
                            <div class="text-right">
                                <form class="actionBar" method="get" data-sort-by="product">
                                    <fieldset class="form-fieldset actionBar-section">
                                        <div class="form-field">
                                            <label class="form-label" for="sort">Sort By:</label>
                                            <select class="form-select form-select--small " name="sort" id="sort"
                                                role="listbox">
                                                <option value="featured" selected="">Featured Items</option>
                                                <option value="newest">Newest Items</option>
                                                <option value="bestselling">Best Selling</option>
                                                <option value="alphaasc">A to Z</option>
                                                <option value="alphadesc">Z to A</option>
                                                <option value="avgcustomerreview">By Review</option>
                                                <option value="priceasc">Price: Ascending</option>
                                                <option value="pricedesc">Price: Descending</option>
                                            </select>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="xs-filter"></div>
                    <div class="">
                        <div class="" id="">
                            <form action="" data-product-compare>
                                <ul class="productGrid row pro-row">
                                    @forelse ($products as $product)
                                        <li class="product col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 pro-col">
                                            <article class="new-card card card-figure">
                                                <figure class="card-figure featured-imag">
                                                    <a href="{{ route('product', $product->alias) }}">
                                                        <div class="card-img-container">
                                                            @if (isset($product->avatar) && isset($product->avatar->path))
                                                                <img src="{{ asset($product->avatar->path) }}"
                                                                    alt="{{ $product->name ?? '' }}"
                                                                    title="{{ $product->name ?? '' }}" data-sizes="auto"
                                                                    class="card-image lazyautosizes ls-is-cached lazyloaded"
                                                                    sizes="342px">
                                                            @endif
                                                        </div>
                                                        @if (isset($product->avatar2nd) && isset($product->avatar2nd->path))
                                                            <img src="{{ asset($product->avatar2nd->path) }}"
                                                                alt="{{ $product->name ?? '' }}"
                                                                title="{{ $product->name ?? '' }}" class="second-img">
                                                        @endif
                                                    </a>
                                                </figure>
                                                <div class="card-body featured-caption">
                                                    <p class="card-text" data-test-info-type="brandName">
                                                        {{ $product->category->name ?? 'No category' }}
                                                    </p>
                                                    <h4 class="card-title">
                                                        <a href="{{ route('product', $product->alias) }}">
                                                            {{ $product->name ?? 'No name' }}
                                                        </a>
                                                    </h4>
                                                    <div class="card-text myprice" data-test-info-type="price">
                                                        <span data-product-price-without-tax=""
                                                            class="price price--withoutTax">Giá : Liên hệ</span>
                                                    </div>
                                                </div>
                                            </article>
                                        </li>
                                    @empty
                                        <li class="col-12">Không tìm thấy sản phẩm</li>
                                    @endforelse
                                </ul>

                                <ul class="productList">
                                    @foreach ($products as $product)
                                        <li class="product">
                                            <article class="listItem">
                                                <figure class="listItem-figure">
                                                    <div class="product-thumb-top transition">
                                                        <figure class="card-figure">
                                                            <a href="{{ route('product', $product->alias) }}">
                                                                <div class="card-img-container">
                                                                    <img src="{{ asset($product->avatar->path) }}"
                                                                        alt="{{ $product->name }}"
                                                                        title="{{ $product->name }}" data-sizes="auto"
                                                                        class="lazyload card-image">
                                                                </div>
                                                                <img src="https://cdn11.bigcommerce.com/s-a4jwov0yt3/images/stencil/500x659/products/111/376/2__59094.1636780370.jpg?c=1"
                                                                    alt="{{ $product->name }}"
                                                                    title="{{ $product->name }}" class="second-img">
                                                            </a>

                                                        </figure>
                                                    </div>
                                                </figure>
                                                <div class="listItem-body">
                                                    <div class="listItem-content">
                                                        <div class="">
                                                            <p class="listItem-brand">{{ $product->category->name }}</p>

                                                            <h4 class="listItem-title">
                                                                <a href="{{ route('product', $product->alias) }}"
                                                                    aria-label="{{ $product->name }}">
                                                                    {{ $product->name }}
                                                                </a>
                                                            </h4>



                                                            <div class="listItem-price">

                                                                <div class="price-section d-inline-block price-section--withoutTax rrp-price--withoutTax"
                                                                    style="display: none;">

                                                                    <span data-product-rrp-price-without-tax=""
                                                                        class="price price--rrp">

                                                                    </span>
                                                                </div>

                                                                <div
                                                                    class="price-section d-inline-block price-section--withoutTax">
                                                                    <span class="price-label">

                                                                    </span>
                                                                    <span class="price-now-label" style="display: none;">

                                                                    </span>
                                                                    <span data-product-price-without-tax=""
                                                                        class="price price--withoutTax">Giá : Liên
                                                                        hệ</span>
                                                                </div>
                                                                <div class="price-section d-inline-block price-section--withoutTax non-sale-price--withoutTax"
                                                                    style="display: none;">

                                                                    <span data-product-non-sale-price-without-tax=""
                                                                        class="price price--non-sale">

                                                                    </span>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        </li>
                                    @endforeach

                                </ul>
                            </form>
                            <nav class="pagination" aria-label="pagination">
                                {!! $products->links() !!}
                            </nav>
                            <div data-content-region="category_below_content"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
<style>
    .title-category {
        font-size: 20px;
        line-height: 28px;
        font-weight: 700;
        color: #347758;
    }

    .category-list ul {
        list-style: none;
        padding: 0;
    }

    .category-list li {
        display: flex;
        align-items: center;
        margin-bottom: 0.5rem;
    }

    .category-list li .icon {
        color: #f6ad55;
        margin-right: 0.5rem;
    }
</style>
