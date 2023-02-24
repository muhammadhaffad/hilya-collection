<div class="py-4 px-2">
    <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
    @php
        $jenis = ['Gamis dewasa', 'Koko dewasa', 'Gamis anak', 'Koko anak'];
    @endphp
    <div class="flex gap-2">
        <div class="flex gap-3 w-full">
            <div class="h-28 aspect-square overflow-hidden rounded-lg">
                <img src="{{ asset('storage/'.$gambar->gambar) }}">
            </div>
            <div class="flex space-y-1 flex-col gap-1">
                @if ($cartItem->product_price->product->status === 'promo')
                    <span
                        class="flex items-center gap-1 w-min bg-red-500 h-min text-white text-xs font-semibold px-2.5 py-1 rounded dark:bg-red-200 dark:text-red-900">
                        <i class="fad fa-fire text-white"></i>
                        PROMO
                    </span>
                @elseif($cartItem->product_price->product->status === 'preorder')
                    <span
                        class="flex items-center gap-1 w-min bg-green-400 h-min text-white text-xs font-semibold px-2.5 py-1 rounded dark:bg-green-200 dark:text-green-800">
                        <i class="fad fa-fire text-white"></i>
                        Preorder
                    </span>
                @endif
                <span
                    class="flex items-center gap-1 w-min bg-blue-500 h-min text-white text-xs font-semibold px-2.5 py-1 rounded dark:bg-red-200 dark:text-red-900">
                    <i class="fad fa-tag text-white"></i>
                    {{ $cartItem->product_price->product->product_brand->nama }}
                </span>
                <span class="text-lg leading-none font-semibold">
                    {{ $cartItem->product_price->product->nama }}
                </span>
                <span class="text-xs font-semibold">{{ $cartItem->product_price->product->berat }}gr</span>
            </div>
        </div>
        <div class="flex ml-3 space-y-1 flex-col w-full">
            <span class="text-lg font-semibold">@rupiah($cartItem->product_price->harga)</span>
            <span class="text-sm text-green-500 font-semibold">{{ $jenis[$cartItem->product_price->jenis] }}</span>
            <span class="bg-white font-semibold rounded-lg p-1.5 w-min h-[32px] text-center aspect-square text-xs border-2">
                {{ $cartItem->product_price->ukuran }}
            </span>
        </div>
        <div class="flex flex-col w-full">
            <span class="text-sm">Total:</span>
            <span class="text-xl font-semibold text-green-500">@rupiah($cartItem->product_price->harga * $cartItem->jumlahpesan)</span>
            <div class="flex justify-between mt-auto">
                <button type="button" wire:click="$emit('selectDeleteItem', {{$cartItem->id}})" class="my-auto text-sm text-red-500">
                    <i class="fas fa-trash-alt"></i>
                    Hapus
                </button>
                <div class="flex">
                    <x-public.button-primary type="button" class="h-8 w-8 px-1 py-1 rounded-none rounded-l-lg" color="green" buttonName="-" wire:click.prevent="decrement({{$cartItem->id}})"></x-public.button-primary>
                    <input type="number" max="999" name="stok[][jumlah]" value="{{ $cartItem->jumlahpesan }}" class="block text-center w-12 h-8 text-gray-900 bg-gray-50 border-white sm:text-xs dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">                                  
                    <x-public.button-primary type="button" class="h-8 w-8 px-1 py-1 rounded-none rounded-r-lg" color="green" buttonName="+" wire:click.prevent="increment({{$cartItem->id}})"></x-public.button-primary>
                </div>
            </div>
        </div>
    </div>
</div>
