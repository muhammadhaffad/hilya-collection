@extends('web.public.layouts.default')

@push('styles')
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owl-carousel/css/owl.theme.default.min.css') }}">
    {{-- <style>
    .custom-owl .owl-next.disabled>i,
    .owl-prev.disabled>i {
        display: none !important;
    }

    .custom-owl .owl-item {
        border-width: 1px;
        border-radius: 0.5rem;
    }

    .custom-owl .owl-nav {
        display: flex;
        position: absolute;
        top: 50%;
        margin-left: -0.25rem;
        margin-right: -0.25rem;
        justify-content: space-between;
    }

    .custom-owl .scroller::-webkit-scrollbar {
        width: 0px;
        background: transparent;
        /* make scrollbar transparent */
    }
    </style> --}}
@endpush

@push('scripts')
    @livewireScripts
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('owl-carousel/js/owl.carousel.min.js') }}"></script>
@endpush

@section('contents')
    {{-- Banner section start --}}
    {{-- @include('web.public.pages.home.sections.banner') --}}
    {{-- Banner section end --}}

    {{-- Brand list section start --}}
    @include('web.public.partials.brand-list')
    
    {{-- Search form --}}
    @include('web.public.pages.home.sections.search-form')

    {{-- Products section start --}}
    @livewire('public.pages.home.sections.products')
    
    {{-- Pre order products section start --}}
    @include('web.public.pages.home.sections.pre-order')
    
    {{-- Promo products section start --}}
    @include('web.public.pages.home.sections.promo')
    

@endsection