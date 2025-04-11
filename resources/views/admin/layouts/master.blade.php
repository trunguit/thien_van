<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title>Thiên Văn Admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{{ asset('') }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/imgs/theme/favicon.svg') }}" />
    <!-- Template CSS -->
    <script src="{{ asset('admin/js/vendors/color-modes.js') }}"></script>
    <link href="{{ asset('admin/css/main5103.css?v=6.0') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/vendors/fontawesome.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/basic.css"
        integrity="sha512-+Vla3mZvC+lQdBu1SKhXLCbzoNCl0hQ8GtCK8+4gOJS/PN9TTn0AO6SxlpX8p+5Zoumf1vXFyMlhpQtVD5+eSw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>
    <div class="screen-overlay"></div>
    @if (!Request::is('login'))
        @include('admin.layouts.sidebar')
    @endif
    <main class="main-wrap">
        @if (!Request::is('login'))
            @include('admin.layouts.header')
        @endif

        <section class="content-main">
            @include('admin.layouts.notification')
            @yield('content')
        </section>
        @if (!Request::is('login'))
            @include('admin.layouts.footer')
        @endif
    </main>
    @include('admin.layouts.modals')
    <script src="{{ asset('admin/js/vendors/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('admin/js/vendors/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/js/vendors/jquery.fullscreen.min.js') }}"></script>
    <!-- Main Script -->
    <script src="{{ asset('admin/js/main5103.js?v=6.0') }}"></script>
    <script src="{{ asset('admin/js/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('admin/js/custom.js') }}"></script>
    @stack('scripts')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</body>

</html>
