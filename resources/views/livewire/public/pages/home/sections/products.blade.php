<div>
    <section id="produk" class="">
        <div class="container space-y-8">
            <div class="flex justify-start space-x-2 items-center">
                <x-public.section-badge 
                    icon="fad fa-sparkles" 
                    sectionName="Produk Tersedia" 
                    class="text-yellow-500 bg-yellow-100 dark:bg-slate-600 dark:text-yellow-300">
                </x-public.section-badge>
                @if ($products->count() > 32)
                    <a href="{{ route('home.all-products') }}"
                        class="self-baseline text-blue-500 hover:text-blue-800 focus:text-blue-800 focus:font-semibold font-semibold block">Lihat
                        Semua...</a>
                @endif
            </div>
            @if ($products->count() < 1)
                <x-public.products-empty text="Mohon maaf
                🙏, data masih kosong..."></x-public.products-empty>
            @else
            <div class="grid grid-cols-2 gap-4 lg:gap-9 px-3 lg:grid-cols-4">
                @foreach ($products as $prod)
                    @if ($prod->product_prices->pluck('jumlah')->sum() > 0)
                        <x-public.product-card :product="$prod"></x-public>
                    @endif
                @endforeach
                @for ($i = 0; $i < $count; $i++)
                    <div class="w-full border group rounded-lg loading-products border-green-200 animate-pulse hidden">
                        <div class="flex relative cursor-pointer aspect-[1/1] justify-center items-center bg-slate-300 overflow-hidden">
                            <svg class="w-12 h-12 text-gray-200" class="rounded-lg" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="currentColor" viewBox="0 0 640 512"><path d="M480 80C480 35.82 515.8 0 560 0C604.2 0 640 35.82 640 80C640 124.2 604.2 160 560 160C515.8 160 480 124.2 480 80zM0 456.1C0 445.6 2.964 435.3 8.551 426.4L225.3 81.01C231.9 70.42 243.5 64 256 64C268.5 64 280.1 70.42 286.8 81.01L412.7 281.7L460.9 202.7C464.1 196.1 472.2 192 480 192C487.8 192 495 196.1 499.1 202.7L631.1 419.1C636.9 428.6 640 439.7 640 450.9C640 484.6 612.6 512 578.9 512H55.91C25.03 512 .0006 486.1 .0006 456.1L0 456.1z"/></svg>
                        </div>
                        <div class="p-3">
                            <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-1/3 mb-4"></div>
                            <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-1/2 mb-4"></div>
                            <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-full mb-4"></div>
                            {{-- <span class="block text-xs my-2">
                                <u>Stok</u>
                            </span> --}}
                            <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-1/2 mb-4"></div>
                        </div>
                    </div>
                @endfor
            </div>
            @endif
            @if ($count > 0)
                <div class="mt-8">
                    <x-public.button-primary buttonName="Lihat lainnya" color="green" id="load-more" class="flex mx-auto"></x-public.button-primary>
                    {{-- <button id="load-more" class="mx-auto flex py-2 px-3 text-sm font-medium text-center text-white bg-green-400 rounded-lg hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-400 dark:focus:ring-green-800">Lihat lainnya</button> --}}
                </div>
            @endif
        </div>
    </section>
</div>
