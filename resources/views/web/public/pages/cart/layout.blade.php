@extends('web.public.layouts.default')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owl-carousel/css/owl.theme.default.min.css') }}">
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
@endpush

@push('scripts')
    @livewireScripts
    <script src="{{ asset('js/script.js') }}"></script>
@endpush

@section('contents')
    {{-- Add some padding --}}
    <section class="relative my-8">
        <div class="container">
            <x-public.breadcrumb>
                <x-slot:breadcrumbItem>
                    <x-public.breadcrumb-item link="{{ route('home.index') }}" icon="fas fa-home" name="Home" class="gap-2">
                    </x-public.breadcrumb-item>
                    <x-public.breadcrumb-item icon="fas fa-chevron-right" name="Cart" class="gap-2">
                    </x-public.breadcrumb-item>
                </x-slot:breadcrumbItem>
            </x-public.breadcrumb>
        </div>
    </section>

    @include('web.public.pages.cart.sections.cart')

@endsection