@extends('frontend.layouts.master')
@section('content')
    <div class="container all-container">
        <nav aria-label="Breadcrumb">
            <ol class="breadcrumbs breadcrumbs-bg">
                <li class="breadcrumb ">
                    <a class="breadcrumb-label" href="{{ route('home') }}">
                        <span>Trang chủ</span>
                    </a>

                </li>
                <li class="breadcrumb is-active">
                    <a class="breadcrumb-label" aria-current="page">
                        <span>Tất cả bài viết</span>
                    </a>
                </li>
            </ol>
        </nav>
    </div>
    <section class="blog">
        <h1 class="page-heading">Bài viết</h1>
    </section>
    <div class="container">
        <div class="row row-space">
            @foreach ($blogs as $item)
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-space">
                    <div class="section-spacing-blog">
                        <div class="panel-default">
                            <div class="allblog">
                                <div class="">
                                    <div class="webi-blog-img">
                                        <article class="blog">
                                            <div class="blog-post-figure">
                                                <figure class="blog-thumbnail">
                                                    <a
                                                        href="{{ route('frontend.blogs.show', $item->alias) }}">
                                                        <img src="{{ $item->image != '' ? asset($item->image) : asset('admin/imgs/image_default.webp') }}"
                                                            alt="{{ $item->title }}"
                                                            title="{{ $item->title }}"
                                                            data-sizes="auto"
                                                    
                                                            class="lazyautosizes lazyloaded" sizes="430px">
                                                    </a>
                                                </figure>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                                <div class="allcomment">
                                    <div class="blog-post-body">
                                        <header class="blog-header">
                                            <h5 class="blog-title text-left">
                                                <a
                                                    href="{{route('frontend.blogs.show', $item->alias)}}">{{ $item->title }}</a>
                                            </h5>
                                        </header>
                                        <p class="blog-date text-left">Đăng lúc {{ $item->created_at->format('Y-m-d') }}</p>
                                        <div class="blog-post">
                                            {{ $item->description }}
                                                <a href="{{route('frontend.blogs.show', $item->alias)}}"
                                                aria-label="Quisque sit amet mi vel quam fringilla porttitor sed vitae ante read more">Xem thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="text-center">
            {!! $blogs->links('frontend.layouts.pagination') !!}
    </div>
@endsection
