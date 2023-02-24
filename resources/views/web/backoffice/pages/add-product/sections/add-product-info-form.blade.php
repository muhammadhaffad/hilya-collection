<div class="space-y-4 lg:space-y-0 lg:grid lg:grid-cols-2 lg:gap-4">
    <div class="space-y-4 @error('nama') invalid @enderror">
        <label for="nama-produk" class="block">
            Nama / Kode produk<span class="text-red-500">*</span>
        </label>
        <input name="nama" type="text" id="nama-produk"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Isi nama produk..." value="{{ old('nama') }}">
        <p class="mt-2 text-sm hidden">
            @error('nama')
                {{ $message }}
            @enderror
        </p>
    </div>
    <div class="space-y-4 @error('product_brand_id') invalid @enderror">
        <label for="brand-produk" class="block">Brand<span class="text-red-500">*</span></label>
        <select name="product_brand_id" id="brand-produk"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @foreach ($brands as $brand)
                <option value="{{ $brand->id }}" @selected(old('product_brand_id') == $brand->id)>{{ $brand->nama }}
                </option>
            @endforeach
        </select>
        <p class="mt-2 text-sm hidden">
            @error('product_brand_id')
                {{ $message }}
            @enderror
        </p>
    </div>
    <div class="space-y-4 @error('status') invalid @enderror">
        <label for="kategori-produk" class="block">
            Status produk<span class="text-red-500">*</span><span class="text-xs text-blue-600">(Normal/Promo/Preorder)</span>
        </label>
        <select name="status" id="kategori-produk"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @foreach ($status as $type)
                @if (old('status'))
                    <option value="{{ $type }}" @selected(old('status') == $type)>
                        {{ ucfirst($type) }}
                    </option>
                @endif
                <option value="{{ $type }}" @selected('normal' == $type)>
                    {{ ucfirst($type) }}
                </option>
            @endforeach
        </select>
        <p class="mt-2 hidden">
            @error('status')
                {{ $message }}
            @enderror
        </p>
    </div>
    <div class="space-y-4 @error('diskon') invalid @enderror">
        <label for="kategori-produk" class="block">
            Diskon %<span class="text-xs text-blue-600">(Diisi jika produk promo)</span>
        </label>
        <input id="kategori-produk" type="number" name="diskon"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

        <p class="mt-2 hidden">
            @error('diskon')
                {{ $message }}
            @enderror
        </p>
    </div>
</div>
