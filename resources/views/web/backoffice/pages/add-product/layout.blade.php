@extends('web.backoffice.layouts.default')

@push('styles')
    {{-- @livewireStyles --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owl-carousel/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('trix-editor/trix.css') }}">
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }

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
    {{-- @livewireScripts --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('trix-editor/trix.js') }}"></script>

    <script>
        const uploadButton = document.querySelectorAll('.upload-button');
        const removeButton = document.querySelectorAll('.remove-button');
        const imageUpload = document.querySelectorAll('.image-upload');
        const imageView = document.querySelectorAll('.image-view');

        uploadButton.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                let index = [...uploadButton].indexOf(event.target.parentNode);
                [...imageUpload][index].click();
            });
        });

        removeButton.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                let index = [...removeButton].indexOf(event.target.parentNode);
                let plus = [...uploadButton][index];
                let trash = [...removeButton][index];
                plus.classList.toggle('hidden');
                plus.classList.toggle('flex');
                [...imageUpload][index].value = '';
                [...imageView][index].src = '';
                trash.classList.toggle('hidden');
                trash.classList.toggle('flex');
            });
        });

        imageUpload.forEach(function(uploader) {
            uploader.addEventListener('change', function(event) {
                let index = [...imageUpload].indexOf(event.target);
                let plus = [...uploadButton][index];
                let trash = [...removeButton][index];
                plus.classList.toggle('hidden');
                plus.classList.toggle('flex');
                [...imageView][index].src = URL.createObjectURL(event.target.files[0]);
                trash.classList.toggle('hidden');
                trash.classList.toggle('flex');
            })
        })

        stocksInput = document.getElementsByClassName('stocks-input');
        stocksInput = [...stocksInput];

        function selectSize(event) {
            index = event.getAttribute('data-index');
            stocksInput[index].classList.toggle('hidden');
            stocksInput[index].classList.toggle('flex');
            stocksInput[index].children[1].children[1].value = ''; //kosongkan input harga
            stocksInput[index].children[2].children[1].value = ''; //kosongkan input jumlah
        }
    </script>

@endpush

@section('contents')
    <section class="relative pt-2 px-3">
        <div class="container">
            <nav class="flex justify-between px-3 items-center" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 mr-2 overflow-hidden">
                    <li class="inline-flex items-center">
                        <a href="{{ route('admin.dashboard') }}"
                            class="inline-flex items-center text-sm lg:text-base font-medium text-green-500 hover:text-green-700 dark:text-green-300 dark:hover:text-white">
                            <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                </path>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-green-300" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span
                                class="ml-1 text-sm lg:text-base font-medium text-green-500 md:ml-2 dark:text-green-300">Tambah
                                produk</span>
                        </div>
                    </li>
                </ol>
                <a href="javascript:history.back()" class="text-blue-500 text-sm lg:text-base">
                    Kembali
                </a>
            </nav>
        </div>
    </section>

    @include('web.backoffice.pages.add-product.sections.add-product')
@endsection
