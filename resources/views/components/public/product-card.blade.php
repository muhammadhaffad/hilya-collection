@props(['product'])
<div>
    <!-- I begin to speak only when I am certain what I will say is not better left unsaid. - Cato the Younger -->
    <div class="w-full shadow-lg relative group rounded-lg border-green-200 dark:border-slate-700">
        <a href="{{ route('home.detail', ['product' => $product->slug]) }}"
            class="relative cursor-pointer aspect-[1/1] bg-slate-300 overflow-hidden">
            @if ($product->product_images->first()->gambar)
                <img src="{{ asset('storage/' . $product->product_images->first()->gambar) }}"
                    class="object-cover aspect-square rounded-lg">
            @else
                <img src="https://source.unsplash.com/600x600" alt="" class="rounded-lg">
            @endif
            <div class="absolute flex flex-wrap gap-1 top-0 right-0 flex-row-reverse py-1 px-1">
                {{-- @php
                        $postDate = new \Carbon\Carbon($product->tanggalPost);
                        $now = new \Carbon\Carbon(); 
                        @endphp
                        @if ($postDate->diff($now)->days < 3)
                        <div
                            class="px-2 py-1 rounded-md bg-red-600 bg-opacity-70 text-xs font-semibold text-white">
                            Baru
                        </div>
                        @endif
                        @if ($product->product_prices->sum('jumlah') < 1)
                        <div class="px-2 py-1 rounded-md bg-slate-600 bg-opacity-70 text-xs font-semibold text-white">
                            Habis
                        </div>
                     @endif --}}
            </div>
        </a>
        @if ($product->status == 'preorder')
            <span
                class="absolute top-2 right-0 bg-green-500 text-white text-xs font-semibold mr-2 px-2.5 py-1 rounded dark:bg-green-200 dark:text-green-900">
                PREORDER
            </span>
        @endif
        @if ($product->status == 'promo')
            <span
                class="absolute top-2 right-0 bg-red-600 text-white text-xs font-semibold mr-2 px-2.5 py-1 rounded dark:bg-red-200 dark:text-red-900">
                <i class="fad fa-fire-alt text-white"></i>
                PROMO
            </span>
        @endif
        <div class="p-3 space-y-2">
            <h1 class="block text-sm lg:text-base overflow-hidden overflow-ellipsis">
                ({{ $product->product_brand->nama }}) {{ $product->nama }}
            </h1>
            <div>
                @if($product->status == 'promo')
                    <s class="block text-xs">
                        @if ($product->product_prices->min('harga') == $product->product_prices->max('harga'))
                            @rupiah($product->product_prices->min('harga')) 
                        @else
                            @rupiah($product->product_prices->min('harga'))-
                            @rupiah($product->product_prices->max('harga'))
                        @endif
                    </s>
                @endif
                <p class="block overflow-hidden overflow-ellipsis font-semibold text-green-600">
                    @if ($product->product_prices->min('harga') == $product->product_prices->max('harga'))
                        @rupiah($product->product_prices->min('harga') - $product->product_prices->min('harga')*$product->product_prices->first()->diskon/100) 
                    @else
                        @rupiah($product->product_prices->min('harga') - $product->product_prices->min('harga')*$product->product_prices->first()->diskon/100)-
                        @rupiah($product->product_prices->max('harga') - $product->product_prices->max('harga')*$product->product_prices->first()->diskon/100)
                    @endif
                    @if ($product->status == 'promo')
                    <span class="text-red-600">
                        (-{{ $product->product_prices->first()->diskon }}%)
                    </span>
                    @endif
                </p>
            </div>
            <button class="text-sm text-green-500 underline" data-popover-target="{{ $product->slug }}">
                Lihat stok...
            </button>
            <div id="{{ $product->slug }}" role="tooltip"
                class="inline-block absolute invisible z-10 w-64 text-sm font-light text-gray-500 bg-white rounded-lg border border-gray-200 shadow-sm opacity-0 transition-opacity duration-300 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                <div
                    class="py-2 px-3 bg-gray-100 rounded-t-lg border-b border-gray-200 dark:border-gray-600 dark:bg-gray-700">
                    <h3 class="font-semibold text-gray-900 dark:text-white">Stok</h3>
                </div>
                <div class="py-2 px-3 overflow-auto">
                    @php
                        $maleAdult = $product->product_prices->where('jenis', 1)->unique('ukuran');
                        $maleKid = $product->product_prices->where('jenis', 3)->unique('ukuran');
                        $femaleAdult = $product->product_prices->where('jenis', 0)->unique('ukuran');
                        $femaleKid = $product->product_prices->where('jenis', 2)->unique('ukuran');
                    @endphp
                    @if ($maleAdult->count() > 0)
                        Laki-laki (Dewasa)
                        <div class="grid grid-cols-6 gap-2 mb-1 my-2">
                            @foreach ($maleAdult as $stok)
                                @if($stok->jumlah > 0)
                                <div class="block">
                                    <div
                                        class="flex rounded-full text-xs justify-center items-center border-[2px] aspect-square">
                                        {{ Str::upper($stok->ukuran) }}
                                    </div>
                                    <span class="block text-center text-xs my-1">
                                        {{ $product->product_prices->where('jenis', 1)->where('ukuran',$stok->ukuran)->sum('jumlah') }}
                                    </span>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                    @if ($maleKid->count() > 0)
                        Laki-laki (Anak)
                        <div class="grid grid-cols-6 gap-2 mb-1 my-2">
                            @foreach ($maleKid as $stok)
                                @if($stok->jumlah > 0)
                                <div class="block">
                                    <div
                                        class="flex rounded-full text-xs justify-center items-center border-[2px] aspect-square">
                                        {{ Str::upper($stok->ukuran) }}
                                    </div>
                                    <span class="block text-center text-xs my-1">
                                        {{ $product->product_prices->where('jenis', 3)->where('ukuran',$stok->ukuran)->sum('jumlah') }}
                                    </span>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                    @if ($femaleAdult->count() > 0)
                        Perempuan (Dewasa)
                        <div class="grid grid-cols-6 gap-2 mb-1 my-2">
                            @foreach ($femaleAdult as $stok)
                                @if ($stok->jumlah > 0)
                                <div class="block">
                                    <div
                                        class="flex rounded-full text-xs justify-center items-center border-[2px] aspect-square">
                                        {{ Str::upper($stok->ukuran) }}
                                    </div>
                                    <span class="block text-center text-xs my-1">
                                        {{ $product->product_prices->where('jenis', 0)->where('ukuran',$stok->ukuran)->sum('jumlah') }}
                                    </span>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                    @if ($femaleKid->count() > 0)
                        Perempuan (Anak)
                        <div class="grid grid-cols-6 gap-2 mb-1 my-2">
                            @foreach ($femaleKid as $stok)
                                @if ($stok->jumlah > 0)
                                <div class="block">
                                    <div
                                        class="flex rounded-full text-xs justify-center items-center border-[2px] aspect-square">
                                        {{ Str::upper($stok->ukuran) }}
                                    </div>
                                    <span class="block text-center text-xs my-1">
                                        {{ $product->product_prices->where('jenis', 2)->where('ukuran',$stok->ukuran)->sum('jumlah') }}
                                    </span>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
                <div data-popper-arrow></div>
            </div>
            {{-- Modal --}}
            {{-- <div id="{{ $product->slug }}" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Stok {{ $product->nama }}
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-toggle="{{ $product->slug }}">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <div class="overflow-x-auto space-y-2 relative">
                                @php
                                    $male = $product->product_prices->where('jenis', 1);
                                    $female = $product->product_prices->where('jenis', 0);
                                @endphp
                                @if ($male->count() > 0)
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead
                                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" colspan="3"
                                                    class="text-center underline py-3 px-6">
                                                    Laki-laki
                                                </th>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="py-3 px-6">
                                                    Ukuran
                                                </th>
                                                <th scope="col" class="py-3 px-6">
                                                    Stok
                                                </th>
                                                <th scope="col" class="py-3 px-6">
                                                    Harga
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($male as $item)
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <th scope="row"
                                                        class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $item->ukuran }}
                                                    </th>
                                                    <td class="py-4 px-6">
                                                        @if ($product->status == 'preorder')
                                                            Preorder
                                                        @else
                                                            {{ $item->stok }}
                                                        @endif
                                                    </td>
                                                    <td class="py-4 px-6">
                                                        @rupiah($item->harga)
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                                @if ($female->count() > 0)
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead
                                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" colspan="3"
                                                    class="text-center underline py-3 px-6">
                                                    Perempuan
                                                </th>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="py-3 px-6">
                                                    Ukuran
                                                </th>
                                                <th scope="col" class="py-3 px-6">
                                                    Stok
                                                </th>
                                                <th scope="col" class="py-3 px-6">
                                                    Harga
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($female as $item)
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <th scope="row"
                                                        class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $item->ukuran }}
                                                    </th>
                                                    <td class="py-4 px-6">
                                                        @if ($product->status == 'preorder')
                                                            Preorder
                                                        @else
                                                            {{ $item->stok }}
                                                        @endif
                                                    </td>
                                                    <td class="py-4 px-6">
                                                        @rupiah($item->harga)
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div
                            class="flex justify-end items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                            <button data-modal-toggle="{{ $product->slug }}" type="button"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                                accept</button>
                            <button data-modal-toggle="{{ $product->slug }}" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="grid grid-cols-4 lg:grid-cols-6 gap-2 mb-1 my-2">
                @foreach ($product->product_prices as $stok)
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
            </div> --}}
            <div class="flex justify-start">
                <x-public.button-primary buttonName="Lihat produk" color="green" link="{{ route('home.detail', ['product' => $product->slug]) }}"></x-public.button-primary>
            </div>
        </div>
    </div>
</div>
