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
                <li class="breadcrumb ">
                    <a class="breadcrumb-label" href="{{ route('frontend.blogs.index') }}">
                        <span>Bài viết</span>
                    </a>
                </li>
                <li class="breadcrumb is-active">
                    <a class="breadcrumb-label" aria-current="page">
                        <span>{{ $blog->title }}</span>
                    </a>
                </li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class="single-blog">
            <article class="blog allblog row">
                <div class="blog-post-figure col-sm-6 col-12 sing-blog">
                    <figure class="blog-thumbnail">
                        <a href="index.html">
                            <img class="lazyautosizes lazyloaded" data-sizes="auto"
                                src="{{ $blog->image != '' ? asset($blog->image) : asset('admin/imgs/image_default.webp') }}"
                                alt="{{ $blog->title }}" title="{{ $blog->title }}"
                                sizes="675px">
                        </a>
                    </figure>
                </div>
                <div class="blog-post-body col-sm-6 col-12">
                    <header class="blog-header">
                        <h2 class="blog-title">
                            <a href="{{route('frontend.blogs.show', $blog->alias)}}">{{ $blog->title }}</a>
                        </h2>
                        <p class="blog-date">Đăng lúc {{ $blog->created_at->format('Y-m-d') }}</p>
                    </header>

                    <div class="blog-post">
                        <p>{!! $blog->content !!}</p>
                    </div>


                    <ul class="tags">
                        <li class="tag">
                            <a href="../tag/demo.html">demo</a>
                        </li>
                        <li class="tag">
                            <a href="../tag/freshgo.html">freshgo</a>
                        </li>
                        <li class="tag">
                            <a href="../tag/fruits.html">fruits</a>
                        </li>
                        <li class="tag">
                            <a href="../tag/vegetables.html">vegetables</a>
                        </li>
                        <li class="tag">
                            <a href="../tag/winter.html">winter</a>
                        </li>
                    </ul>


                    <div class="single-blog-social">
                        <ul class="socialLinks">
                            <li class="socialLinks-item socialLinks-item--facebook">
                                <a class="socialLinks__link icon icon--facebook" title="Facebook"
                                    href="https://facebook.com/sharer/sharer.php?u=undefined" target="_blank"
                                    rel="noopener">
                                    <span class="aria-description--hidden">Facebook</span>
                                    <svg>
                                        <use xlink:href="#icon-facebook"></use>
                                    </svg>
                                </a>
                            </li>
                            <li class="socialLinks-item socialLinks-item--twitter">
                                <a class="socialLinks__link icon icon--twitter"
                                    href="https://twitter.com/intent/tweet/?text=Nam%20laoreet%20tellus%20laoreet%20nunc%20congue%20commodo%20-%20FreshGo-Vegetable&amp;url=undefined"
                                    target="_blank" rel="noopener" title="Twitter">
                                    <span class="aria-description--hidden">Twitter</span>
                                    <svg>
                                        <use xlink:href="#icon-twitter"></use>
                                    </svg>
                                </a>
                            </li>
                            <li class="socialLinks-item socialLinks-item--google">
                            </li>
                            <li class="socialLinks-item socialLinks-item--email">
                                <a class="socialLinks__link icon icon--email" title="Email"
                                    href="mailto:?subject=Nam%20laoreet%20tellus%20laoreet%20nunc%20congue%20commodo%20-%20FreshGo-Vegetable&amp;body=undefined"
                                    target="_self" rel="noopener">
                                    <span class="aria-description--hidden">Email</span>
                                    <svg>
                                        <use xlink:href="#icon-envelope"></use>
                                    </svg>
                                </a>
                            </li>
                            <li class="socialLinks-item socialLinks-item--print">
                                <a class="socialLinks__link icon icon--print" title="Print"
                                    onclick="window.print();return false;">
                                    <span class="aria-description--hidden">Print</span>
                                    <svg>
                                        <use xlink:href="#icon-print"></use>
                                    </svg>
                                </a>
                            </li>
                            <li class="socialLinks-item socialLinks-item--pinterest">
                                <a class="socialLinks__link icon icon--pinterest" title="Pinterest"
                                    href="https://pinterest.com/pin/create/button/?url=undefined&amp;media=https://cdn11.bigcommerce.com/s-a4jwov0yt3/stencil/10642b80-fc20-013a-d182-5e560fa59e55/img/ProductDefault.gif&amp;description=Nam%20laoreet%20tellus%20laoreet%20nunc%20congue%20commodo%20-%20FreshGo-Vegetable"
                                    target="_blank" rel="noopener">
                                    <span class="aria-description--hidden">Pinterest</span>
                                    <svg>
                                        <use xlink:href="#icon-pinterest"></use>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </article>
        </div>
    </div>
@endsection
