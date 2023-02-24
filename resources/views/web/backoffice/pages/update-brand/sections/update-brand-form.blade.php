<section id="list-products" class="px-3 pt-8">
    <div class="container space-y-4">
        <div class="flex font-semibold">
            <span
                class="text-red-500 bg-red-50 rounded-lg px-5 py-2.5 dark:bg-red-500 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                <i class="fad fa-tag text-red-500"></i>
                {{ $brand->nama }}
            </span>
        </div>
        <div class="border rounded-lg mb-4 lg:w-1/2">
            <form action="{{ route('admin.update.brand', ['brand' => $brand->slug]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="p-4 font-medium text-gray-900 grid grid-cols-1 gap-3">
                    <div class="space-y-2">
                        <label for="logo-brand" class="block">Logo brand</label>
                        <input name="image" type="file" id="logo-brand" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    </div>
                    <div class="space-y-2">
                        <label for="logo-brand" class="block">Nama brand</label>
                        <input name="nama" type="text" id="nama-brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Isi nama brand..." value="{{$brand->nama}}">
                    </div>
                </div>
                <button class="flex items-center gap-1 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-auto mr-4 mb-4">
                    <i class="fad fa-save"></i>
                    Simpan
                </button>
            </form>
        </div>
    </div>
</section>