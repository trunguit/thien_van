<aside class="navbar-aside" id="offcanvas_aside">
    <div class="aside-top">
        <a href="index.html" class="brand-wrap">
            <img src="{{asset('admin/imgs/logo.png')}}" class="logo" alt="Nest Dashboard" />
        </a>
        <div>
            <button class="btn btn-icon btn-aside-minimize"><i class="text-muted material-icons md-menu_open"></i></button>
        </div>
    </div>
    <nav>
        <ul class="menu-aside">
            <li class="menu-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                <a class="menu-link" href="{{route('admin.dashboard')}}">
                    <i class="icon material-icons md-home"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="menu-item {{ Request::is('admin/products') ? 'active' : '' }}">
                <a class="menu-link" href="{{route('admin.products.index')}}">
                    <i class="icon material-icons md-shopping_bag"></i>
                    <span class="text">Sản phẩm</span>
                </a>
            </li>
            <li class="menu-item {{ Request::is('admin/orders') ? 'active' : '' }}">
                <a class="menu-link" href="{{route('admin.orders.index')}}">
                    <i class="icon material-icons md-local_shipping"></i>
                    <span class="text">Đặt hàng</span>
                </a>
            </li>
            <li class="menu-item {{ Request::is('admin/categories') ? 'active' : '' }}">
                <a class="menu-link" href="{{route('admin.categories.index')}}">
                    <i class="icon material-icons md-category"></i>
                    <span class="text">Danh mục</span>
                </a>
            </li>
            <li class="menu-item {{ Request::is('admin/blogs') ? 'active' : '' }}">
                <a class="menu-link" href="{{route('admin.blogs.index')}}">
                    <i class="icon material-icons md-library_books"></i>
                    <span class="text">Bài viết</span>
                </a>
            </li>
            <li class="menu-item {{ Request::is('admin/banners') ? 'active' : '' }}">
                <a class="menu-link" href="{{route('admin.banners.index')}}">
                    <i class="icon material-icons md-image"></i>
                    <span class="text">Banners</span>
                </a>
            </li>
            <li class="menu-item {{ Request::is('admin/partners') ? 'active' : '' }}">
                <a class="menu-link" href="{{route('admin.partners.index')}}">
                    <i class="icon material-icons md-people"></i>
                    <span class="text">Đối tác</span>
                </a>
            </li>
            <li class="menu-item {{ Request::is('admin/customers') ? 'active' : '' }}">
                <a class="menu-link" href="{{route('admin.customers.index')}}">
                    <i class="icon material-icons md-rate_review"></i>
                    <span class="text">Review</span>
                </a>
            </li>
            <li class="menu-item {{ Request::is('admin/keywords') ? 'active' : '' }}">
                <a class="menu-link" href="{{route('admin.keywords.index')}}">
                    <i class="icon material-icons md-lock"></i>
                    <span class="text">Từ khóa</span>
                </a>
            </li>
            <li class="menu-item {{ Request::is('admin/pages') ? 'active' : '' }}">
                <a class="menu-link" href="{{route('admin.pages.index')}}">
                    <i class="icon material-icons md-pages"></i>
                    <span class="text">Trang</span>
                </a>
            </li>
            <li class="menu-item {{ Request::is('admin/settings') ? 'active' : '' }}">
                <a class="menu-link" href="{{route('admin.settings.edit')}}">
                    <i class="icon material-icons md-settings"></i>
                    <span class="text">Cài đặt chung</span>
                </a>
            </li>
        </ul>
      
        <br />
        <br />
    </nav>
</aside>