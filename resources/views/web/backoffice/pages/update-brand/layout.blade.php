@extends('web.backoffice.layouts.default')

@push('styles')
@livewireStyles
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('owl-carousel/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('owl-carousel/css/owl.theme.default.min.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css"/>
@endpush

@push('scripts')
@livewireScripts
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{ asset('js/backoffice/script.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>

<script>
    const deleteButton = document.querySelectorAll('.trash-button');
    deleteButton.forEach(function (button) {
        button.addEventListener('click', function (e) {
            Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Menghapus produk ini",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Iya, hapus produk ini!',
            cancelButtonText: 'Tidak'
            }).then((result) => {
            if (result.isConfirmed) {
                    let form = e.target.closest('form');
                    form.submit();
                }
            })
        }) 
    });

    $(document).ready(function () {
        $('#example').DataTable();
    });
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
                <li class="inline-flex items-center">
                    <a href="{{ route('admin.list.brand') }}"
                        class="inline-flex items-center text-sm lg:text-base font-medium text-green-500 hover:text-green-700 dark:text-green-300 dark:hover:text-white">
                        <svg class="w-6 h-6 text-green-300" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span
                            class="ml-1 text-sm lg:text-base font-medium text-green-500 hover:text-green-700 md:ml-2 dark:text-green-300">Brand</span>
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
                            class="ml-1 text-sm lg:text-base font-medium text-green-500 md:ml-2 dark:text-green-300">{{ $brand->nama }}</span>
                    </div>
                </li>
            </ol>
            <a href="javascript:history.back()" class="text-blue-500 text-sm lg:text-base">
                Kembali
            </a>
        </nav>
    </div>
</section>
@include('web.backoffice.pages.update-brand.sections.update-brand-form')
@endsection