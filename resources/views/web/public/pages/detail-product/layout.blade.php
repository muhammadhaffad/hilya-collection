@extends('web.public.layouts.default')

@push('styles')
    @livewireStyles
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
    <script>
        const targetEl = document.getElementById('brandsList');

        // options with default values
        const options = {
            placement: 'bottom-right',
            backdropClasses: 'bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40',
            onHide: () => {
                console.log('modal is hidden');
            },
            onShow: () => {
                console.log('modal is shown');
            },
            onToggle: () => {
                console.log('modal has been toggled');
            }
        };
    </script>
    @livewireScripts
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('owl-carousel/js/owl.carousel.min.js') }}"></script>
    <script>
        function stock_input(id, ukuran, warna, harga, stok, jenis, iter) {
            let sisaStok = '';
            let busana = '';
            if (parseInt(stok,10) === 2500) {
                sisaStok = 'Preorder item';
            } else {
                sisaStok = `Sisa: ${stok} item`;
            }
            switch (jenis) {
                case '0':
                    busana = 'PR (Dewasa)'
                    break;
                case '1':
                    busana = 'LK (Dewasa)'
                    break;
                case '2':
                    busana = 'PR (Anak)'
                    break;
                case '3':
                    busana = 'LK (Anak)'
                    break;
            
                default:
                    break;
            }
            return `<div id=${id} class="flex items-center gap-2">
                        <span class="bg-white rounded-lg p-1.5 h-[32px] text-center aspect-square text-xs border-2">
                            ${ukuran}
                        </span>
                        <div class="flex-col w-full">
                            <div>${busana} | ${harga} | (${warna})</div>
                            <div class="text-xs">${sisaStok}</div>
                        </div>
                        <div>
                            <div class="flex">
                                <x-public.button-primary type="button" class="h-8 w-8 px-1 py-1 rounded-none rounded-l-lg" color="green" buttonName="-" onclick="decrement(this)"></x-public.button-primary>
                                <input type="number" max="${stok}" name="produk[${id}][jumlah]" value="1" class="block text-center w-12 h-8 text-gray-900 bg-gray-50 border-white sm:text-xs dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">                                  
                                <x-public.button-primary type="button" class="h-8 w-8 px-1 py-1 rounded-none rounded-r-lg" color="green" buttonName="+" onclick="increment(this)"></x-public.button-primary>                                 
                            </div>
                        </div>
                    </div>`;
        }

        function decrement(e) {
            let value = parseInt(e.parentElement.nextElementSibling.value, 10);
            value = isNaN(value) ? 0 : value;
            if (value - 1 >= 1) {
                value--;
            }
            e.parentElement.nextElementSibling.value = value;
        }
        
        function increment(e) {
            let value = parseInt(e.parentElement.previousElementSibling.value, 10);
            let max = parseInt(e.parentElement.previousElementSibling.max, 10);
            value = isNaN(value) ? 0 : value;
            if(value + 1 <= max) {
                value++;
            }
            e.parentElement.previousElementSibling.value = value;
        }

        /* Male-adult checkbox */
        const MaleAdult = document.querySelectorAll('.MaleAdult-checkbox');
        const buttonMaleAdult = document.querySelector('#dropdownMaleAdult');
        var i = 0;
        MaleAdult.forEach(function(item) {
            item.addEventListener('click', function(e) {
                let id = e.target.value;
                let ukuran = e.target.getAttribute('data-ukuran');
                let warna = e.target.getAttribute('data-warna');
                let harga = e.target.getAttribute('data-harga-produk');
                let stok = e.target.getAttribute('data-stok-produk');
                let jenis = e.target.getAttribute('data-jenis');
                if (e.target.checked) {
                    document.getElementById('container-pesan').innerHTML += stock_input(id, ukuran, warna, harga, stok, jenis, i++);
                } else {
                    document.getElementById(id).remove();
                }
            })
        });

        /* Male-kid checkbox */
        const MaleKid = document.querySelectorAll('.MaleKid-checkbox');
        const buttonMaleKid = document.querySelector('#dropdownMaleKid');
        var i = 0;
        MaleKid.forEach(function(item) {
            item.addEventListener('click', function(e) {
                let id = e.target.value;
                let ukuran = e.target.getAttribute('data-ukuran');
                let warna = e.target.getAttribute('data-warna');
                let harga = e.target.getAttribute('data-harga-produk');
                let stok = e.target.getAttribute('data-stok-produk');
                let jenis = e.target.getAttribute('data-jenis');
                if (e.target.checked) {
                    document.getElementById('container-pesan').innerHTML += stock_input(id, ukuran, warna, harga, stok, jenis, i++);
                } else {
                    document.getElementById(id).remove();
                }
            })
        });

        /* Female-adult checkbox */
        const FemaleAdult = document.querySelectorAll('.FemaleAdult-checkbox');
        const buttonFemaleAdult = document.querySelector('#dropdownFemaleAdult');
        
        var i = 0;
        FemaleAdult.forEach(function(item) {
            item.addEventListener('click', function(e) {
                let id = e.target.value;
                let ukuran = e.target.getAttribute('data-ukuran');
                let warna = e.target.getAttribute('data-warna');
                let harga = e.target.getAttribute('data-harga-produk');
                let stok = e.target.getAttribute('data-stok-produk');
                let jenis = e.target.getAttribute('data-jenis');
                if (e.target.checked) {
                    document.getElementById('container-pesan').innerHTML += stock_input(id, ukuran, warna, harga, stok, jenis, i++);
                } else {
                    document.getElementById(id).remove();
                }
            })
        });

        /* Female-kid checkbox */
        const FemaleKid = document.querySelectorAll('.FemaleKid-checkbox');
        const buttonFemaleKid = document.querySelector('#dropdownFemaleKid');
        
        var i = 0;
        FemaleKid.forEach(function(item) {
            item.addEventListener('click', function(e) {
                let id = e.target.value;
                let ukuran = e.target.getAttribute('data-ukuran');
                let warna = e.target.getAttribute('data-warna');
                let harga = e.target.getAttribute('data-harga-produk');
                let stok = e.target.getAttribute('data-stok-produk');
                let jenis = e.target.getAttribute('data-jenis');
                if (e.target.checked) {
                    document.getElementById('container-pesan').innerHTML += stock_input(id, ukuran, warna, harga, stok, jenis, i++);
                } else {
                    document.getElementById(id).remove();
                }
            })
        });

    </script>
@endpush

@section('contents')
    {{-- Add some padding and navigation --}}
    <section class="relative pt-8">
        <div class="container">
            <x-public.breadcrumb>
                <x-slot:breadcrumbItem>
                    <x-public.breadcrumb-item link="{{ route('home.index') }}" icon="fas fa-home" name="Home" class="gap-2">
                    </x-public.breadcrumb-item>
                    <x-public.breadcrumb-item icon="fas fa-chevron-right" name="Detail" class="gap-2">
                    </x-public.breadcrumb-item>
                    <x-public.breadcrumb-item icon="fas fa-chevron-right" name="({{ $product->product_brand->nama }}) {{ $product->nama }}" class="gap-2">
                    </x-public.breadcrumb-item>
                </x-slot:breadcrumbItem>
            </x-public.breadcrumb>
            <div class="flex flex-wrap justify-between px-3">
            </div>
        </div>
    </section>

    {{-- Product detail section start --}}
    @include('web.public.pages.detail-product.sections.product-detail')
    {{-- Product detail section end --}}

    <hr>

    {{-- Products section start --}}
    @livewire('public.pages.home.sections.products')
    {{-- Products section end --}}
@endsection
