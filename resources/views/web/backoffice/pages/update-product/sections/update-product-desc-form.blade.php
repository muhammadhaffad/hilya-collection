<div class="space-y-4 @error('deskripsi') invalid @enderror">
    <label for="desc" class="block">Deskirpsi Produk<span
        class="text-red-500">*</span></label>
    <p class="mt-2 text-sm lg:w-full hidden">
        @error('deskripsi') {{ $message }} @enderror
    </p>
    <input name="deskripsi" id="desc" type="hidden" value="{{ old('deskripsi', $product->deskripsi) }}">
    <trix-editor input="desc" class="h-52"></trix-editor>
</div>