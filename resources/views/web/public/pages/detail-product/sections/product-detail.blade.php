<section class="relative">
    <div class="container">
        <div class="block lg:flex gap-3">
            <div class="w-full lg:w-1/2">
                <div class="lg:sticky lg:top-24">
                    <div class="aspect-square rounded-lg bg-slate-500 overflow-hidden">
                        @if ($product->product_images->first()->gambar)
                            <img id="main-image" src="{{ asset('storage/' . $product->product_images->first()->gambar) }}"
                                class="object-fill aspect-square h-full">
                        @else
                            <img id="main-image" src="https://source.unsplash.com/600x600"
                                class="object-fill aspect-square h-full">
                        @endif
                    </div>
                    <div class="grid grid-cols-5 gap-2 py-2">
                        @foreach ($product->product_images as $image)
                            <div class="">
                                <div
                                    class="aspect-square rounded-lg bg-slate-300 overflow-hidden hover:ring-2 cursor-pointer small-image">
                                    @if ($image->gambar)
                                        <img src="{{ asset('storage/' . $image->gambar) }}"
                                            class="object-fill aspect-square">
                                    @else
                                        <img src="https://source.unsplash.com/600x600">
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="w-full pt-3 lg:pt-0 lg:pl-6 lg:w-1/2 space-y-3">
                <div class="font-semibold text-xl flex items-start gap-2">
                    <div class="block">
                        <span class="block text-slate-500 text-lg font-medium">
                            {{ $product->product_brand->nama }}
                        </span>
                        <div class="flex items-center gap-3">
                            <span class="text-3xl font-medium">
                                {{ $product->nama }}
                            </span>
                            @if ($product->status == 'preorder')
                                <span
                                    class="bg-green-500 text-white text-xs font-semibold mr-2 px-2.5 py-1 rounded dark:bg-green-200 dark:text-green-900">
                                    PREORDER
                                </span>
                            @endif
                            @if ($product->status == 'promo')
                                <span
                                    class="bg-red-600 text-white text-xs font-semibold mr-2 px-2.5 py-1 rounded dark:bg-red-200 dark:text-red-900">
                                    <i class="fad fa-fire-alt text-white"></i>
                                    PROMO
                                </span>
                            @endif
                        </div>
                        <p class="text-base">
                            <span class="font-normal">Kategori: </span>
                            {{ $product->kategori }}
                        </p>
                    </div>
                </div> 

                <span class="block font-medium text-green-500">Deskripsi produk</span>
                <p class="text-justify">
                    {!! $product->deskripsi !!}
                </p>
                <hr>
                <div class="flex flex-col gap-1 justify-between">
                    <div class="block">
                        @if($product->status == 'promo')
                            <s class="block text-base">
                                @if ($product->product_prices->min('harga') == $product->product_prices->max('harga'))
                                    @rupiah($product->product_prices->min('harga')) 
                                @else
                                    @rupiah($product->product_prices->min('harga'))-
                                    @rupiah($product->product_prices->max('harga'))
                                @endif
                            </s>
                            <p class="block text-2xl overflow-hidden overflow-ellipsis font-semibold text-green-600">
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
                        @else
                            <p class="block text-2xl overflow-hidden overflow-ellipsis font-semibold text-green-600">
                                @if ($product->product_prices->min('harga') == $product->product_prices->max('harga'))
                                    @rupiah($product->product_prices->min('harga')) 
                                @else
                                    @rupiah($product->product_prices->min('harga'))-
                                    @rupiah($product->product_prices->max('harga'))
                                @endif
                            </p>
                        @endif
                    </div>
                </div>
                <div class="w-full">
                    <form action="{{ route('home.order-product', ['product' => $product->slug]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="space-y-3 rounded-lg relative">
                            <span class="flex text-base">
                                Pilih ukuran
                            </span>
                            @if ($product->product_prices()->where('jenis', 1)->sum('jumlah') > 0)
                                <span class="flex">
                                    Laki-laki (Dewasa):
                                </span>
                                <div class="block">
                                    <button id="dropdownMaleAdult" data-dropdown-toggle="dropdownMaleAdultStock" data-dropdown-placement="bottom-start" class=" w-full justify-between border-2 focus:ring-2 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="button">-Pilih Ukuran- <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
                                </div>
                                <!-- Dropdown menu -->
                                <div id="dropdownMaleAdultStock" class="z-10 w-[calc(100%-40px)] bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 hidden" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(310px, 70px);">
                                    <ul class="list-none ml-0 p-3 space-y-3 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMaleAdult">
                                        @foreach ($product->product_prices->where('jenis', 1) as $stock)
                                            @if ($stock->jumlah > 0)
                                                <li>
                                                    <div class="flex items-center">
                                                    <input id="checkbox-item-{{ $stock->id }}" type="checkbox" value="{{ $stock->id }}" data-ukuran="{{ $stock->ukuran }}" data-warna="{{ $stock->warna }}" data-harga-produk="@if($product->status == 'promo') <s>@rupiah($stock->harga)</s> @rupiah($stock->harga - $stock->harga*($stock->diskon/100)) (-{{$stock->diskon}}%)  @else @rupiah($stock->harga) @endif" data-jenis="{{$stock->jenis}}" data-stok-produk="{{ $product->status === 'preorder' ? 2500 : $stock->jumlah }}" data-keterangan = "{{ $stock->keterangan ?? '' }}" class="MaleAdult-checkbox w-4 h-4 text-green-600 bg-gray-100 rounded border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                    <label for="checkbox-item-{{ $stock->id }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                        {{ $stock->ukuran }} | 
                                                        Warna : {{ Str::ucfirst($stock->warna) }} | 
                                                        {{ $product->status === 'preorder' ? 'Preorder' : ($stock->jumlah < 100 ? $stock->jumlah : '+99') }} item | 
                                                        @if($product->status == 'promo') <s>@rupiah($stock->harga)</s> @rupiah($stock->harga - $stock->harga*($stock->diskon/100)) (-{{$stock->diskon}}%)  @else @rupiah($stock->harga) @endif
                                                        {{ $stock->keterangan ? "($stock->keterangan)" : '' }}
                                                    </label>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if ($product->product_prices()->where('jenis', 3)->sum('jumlah') > 0)
                                <span class="flex">
                                    Laki-laki (Anak-anak):
                                </span>
                                <div class="block">
                                    <button id="dropdownMaleKid" data-dropdown-toggle="dropdownMaleKidStock" data-dropdown-placement="bottom-start" class=" w-full justify-between border-2 focus:ring-2 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="button">-Pilih Ukuran- <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
                                </div>
                                <!-- Dropdown menu -->
                                <div id="dropdownMaleKidStock" class="z-10 w-[calc(100%-40px)] bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 hidden" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(310px, 70px);">
                                    <ul class="list-none ml-0 p-3 space-y-3 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMaleKid">
                                        @foreach ($product->product_prices->where('jenis', 3) as $stock)
                                            @if ($stock->jumlah > 0)
                                                <li>
                                                    <div class="flex items-center">
                                                    <input id="checkbox-item-{{ $stock->id }}" type="checkbox" value="{{ $stock->id }}" data-ukuran="{{ $stock->ukuran }}" data-warna="{{ $stock->warna }}" data-harga-produk="@if($product->status == 'promo') <s>@rupiah($stock->harga)</s> @rupiah($stock->harga - $stock->harga*($stock->diskon/100)) (-{{$stock->diskon}}%)  @else @rupiah($stock->harga) @endif" data-jenis="{{$stock->jenis}}" data-stok-produk="{{ $product->status === 'preorder' ? 2500 : $stock->jumlah }}" data-keterangan = "{{ $stock->keterangan ?? '' }}" class="MaleKid-checkbox w-4 h-4 text-green-600 bg-gray-100 rounded border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                    <label for="checkbox-item-{{ $stock->id }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                        {{ $stock->ukuran }} | Warna : {{ Str::ucfirst($stock->warna) }} | 
                                                        {{ $product->status === 'preorder' ? 'Preorder' : ($stock->jumlah < 100 ? $stock->jumlah : '+99') }} item | 
                                                        @if($product->status == 'promo') <s>@rupiah($stock->harga)</s> @rupiah($stock->harga - $stock->harga*($stock->diskon/100)) (-{{$stock->diskon}}%)  @else @rupiah($stock->harga) @endif
                                                        {{ $stock->keterangan ? "($stock->keterangan)" : '' }}
                                                    </label>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if ($product->product_prices()->where('jenis', 0)->sum('jumlah') > 0)
                                <span class="flex mb-2">
                                    Perempuan (Dewasa):
                                </span>
                                <div class="block">
                                    <button id="dropdownFemaleAdult" data-dropdown-toggle="dropdownFemaleAdultStock" data-dropdown-placement="bottom-start" class="w-full justify-between border-2 focus:ring-2 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="button">-Pilih Ukuran- <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
                                </div>
                                <!-- Dropdown menu -->
                                <div id="dropdownFemaleAdultStock" class="z-10 mx-5 w-[calc(100%-40px)] bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 hidden" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(310px, 70px);">
                                    <ul class="list-none ml-0 p-3 space-y-3 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownFemaleAdult">
                                        @foreach ($product->product_prices->where('jenis', 0) as $stock)
                                            @if ($stock->jumlah > 0)
                                                <li>
                                                    <div class="flex items-center">
                                                    <input id="checkbox-item-{{ $stock->id }}" type="checkbox" value="{{ $stock->id }}" data-ukuran="{{ $stock->ukuran }}" data-warna="{{ $stock->warna }}" data-harga-produk="@if($product->status == 'promo') <s>@rupiah($stock->harga)</s> @rupiah($stock->harga - $stock->harga*($stock->diskon/100)) (-{{$stock->diskon}}%)  @else @rupiah($stock->harga) @endif" data-jenis="{{$stock->jenis}}" data-stok-produk="{{ $product->status === 'preorder' ? 2500 : $stock->jumlah }}" data-keterangan = "{{ $stock->keterangan ?? '' }}" class="FemaleAdult-checkbox w-4 h-4 text-green-600 bg-gray-100 rounded border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                    <label for="checkbox-item-{{ $stock->id }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                        {{ $stock->ukuran }} | Warna : {{  Str::ucfirst($stock->warna) }} | 
                                                        {{ $product->status === 'preorder' ? 'Preorder' : ($stock->jumlah < 100 ? $stock->jumlah : '+99') }} item | 
                                                        @if($product->status == 'promo') <s>@rupiah($stock->harga)</s> @rupiah($stock->harga - $stock->harga*($stock->diskon/100)) (-{{$stock->diskon}}%)  @else @rupiah($stock->harga) @endif
                                                        {{ $stock->keterangan ? "($stock->keterangan)" : '' }}
                                                    </label>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if ($product->product_prices()->where('jenis', 2)->sum('jumlah') > 0)
                                <span class="flex">
                                    Perempuan (Anak-anak):
                                </span>
                                <div class="block">
                                    <button id="dropdownFemaleKid" data-dropdown-toggle="dropdownFemaleKidStock" data-dropdown-placement="bottom-start" class=" w-full justify-between border-2 focus:ring-2 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="button">-Pilih Ukuran- <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
                                </div>
                                <!-- Dropdown menu -->
                                <div id="dropdownFemaleKidStock" class="z-10 w-[calc(100%-40px)] bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 hidden" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(310px, 70px);">
                                    <ul class="list-none ml-0 p-3 space-y-3 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownFemaleKid">
                                        @foreach ($product->product_prices->where('jenis', 2) as $stock)
                                            @if ($stock->jumlah > 0)
                                                <li>
                                                    <div class="flex items-center">
                                                    <input id="checkbox-item-{{ $stock->id }}" type="checkbox" value="{{ $stock->id }}" data-ukuran="{{ $stock->ukuran }}" data-warna="{{ $stock->warna }}" data-harga-produk="@if($product->status == 'promo') <s>@rupiah($stock->harga)</s> @rupiah($stock->harga - $stock->harga*($stock->diskon/100)) (-{{$stock->diskon}}%)  @else @rupiah($stock->harga) @endif" data-jenis="{{$stock->jenis}}" data-stok-produk="{{ $product->status === 'preorder' ? 2500 : $stock->jumlah }}" data-keterangan = "{{ $stock->keterangan ?? '' }}" class="FemaleKid-checkbox w-4 h-4 text-green-600 bg-gray-100 rounded border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                    <label for="checkbox-item-{{ $stock->id }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                        {{ $stock->ukuran }} | Warna : {{ Str::ucfirst($stock->warna) }} | 
                                                        {{ $product->status === 'preorder' ? 'Preorder' : ($stock->jumlah < 100 ? $stock->jumlah : '+99') }} item | 
                                                        @if($product->status == 'promo') <s>@rupiah($stock->harga)</s> @rupiah($stock->harga - $stock->harga*($stock->diskon/100)) (-{{$stock->diskon}}%)  @else @rupiah($stock->harga) @endif
                                                        {{ $stock->keterangan ? "($stock->keterangan)" : '' }}
                                                    </label>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div id="container-pesan" class="mt-8 mb-16">
                        </div>
                        <div class="flex justify-end mt-6">
                            <x-public.button-primary buttonName="Pesan via Whatsapp" color="green" class="" type="submit"></x-public.button-primary>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
