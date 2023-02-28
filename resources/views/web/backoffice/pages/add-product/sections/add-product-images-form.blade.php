<div class="space-y-4 @error('gambar') invalid @enderror">
    <label for="desc" class="block">Gambar produk<span class="text-red-500">*</span></label>
    <div id="image-upload-container" class="grid grid-cols-2 gap-3 lg:grid-cols-5">
        @for ($i = 0; $i < 10; $i++)
            <div
                class="image aspect-square relative rounded-lg bg-slate-200 border-dashed border-4 border-blue-300 overflow-hidden">
                <input type="file" name="gambar[{{ $i }}]" class="image-upload"
                    hidden>
                <img class="image-view aspect-square" src="">
                <div class="absolute top-0 right-0 bottom-0 left-0 bg-white opacity-50"></div>
                <button
                    class="flex upload-button absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                    <i
                        class="fa fa-plus-circle text-2xl text-blue-500 bg-blue-100 p-2 rounded-lg"></i>
                </button>
                <button
                    class="hidden remove-button absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                    <span
                        class="fa fa-trash-alt text-2xl text-red-500 bg-red-100 p-2 rounded-lg"></span>
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