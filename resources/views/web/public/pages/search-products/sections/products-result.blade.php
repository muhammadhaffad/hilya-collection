<section id="produk" class="">
    <div class="container space-y-8">
        <div class="flex self-baseline px-3 font-semibold">
            <span
                class="text-blue-600 bg-blue-50 rounded-lg px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                <span class="font-normal">Hasil pencarian dari</span> "{{ $search->get('search') }}" <span
                    class="font-normal">di</span>
                {{ $search->get('category') == 'all' ? 'semua produk' : 'produk ' . $search->get('category') }}
            </span>
        </div>
        @if ($products->count() < 1)
            <x-public.products-empty text="Mohon maaf 🙏, produk yang anda cari tidak ditemukan..."></x-public.products-empty>
        @else
            <div class="flex justify-end">
                <button id="sort" data-dropdown-toggle="dropdown-2"
                    class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm text-center inline-flex items-center px-5 py-2.5 mr-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                    type="button">Urutkan harga :
                    {{ in_array($search->get('harga'), ['tinggi', 'rendah']) ? Str::ucfirst($search->get('harga')) : 'Default' }}
                    <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg></button>
                <!-- Dropdown menu -->
                <div id="dropdown-2"
                    class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                    <ul class="list-none ml-0 py-1 text-sm text-gray-700 dark:text-gray-200"
                        aria-labelledby="dropdownDefault">
                        <li>
                            <a href="{{ url()->full() == url()->current() ? url()->full() . '?harga=tinggi' : url()->full() . '&harga=tinggi' }}"
                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Tinggi</a>
                        </li>
                        <li>
                            <a href="{{ url()->full() == url()->current() ? url()->full() . '?harga=rendah' : url()->full() . '&harga=rendah' }}"
                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Rendah</a>
                        </li>
                        <li>
                            <a href="{{ url()->full() == url()->current() ? url()->full() . '?harga=none' : url()->full() . '&harga=none' }}"
                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Default</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 lg:gap-9 px-3 lg:grid-cols-4">
                @foreach ($products as $prod)
                    @if ($prod->status !== 'preorder')
                        @if ($prod->product_prices->pluck('jumlah')->sum() < 1)
                            @php continue; @endphp
                        @endif
                    @endif
                    <x-public.product-card :product="$prod"></x-public.product-card>
                @endforeach
            </div>
            <div class="my-8 px-4">
                {{ $products->links() }}
            </div>
        @endif
    </div>
</section>
