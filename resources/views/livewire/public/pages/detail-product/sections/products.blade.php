<div>
    <section id="produk" class="pt-4 lg:pt-8">
        <div class="container">
            <div class="flex justify-start space-x-2 px-3 items-center">
                <span class="self-baseline text-lg font-semibold block lg:text-xl lg:font-bold lg:pb-3">Produk
                    lainnya
                </span>
                @if ($products->count() > 50)
                <a href="#"
                    class="self-baseline text-sm text-blue-500 hover:text-blue-800 focus:text-blue-800 focus:font-semibold font-semibold block lg:text-lg">Lihat
                    Semua</a>
                @endif
            </div>
            <div class="flex flex-wrap justify-between lg:justify-start px-1">
                @foreach ($products as $prod)
                <a href="{{ route('home.detail', ['product'=>$prod->id]) }}" class="w-1/2 p-2 group lg:w-1/4 lg:p-3">
                    <div class="relative cursor-pointer hover:scale-105 aspect-[1/1] rounded-lg bg-slate-300 overflow-hidden">
                        @if ($prod->images->first()->gambar)
                        <img src="{{ asset('storage/' . $prod->images->first()->gambar) }}" class="object-cover aspect-square">
                        @else
                        <img src="https://source.unsplash.com/600x600" class="object-cover aspect-square">
                        @endif
                        <div class="absolute flex flex-wrap gap-1 top-0 right-0 flex-row-reverse py-1 px-1">
                            {{-- @php
                            $postDate = new \Carbon\Carbon($prod->tanggalPost);
                            $now = new \Carbon\Carbon(); 
                            @endphp
                            @if($postDate->diff($now)->days < 8)
                            <div
                                class="px-2 py-1 rounded-md bg-red-600 bg-opacity-70 text-xs font-semibold text-white">
                                Baru
                            </div>
                            @endif
                            @if ($prod->stocks->sum('jumlah') < 1)
                            <div class="px-2 py-1 rounded-md bg-slate-600 bg-opacity-70 text-xs font-semibold text-white">
                                Habis
                            </div>
                            @endif --}}
                        </div>
                    </div>
                    <h1 class="pt-1 block overflow-hidden overflow-ellipsis lg:text-base">
                        {{ $prod->nama }}
                    </h1>
                    <p class="block overflow-hidden overflow-ellipsis font-bold text-red-600">
                        {{ $prod->harga }}
                    </p>
                </a>
                @endforeach 
                @for ($i = 0; $i < $count; $i++)
                <div class="w-1/2 p-2 group animate-pulse lg:w-1/4 lg:p-3 loading-products hidden">
                    <div class="relative aspect-[1/1] rounded-lg bg-slate-300">
                        <div class="absolute flex flex-wrap gap-1 top-0 right-0 flex-row-reverse py-1 px-1">
                        </div>
                    </div>
                    <h1
                        class="pt-1 block overflow-hidden overflow-ellipsis bg-slate-300 text-slate-300 my-1 rounded-md lg:text-base">
                        Produk
                    </h1>
                    <p
                        class="block overflow-hidden overflow-ellipsis font-bold text-red-300 bg-red-300 my-1 rounded-md">
                        Rp. 999.999
                    </p>
                </div>
                @endfor
            </div>
            @if ($count > 0)
                <button id="load-more" class="mx-auto mt-2 button button-dark text-xs lg">Lihat lainnya</button>
            @endif
        </div>
    </section>
</div>