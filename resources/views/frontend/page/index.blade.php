@extends('frontend.layouts.master')
@section('title', $page->title)
@section('description', $page->description)
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
                        <span>{{ $page->title }}</span>
                    </a>
                </li>
            </ol>
        </nav>
    </div>
    <section class="page adminside">
        <h1 class="page-heading">{{ $page->title }}</h1>
        <div data-content-region="page_builder_content"></div>
        <div class="container">
            <div class="page-content">
                {!! $page->content !!}
            </div>
        </div>
    </section>
   
@endsection
