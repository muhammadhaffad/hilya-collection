<div>
    <section id="list-products" class="px-3 pt-8">
        <div class="container space-y-8 ">
            <div class="flex font-semibold">
                <span
                    class="text-green-600 bg-green-50 rounded-lg px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">
                    <i class="fad fa-shopping-bag text-green-600"></i>
                    Daftar Produk
                </span>
            </div>
            {{-- <div class="flex flex-wrap w-full py-3 px-3 items-center border-[1px] rounded-lg my-8">
                <div class="flex gap-2 w-full lg:w-max">
                    <div class="my-2 w-full">
                        <label for="brand-produk" class="block mb-2 text-sm">Brand</label>
                        <select wire:model="brand" name="brand_id" id="brand-produk" class="form-control">
                            <option value="" selected>
                            Semua
                            </option>
                            @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">
                            {{ $brand->nama}}
                            </option>
                            @endforeach
                        </select>
                        <p class="mt-2 hidden">
                            @error('brand_id') {{ $message }} @enderror
                        </p>
                    </div>
                    <div class="my-2 w-full">
                        <label for="jenis-produk" class="block mb-2 text-sm">Jenis</label>
                        <select wire:model="jenis" name="brand_id" id="jenis-produk" class="form-control">
                            <option value="" selected>
                            Semua
                            </option>
                            @foreach ($status as $type)
                            <option value="{{ $type }}">
                            {{ $type }}
                            </option>
                            @endforeach
                        </select>
                        <p class="mt-2 hidden">
                            @error('brand_id') {{ $message }} @enderror
                        </p>
                    </div>
                    <div class="my-2 w-full">
                        <label for="brand-produk" class="block mb-2 text-sm">Urutan oleh</label>
                        <select wire:model="orderBy" name="brand_id" id="brand-produk" class="form-control">
                            <option value="id">
                            ID
                            </option>
                            <option value="brand_id">
                            Brand
                            </option>
                            <option value="type_id">
                            Jenis
                            </option>
                            <option value="nama">
                            Nama
                            </option>
                            <option value="created_at" selected>
                            Tanggal
                            </option>
                            <option value="totalStok">
                            Stok
                            </option>
                        </select>
                        <p class="mt-2 hidden">
                            @error('brand_id') {{ $message }} @enderror
                        </p>
                    </div>
                    <div class="my-2 w-full">
                        <label for="brand-produk" class="block mb-2 text-sm">Urutkan</label>
                        <select wire:model="desc" name="brand_id" id="brand-produk" class="form-control">
                            <option value="1" selected>
                            Desc
                            </option>
                            <option value="0">
                            Asc
                            </option>
                        </select>
                        <p class="mt-2 hidden">
                            @error('brand_id') {{ $message }} @enderror
                        </p>
                    </div>
                </div>
                <div class="my-2 group w-full lg:max-w-xs ml-auto">
                    <label for="nama-produk" class="block mb-2 text-sm">Cari</label>
                    <div class="absolute group-hover:text-blue-700">
                        <i class="fad fa-search my-3 mx-2"></i>
                    </div>
                    <input wire:model.lazy="search" name="nama" type="text" id="nama-produk" class="form-control"
                        placeholder="Cari kode produk atau brand" style="padding-left: 30px;">
                </div>
            </div> --}}
            <div>
                {{-- class="flex items-end p-6 w-full bg-white rounded-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex flex-col space-y-1">
                    <span class="text-sm w-1/2">Urutkan berdasarkan:</span>
                    <button id="dropdownDefault" data-dropdown-toggle="sort-by"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex justify-between items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">{{ $orderBy }} <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg></button>
                </div>
                <!-- Dropdown menu -->
                <div id="sort-by"
                    class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                    <ul class="list-none ml-0 py-1 text-sm text-gray-700 dark:text-gray-200"
                        aria-labelledby="dropdownDefault">
                        <li>
                            <input wire:model="orderBy" value="acd"
                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Tanggal
                        </li>
                        <li>
                            <input
                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Harga
                        </li>
                        <li>
                            <input
                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Stok
                        </li>
                    </ul>
                </div>
                <div class="flex flex-col space-y-1 ml-2">
                    <span class="text-sm w-1/2">Urutkan secara:</span>
                    <button id="dropdownDefault" data-dropdown-toggle="sort-in"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex justify-between items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">Terbesar <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg></button>
                </div>
                <!-- Dropdown menu -->
                <div id="sort-in"
                    class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                    <ul class="list-none ml-0 py-1 text-sm text-gray-700 dark:text-gray-200"
                        aria-labelledby="dropdownDefault">
                        <li>
                            <a href="#"
                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Terbesar</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Terkecil</a>
                        </li>
                    </ul>
                </div> --}}
                <form class="w-full lg:w-1/2 ml-auto mr-0">
                    <div class="flex">
                        <label for="search-dropdown"
                            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Your Email</label>
                        <button id="dropdown-button" data-dropdown-toggle="product-status"
                            class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                            type="button">{{$status}} <svg aria-hidden="true" class="ml-1 w-4 h-4" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg></button>
                        <div id="product-status"
                            class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700"
                            data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top"
                            style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(897px, 5637px, 0px);">
                            <ul class="list-none ml-0 p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioBgHoverButton">
                                <li>
                                  <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                      <input checked wire:model="status" id="default-radio-4" type="radio" value="Semua produk" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                      <label for="default-radio-4" class="ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300">Semua produk</label>
                                  </div>
                                </li>
                                <li>
                                  <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                      <input wire:model="status" id="default-radio-5" type="radio" value="Promo" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                      <label for="default-radio-5" class="ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300">Promo</label>
                                  </div>
                                </li>
                                <li>
                                  <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                      <input wire:model="status" id="default-radio-6" type="radio" value="Preorder" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                      <label for="default-radio-6" class="ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300">Preorder</label>
                                  </div>
                                </li>
                              </ul>
                        </div>
                        <div class="relative w-full">
                            <input wire:model.lazy="search" type="search" id="search-dropdown"
                                class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                placeholder="Cari kode produk atau brand" required>
                            <button type="button"
                                class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                <span class="sr-only">Search</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            @if (session('success'))
                <div id="alert-3" class="flex p-4 mb-4 bg-green-100 rounded-lg dark:bg-green-200 ml-auto w-1/2"
                    role="alert">
                    <svg class="flex-shrink-0 w-5 h-5 text-green-700 dark:text-green-800" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <div class="ml-3 text-sm font-medium text-green-700 dark:text-green-800">
                        {{ session('success') }}
                    </div>
                    <button type="button"
                        class="close-button ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-green-200 dark:text-green-600 dark:hover:bg-green-300"
                        data-dismiss-target="#alert-3" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            @endif
            @if (session('fail'))
                <div id="alert-2" class="flex p-4 mb-4 bg-red-100 rounded-lg dark:bg-red-200 ml-auto w-1/2"
                    role="alert">
                    <svg class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-800" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <div class="ml-3 text-sm font-medium text-red-700 dark:text-red-800">
                        {{ session('fail') }}
                    </div>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-red-200 dark:text-red-600 dark:hover:bg-red-300"
                        data-dismiss-target="#alert-2" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            @endif
            @if (!$products->count())
                <div class="flex flex-wrap justify-between lg:justify-start px-1">
                    <div class="p-2 w-full group lg:p-3">
                        <div class="flex h-20 rounded-lg bg-slate-100 lg:h-44">
                            <span class="mx-auto my-auto text-center font-bold text-slate-800 lg:text-base">Mohon maaf
                                🙏,
                                data yang Anda cari tidak ada...</span>
                        </div>
                    </div>
                </div>
            @endif
            <div class="mt-3 grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($products as $prod)
                    <div class="w-full relative border group rounded-lg border-green-200">
                        <a href="{{ route('home.detail', ['product' => $prod->slug]) }}"
                            class="relative cursor-pointer aspect-[1/1] bg-slate-300 overflow-hidden">
                            @isset ($prod->product_images->first()->gambar)
                                <img src="{{ asset('storage/' . $prod->product_images->first()->gambar) }}"
                                    class="object-cover aspect-square rounded-lg">
                            @else
                                <img src="https://source.unsplash.com/600x600" alt="" class="rounded-lg">
                            @endisset
                            <div class="absolute flex flex-wrap gap-1 top-0 right-0 flex-row-reverse py-1 px-1">
                            </div>
                        </a>
                        <div class="p-3">
                            @if ($prod->status == 'preorder')
                                <span
                                        class="absolute top-2 right-0 bg-green-500 text-white text-xs font-semibold mr-2 px-2.5 py-1 rounded dark:bg-green-200 dark:text-green-900">PREORDER</span>
                            @endif
                            @if ($prod->status == 'promo')
                                <span
                                    class="absolute top-2 right-0 bg-red-600 text-white text-xs font-semibold mr-2 px-2.5 py-1 rounded dark:bg-red-200 dark:text-red-900">
                                    <i class="fad fa-fire-alt text-white"></i>
                                    PROMO
                                </span>
                            @endif
                            <h1 class="block my-1 text-sm lg:text-base overflow-hidden overflow-ellipsis">
                                ({{ $prod->product_brand->nama }})
                                {{ $prod->nama }}
                            </h1>
                            <p class="block overflow-hidden overflow-ellipsis font-semibold text-green-600">
                                @if ($prod->product_prices->min('harga') == $prod->product_prices->max('harga'))
                                    @rupiah($prod->product_prices->min('harga'))
                                @else
                                    @rupiah($prod->product_prices->min('harga'))-
                                    @rupiah($prod->product_prices->max('harga'))
                                @endif
                            </p>
                            {{-- <span class="block text-xs my-2">
                                    <u>Stok</u>
                                </span> --}}
                            <button class="text-sm text-green-500 underline" data-popover-target="{{ $prod->slug }}">
                                Lihat stok...
                            </button>
                            <div id="{{ $prod->slug }}" role="tooltip"
                                class="inline-block absolute invisible z-[99] w-64 text-sm font-light text-gray-500 bg-white rounded-lg border border-gray-200 shadow-sm opacity-0 transition-opacity duration-300 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                <div
                                    class="py-2 px-3 bg-gray-100 rounded-t-lg border-b border-gray-200 dark:border-gray-600 dark:bg-gray-700">
                                    <h3 class="font-semibold text-gray-900 dark:text-white">Stok</h3>
                                </div>
                                <div class="py-2 px-3 overflow-auto">
                                    @php
                                        $maleAdult = $prod->product_prices->where('jenis', 1)->unique('ukuran');
                                        $maleKid = $prod->product_prices->where('jenis', 3)->unique('ukuran');
                                        $femaleAdult = $prod->product_prices->where('jenis', 0)->unique('ukuran');
                                        $femaleKid = $prod->product_prices->where('jenis', 2)->unique('ukuran');
                                    @endphp
                                    @if ($maleAdult->count() > 0)
                                        Laki-laki (Dewasa)
                                        <div class="grid grid-cols-6 gap-2 mb-1 my-2">
                                            @foreach ($maleAdult as $stok)
                                                <div class="block">
                                                    <div
                                                        class="flex rounded-full text-xs justify-center items-center border-[2px] aspect-square">
                                                        {{ Str::upper($stok->ukuran) }}
                                                    </div>
                                                    <span class="block text-center text-xs my-1">
                                                        {{ $prod->product_prices->where('jenis', 1)->where('ukuran',$stok->ukuran)->sum('jumlah') }}
                                                    </span>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                    @if ($maleKid->count() > 0)
                                        Laki-laki (Anak)
                                        <div class="grid grid-cols-6 gap-2 mb-1 my-2">
                                            @foreach ($maleKid as $stok)
                                                <div class="block">
                                                    <div
                                                        class="flex rounded-full text-xs justify-center items-center border-[2px] aspect-square">
                                                        {{ Str::upper($stok->ukuran) }}
                                                    </div>
                                                    <span class="block text-center text-xs my-1">
                                                        {{ $prod->product_prices->where('jenis', 3)->where('ukuran',$stok->ukuran)->sum('jumlah') }}
                                                    </span>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                    @if ($femaleAdult->count() > 0)
                                        Perempuan (Dewasa)
                                        <div class="grid grid-cols-6 gap-2 mb-1 my-2">
                                            @foreach ($femaleAdult as $stok)
                                                <div class="block">
                                                    <div
                                                        class="flex rounded-full text-xs justify-center items-center border-[2px] aspect-square">
                                                        {{ Str::upper($stok->ukuran) }}
                                                    </div>
                                                    <span class="block text-center text-xs my-1">
                                                        {{ $prod->product_prices->where('jenis', 0)->where('ukuran',$stok->ukuran)->sum('jumlah') }}
                                                    </span>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                    @if ($femaleKid->count() > 0)
                                        Perempuan (Anak)
                                        <div class="grid grid-cols-6 gap-2 mb-1 my-2">
                                            @foreach ($femaleKid as $stok)
                                                <div class="block">
                                                    <div
                                                        class="flex rounded-full text-xs justify-center items-center border-[2px] aspect-square">
                                                        {{ Str::upper($stok->ukuran) }}
                                                    </div>
                                                    <span class="block text-center text-xs my-1">
                                                        {{ $prod->product_prices->where('jenis', 2)->where('ukuran',$stok->ukuran)->sum('jumlah') }}
                                                    </span>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div data-popper-arrow></div>
                            </div>
                            <div class="flex flex-wrap justify-end gap-2">
                                <a href="{{ route('admin.update.product', ['product' => $prod->slug]) }}"
                                    class="text-green-500 hover:text-green-600">
                                    <i class="fa fa-edit"></i>
                                    Edit
                                </a>
                                <form action="{{ route('admin.delete.product', ['product' => $prod->slug]) }}"
                                    method="post">
                                    @csrf
                                    <button class="trash-button text-red-500 hover:text-red-600" type="submit" onclick="return confirm('Anda yakin ingin menghapus produk ini?')">
                                        <i class="fa fa-trash-alt"></i>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="w-full border-[1px] group rounded-lg shadow-lg">
                        <div class="relative hover:scale-105 aspect-[1/1] rounded-lg bg-slate-300 overflow-hidden">
                            @if ($prod->product_images->first()->gambar)
                                <img src="{{ asset('storage/' . $prod->product_images->first()->gambar) }}"
                                    class="object-cover aspect-square">
                            @else
                                <img src="https://source.unsplash.com/600x600" alt="">
                            @endif
                        </div>
                        <div class="px-3 py-2">
                            @if ($prod->type_id == '2')
                                <span
                                        class="absolute top-2 right-0 bg-green-500 text-white text-xs font-semibold mr-2 px-2.5 py-1 rounded dark:bg-green-200 dark:text-green-900">PREORDER</span>
                            @endif
                            @if ($prod->type_id == '1')
                                <span
                                    class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">PROMO</span>
                            @endif
                            <h1 class="pt-1 block overflow-hidden overflow-ellipsis">
                                ({{ $prod->product_brand->nama }}) {{ $prod->nama }}
                            </h1>
                            <p class="block overflow-hidden overflow-ellipsis font-bold text-green-600">
                                @if ($prod->product_prices->min('harga') == $prod->product_prices->max('harga'))
                                    {{ $prod->product_prices->min('harga') }}
                                @else
                                    {{ $prod->product_prices->min('harga') }} -
                                    {{ $prod->product_prices->max('harga') }}
                                @endif
                            </p>
                            <span class="block text-xs my-2">
                                <u>Stok</u>
                            </span>
                            <div class="grid grid-cols-4 lg:grid-cols-6 gap-1 mb-1">
                                @foreach ($prod->product_prices as $stok)
                                    <div class="block">
                                        <div
                                            class="flex rounded-full text-xs justify-center items-center border-[1px] bg-slate-200 aspect-square">
                                            {{ $stok->ukuran }}
                                        </div>
                                        <span class="block text-center text-xs">
                                            {{ $stok->jumlah }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                            <hr class="my-2">
                            <div class="flex flex-wrap justify-end gap-2">
                                <a href="{{ route('admin.update.product', ['product' => $prod->slug]) }}">
                                    <i class="p-2 border-[1px] rounded-md fad fa-edit button button-success"></i>
                                </a>
                                <form action="{{ route('admin.delete.product', ['product' => $prod->slug]) }}"
                                    method="post">
                                    @csrf
                                    <button class="trash-button" type="button">
                                        <i
                                            class="p-2 border-[1px] rounded-md fad fa-trash-alt button button-danger"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div> --}}
                @endforeach
            </div>
            <hr class="my-6">
            {{ $products->links() }}
            <div class="mb-6"></div>
        </div>
    </section>
</div>
