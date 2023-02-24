@extends('web.public.layouts.default')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owl-carousel/css/owl.theme.default.min.css') }}">
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('owl-carousel/js/owl.carousel.min.js') }}"></script>
@endpush

@section('contents')
    {{-- Add some padding --}}
    <section class="relative pt-8">
        <div class="container">
            <x-public.breadcrumb>
                <x-slot:breadcrumbItem>
                    <x-public.breadcrumb-item link="{{ route('home.index') }}" icon="fas fa-home" name="Home" class="gap-2">
                    </x-public.breadcrumb-item>
                    <x-public.breadcrumb-item icon="fas fa-chevron-right" name="{{ ucfirst($status) }}" class="gap-2">
                    </x-public.breadcrumb-item>
                </x-slot:breadcrumbItem>
            </x-public.breadcrumb>
        </div>
    </section>

    {{-- Brand list section start --}}
    @include('web.public.partials.brand-list')
    {{-- Brand list section end --}}

    {{-- Products section start --}}
    @include('web.public.pages.status-products.sections.status-products')
    {{-- Products section end --}}
@endsection