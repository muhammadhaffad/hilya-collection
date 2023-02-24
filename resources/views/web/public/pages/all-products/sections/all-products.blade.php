<section id="produk" class="py-8">
    <div class="container space-y-8">
        <div class="self-baseline px-3 font-semibold flex">
            <div
                class="text-yellow-600 bg-yellow-50 rounded-lg px-5 py-2.5 mr-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 focus:outline-none dark:focus:ring-yellow-800">
                <i class="fad fa-sparkles text-yellow-500"></i>
                Ready Products
            </div>
        </div>
        @if (!$products->count())
            <div class="flex flex-wrap justify-between lg:justify-start px-3">
                <div class="w-full group">
                    <div class="flex h-20 rounded-lg bg-slate-100 lg:h-44">
                        <span class="mx-auto my-auto text-center font-bold text-slate-800 lg:text-base">Mohon maaf 🙏,
                            data masih kosong...</span>
                    </div>
                </div>
            </div>
        @else
        <div class="px-3 flex justify-end">
            <button id="sort" data-dropdown-toggle="dropdown"
                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm text-center inline-flex items-center px-5 py-2.5 mr-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                type="button">Urutkan harga : {{ (in_array($request->get('harga'), array('tinggi', 'rendah'))) ? Str::ucfirst($request->get('harga')) : 'Default' }} <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg></button>
            <!-- Dropdown menu -->
            <div id="dropdown"
                class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                <ul class="list-none ml-0 py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                    <li>
                        <a href="{{  (url()->full() == url()->current()) ? url()->full().'?harga=tinggi' : url()->full().'&harga=tinggi' }}"
                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Tinggi</a>
                    </li>
                    <li>
                        <a href="{{  (url()->full() == url()->current()) ? url()->full().'?harga=rendah' : url()->full().'&harga=rendah' }}"
                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Rendah</a>
                    </li>
                    <li>
                        <a href="{{  (url()->full() == url()->current()) ? url()->full().'?harga=none' : url()->full().'&harga=none' }}"
                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Default</a>
                    </li>
                </ul>
            </div>
        </div>
            <div class="grid grid-cols-2 gap-4 lg:gap-9 px-3 lg:grid-cols-4">
                @foreach ($products as $prod)
                    @if ($prod->product_prices->pluck('jumlah')->sum() > 0)
                        <div class="w-full relative border group rounded-lg border-green-200">
                            <a href="{{ route('home.detail', ['product' => $prod->slug]) }}"
                                class="relative cursor-pointer aspect-[1/1] bg-slate-300 overflow-hidden">
                                @if ($prod->product_images->first()->gambar)
                                    <img src="{{ asset('storage/' . $prod->product_images->first()->gambar) }}"
                                        class="object-cover aspect-square rounded-lg">
                                @else
                                    <img src="https://source.unsplash.com/600x600" alt="" class="rounded-lg">
                                @endif
                                <div class="absolute flex flex-wrap gap-1 top-0 right-0 flex-row-reverse py-1 px-1">
                                    {{-- @php
                                    $postDate = new \Carbon\Carbon($prod->tanggalPost);
                                    $now = new \Carbon\Carbon(); 
                                    @endphp
                                    @if ($postDate->diff($now)->days < 3)
                                    <div
                                        class="px-2 py-1 rounded-md bg-red-600 bg-opacity-70 text-xs font-semibold text-white">
                                        Baru
                                    </div>
                                    @endif
                                    @if ($prod->product_prices->sum('jumlah') < 1)
                                    <div class="px-2 py-1 rounded-md bg-slate-600 bg-opacity-70 text-xs font-semibold text-white">
                                        Habis
                                    </div>
                                 @endif --}}
                                </div>
                            </a>
                            <div class="p-3">
                                @if ($prod->status == 'preorder')
                                    <span
                                        class="absolute top-2 right-0 bg-green-600 text-white text-xs font-semibold mr-2 px-2.5 py-1 rounded dark:bg-green-200 dark:text-green-900">PREORDER</span>
                                @endif
                                @if ($prod->status == 'promo')
                                    <span
                                        class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">
                                        <i class="fad fa-fire-alt text-red-600"></i>
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
                                <div class="grid grid-cols-4 lg:grid-cols-6 gap-2 mb-1 my-2">
                                    @foreach ($prod->product_prices as $stok)
                                        <div class="block">
                                            <div
                                                class="flex rounded-full text-xs justify-center items-center border-[2px] aspect-square">
                                                {{ Str::upper($stok->ukuran) }}
                                            </div>
                                            <span class="block text-center text-xs my-1">
                                                {{ $stok->jumlah }}
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="flex justify-end">
                                    <a href="{{ route('home.detail', ['product' => $prod->slug]) }}"
                                        class="inline-block py-2 px-3 text-sm font-medium text-center text-white bg-green-400 rounded-lg hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-400 dark:focus:ring-green-800">Pesan</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
        <div class="px-4">
            {{ $products->links() }}
        </div>
    </div>
</section>
