<div class="space-y-4 @error('gambar') invalid @enderror">
    <label for="desc" class="block">Gambar produk<span class="text-red-500">*</span></label>
    <div id="image-upload-container" class="grid grid-cols-2 gap-3 mb-2 lg:grid-cols-4">
        @for ($i = 0; $i < 4; $i++)
            <div
                class="image aspect-square relative rounded-lg bg-slate-200 border-dashed border-4 border-blue-300 overflow-hidden">
                <input type="text" name="remove[{{ $i }}]" hidden class="image-remove">
                <input type="file" name="gambar[{{ $i }}]" class="image-upload" hidden>
                <img class="image-view aspect-square"
                    src="@isset($product->product_images[$i]->gambar) {{ asset('storage/' . $product->product_images[$i]->gambar) }} @endisset">
                <div class="absolute top-0 right-0 bottom-0 left-0 bg-white opacity-50"></div>
                <button
                    class="@if (isset($product->product_images[$i]->gambar)) {{ 'hidden' }}@else{{ 'flex' }} @endif flex upload-button absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                    <i class="fad fa-plus-circle text-2xl text-blue-500 bg-blue-100 p-2 rounded-lg"></i>
                </button>
                <button
                    class="@if (isset($product->product_images[$i]->gambar)) {{ 'flex' }}@else{{ 'hidden' }} @endif remove-button absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                    <span class="fad fa-trash-alt text-2xl text-red-500 bg-red-100 p-2 rounded-lg"></span>
                </button>
            </div>
        @endfor
    </div>
    <p class="mt-2 text-sm lg:w-full hidden">
        @error('gambar')
            {{ $message }}
        @enderror
    </p>
</div>
