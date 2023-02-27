<div class="space-y-4 @error('stock') invalid @enderror">
    <label for="stok-produk" class="w-full">
        Stok produk<span class="text-red-500">*</span>
    </label>
    <button id="add-stock-male-button" type="button"
        class="flex items-center justify-between text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
        Tambah Stok
    </button>
    <p class="text-sm hidden">
        @error('stock')
            {{ $message }}
        @enderror
    </p>
    <div class="block space-y-2">
        <div id="forms-input-stock-male">
            <div id="total-old-input-stock" class="hidden">
                {{ sizeof(old('stock', $product->product_prices)) }}
            </div>
            @php
                $index = 0;
            @endphp
            @foreach (old('stock') ?: $product->product_prices as $productPrice)
                <div class="flex stocks-input space-x-2">
                    <div class="space-y-2">
                        <input hidden type="text" name="stock[{{ $index }}][id]" value="{{ @$productPrice['id'] ?: @$productPrice->id }}">
                        <label for="gender-{{ $index }}"
                            class="block text-sm font-medium text-gray-900 dark:text-gray-300">
                            Untuk
                        </label>
                        <select type="text" name="stock[{{ $index }}][jenis]" id="gender-{{ $index }}"
                            class="block p-2 w-40 text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="1" @selected((@$productPrice['jenis'] ?: @$productPrice->jenis) == 1)>LAKI LAKI (DEWASA)</option>
                            <option value="3" @selected((@$productPrice['jenis'] ?: @$productPrice->jenis) == 3)>LAKI LAKI (ANAK)</option>
                            <option value="0" @selected((@$productPrice['jenis'] ?: @$productPrice->jenis) == 0)>PEREMPUAN (DEWASA)</option>
                            <option value="2" @selected((@$productPrice['jenis'] ?: @$productPrice->jenis) == 2)>PEREMPUAN (ANAK)</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label for="size-{{ $index }}" class="block text-sm font-medium text-gray-900 dark:text-gray-300">
                            Ukuran
                        </label>
                        @php
                            $sizes = ['XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL', '4XL', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18'];                            
                        @endphp
                        <select type="text" name="stock[{{ $index }}][ukuran]" id="size-{{ $index }}"
                            class="block p-2 w-14 text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($sizes as $size)
                                <option value="{{ $size }}" @selected((@$productPrice['ukuran'] ?: @$productPrice->ukuran) == $size)>{{ $size }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label for="warna-{{ $index }}"
                            class="block text-sm font-medium text-gray-900 dark:text-gray-300">Warna</label>
                        <select type="text" id="warna-{{ $index }}" name="stock[{{ $index }}][warna]"
                            class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            onmousedown="selectWarna(this)">
                                <option value="{{ @$productPrice['warna'] ?: @$productPrice->color_id }}" selected>
                                    {{ @$productPrice['warna'] ? App\Models\Color::find($productPrice['warna'])->warna : @$productPrice->color?->warna }}
                                </option>    
                        </select>
                        <span class="text-xs">
                            <button type="button" class="cursor-pointer underline" onclick="toggleColorInput(this)">
                                Tambah warna
                            </button>, jika tidak ada.</span>
                        <div class="hidden">
                            <div class="w-full space-x-2 flex">
                                <input type="text" value=""
                                    class="block p-2 text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <button class="px-4 rounded-lg border" type="button"
                                    onclick="addColor(this)">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="price-{{ $index }}"
                            class="block text-sm font-medium text-gray-900 dark:text-gray-300">Harga</label>
                        <input id="price-{{ $index }}" name="stock[{{ $index }}][harga]" type="number"
                            value="{{(@$productPrice['harga'] ?: @$productPrice->harga) ?? ''}}"
                            class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <span class="text-xs">
                            <button type="button" class="cursor-pointer underline" onclick="toggleKeterangan(this)">
                                Berikan keterangan
                            </button>
                        </span>
                        <div class="{{(@$productPrice['keterangan'] ?: @$productPrice->keterangan) ? 'block' : 'hidden'}}">
                            <div class="w-full space-x-2 flex">
                                <input type="text" name="stock[{{ $index }}][keterangan]" placeholder="contoh: Tidak termasuk hijab" value="{{(@$productPrice['keterangan'] ?: @$productPrice->keterangan) ?? ''}}"
                                    class="block p-2 text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="qty-{{ $index }}"
                            class="block text-sm font-medium text-gray-900 dark:text-gray-300">Jumlah</label>
                        <input id="qty-{{ $index }}" name="stock[{{ $index }}][jumlah]" type="number"
                            value="{{(@$productPrice['jumlah'] ?: @$productPrice->jumlah) ?? ''}}"
                            class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <button type="button" class="underline text-xs" onclick="removeForm(this)">
                        ❌ Hapus
                    </button>
                </div>
                @php
                    $index ++;
                @endphp
            @endforeach
        </div>
    </div>
</div>
<script>
    let id = parseInt(document.getElementById('total-old-input-stock').innerHTML);
    function generateFormInputStock(id, gender) {
        return `
        <div class="flex stocks-input my-4 space-x-2">
            <div class="space-y-2">
                <input hidden type="text" name="stock[${id}][id]" value="0">
                <label for="gender-${id}"
                    class="block text-sm font-medium text-gray-900 dark:text-gray-300">
                    Untuk
                </label>
                <select type="text" name="stock[${id}][jenis]" id="gender-${id}"
                    class="block p-2 w-40 text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="1">LAKI LAKI (DEWASA)</option>
                    <option value="3">LAKI LAKI (ANAK)</option>
                    <option value="0">PEREMPUAN (DEWASA)</option>
                    <option value="2">PEREMPUAN (ANAK)</option>
                </select>
            </div>
            <div class="space-y-2">
            <label for="size-${id}"
                class="block text-sm font-medium text-gray-900 dark:text-gray-300">
                Ukuran
            </label>
            <select type="text" name="stock[${id}][ukuran]" id="size-${id}"
                class="block p-2 w-14 text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="XS">XS</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XXL">XXL</option>
                <option value="XXXL">XXXL</option>
                <option value="4XL">4XL</option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
            </select>
            </div>
            <div class="space-y-2">
                <label for="warna-${id}"
                    class="block text-sm font-medium text-gray-900 dark:text-gray-300">Warna</label>
                <select type="text" id="warna-${id}" name="stock[${id}][warna]"
                    class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    onmousedown="selectWarna(this)">
                </select>
                <span class="text-xs">
                    <button type="button" class="cursor-pointer underline" onclick="toggleColorInput(this)">
                        Tambah warna
                    </button>, jika tidak ada.
                </span>
                <div class="hidden">
                    <div class="w-full space-x-2 flex">
                        <input type="text" value=""
                            class="block p-2 text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <button class="px-4 rounded-lg border" type="button" onclick="addColor(this)">+</button>
                    </div>
                </div>
            </div>
            <div class="space-y-2">
                <label for="price-${id}"
                    class="block text-sm font-medium text-gray-900 dark:text-gray-300">Harga</label>
                <input id="price-${id}" name="stock[${id}][harga]" type="number"
                    class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <span class="text-xs">
                    <button type="button" class="cursor-pointer underline" onclick="toggleKeterangan(this)">
                        Berikan keterangan
                    </button>
                </span>
                <div class="hidden">
                    <div class="w-full space-x-2 flex">
                        <input type="text" name="stock[${id}][keterangan]" placeholder="contoh: Tidak termasuk hijab" value=""
                            class="block p-2 text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                </div>
            </div>
            <div class="space-y-2">
                <label for="qty-${id}"
                    class="block text-sm font-medium text-gray-900 dark:text-gray-300">Jumlah</label>
                <input id="qty-${id}" name="stock[${id}][jumlah]" type="number"
                    class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <button type="button" class="underline text-xs" onclick="removeForm(this)">
                ❌ Hapus
            </button>
        </div>`;
    }

    function toggleColorInput(element) {
        element.parentNode.nextElementSibling.classList.toggle('hidden');;
    }

    function toggleKeterangan(element) {
        element.parentNode.nextElementSibling.classList.toggle('hidden');;
    }

    function addColor(element) {
        let warna = element.previousElementSibling.value;
        fetch(`../../add/color?warna=${warna}`)
            .then(response => response.text())
            .then(function(data) {
                alert(data);
                element.previousElementSibling.value = '';
                console.info(element.parentNode.previousSibling.parentNode.classList.toggle('hidden'));
            });
    }

    function removeForm(element) {
        if (confirm('Apakah Anda yakin menghapus stok ini?'))
            element.parentNode.remove();
    }

    function selectWarna(element) {
        fetch('../../colors')
            .then(response => response.text())
            .then(function(data) {
                let selectInput = element;
                let colors = JSON.parse(data);
                selectInput.innerHTML = '';
                colors.forEach(color => {
                    selectInput.innerHTML +=
                        `<option value="${color.id}">${color.warna}</option>`
                });
            });
    }
    let addStockMaleButton = document.getElementById('add-stock-male-button');
    addStockMaleButton.addEventListener('click', function(event) {
        // gender : 1 (male)
        document.getElementById('forms-input-stock-male').insertAdjacentHTML('beforeend',
            generateFormInputStock(id, 1));
        id++;
    })
</script>