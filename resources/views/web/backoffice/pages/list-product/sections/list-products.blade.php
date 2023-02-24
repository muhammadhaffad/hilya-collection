<section id="list-products" class="px-3">
    <div class="container">
        <span class="flex font-bold text-lg mb-1">
            Produk
        </span>
        <div class="flex">
            <a href=" {{route('admin.add.product')}} " class="text-sm button button-primary"><i class="fad fa-plus-circle"></i> Tambah Produk</a>
        </div>
        <div class="relative flex py-3 group lg:ml-auto lg:max-w-xs lg:h-16">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none group-hover:text-blue-700">
                <i class="fad fa-search"></i>
            </div>
            <form action="" method="get" class="w-full">
                <input type="text" id="search-product" name="s" class="form-control" style="padding-left: 40px;" placeholder="Cari kode produk atau brand">
            </form>
        </div>
        @if (session('success'))
        <div id="alert-3" class="flex p-4 mb-4 bg-green-100 rounded-lg dark:bg-green-200 ml-auto w-1/2" role="alert">
            <svg class="flex-shrink-0 w-5 h-5 text-green-700 dark:text-green-800" fill="currentColor"
                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <div class="ml-3 text-sm font-medium text-green-700 dark:text-green-800">
                {{ session('success') }}
            </div>
            <button type="button"
                class="close-button ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-green-200 dark:text-green-600 dark:hover:bg-green-300"
                data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        @endif
        @if (session('fail'))
            <div id="alert-2" class="flex p-4 mb-4 bg-red-100 rounded-lg dark:bg-red-200 ml-auto w-1/2" role="alert">
                <svg class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-800" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <div class="ml-3 text-sm font-medium text-red-700 dark:text-red-800">
                    {{session('fail')}}
                </div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-red-200 dark:text-red-600 dark:hover:bg-red-300"
                    data-dismiss-target="#alert-2" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        @endif
        <div class="mt-3 grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-5">
            @foreach ($products as $prod)
            <div class="w-full border-[1px] group rounded-lg shadow-lg">
                <div class="relative hover:scale-105 aspect-[1/1] rounded-lg bg-slate-300 overflow-hidden">
                    @if ($prod->images->first()->gambar)
                        <img src="{{ asset( 'storage/'. $prod->images->first()->gambar) }}" class="object-cover aspect-square">
                    @else
                        <img src="https://source.unsplash.com/600x600" alt="">
                    @endif
                </div>
                <div class="px-3 py-2">
                    @if ($prod->type_id == '2')
                        <span class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">PRE-ORDER</span>
                    @endif
                    @if ($prod->type_id == '1')
                        <span class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">PROMO</span>
                    @endif
                    <h1 class="pt-1 block overflow-hidden overflow-ellipsis">
                        ({{ $prod->brand->nama }}) {{ $prod->nama }} 
                    </h1>
                    <p class="block overflow-hidden overflow-ellipsis font-bold text-green-600">
                        @if ($prod->stocks->min('harga') == $prod->stocks->max('harga'))
                            {{ $prod->stocks->min('harga') }}
                        @else
                            {{ $prod->stocks->min('harga') }} - {{ $prod->stocks->max('harga') }}
                        @endif
                    </p>
                    <span class="block text-xs my-2">
                        <u>Stock</u> 
                    </span>
                    <div class="grid grid-cols-4 lg:grid-cols-6 gap-1 mb-1">
                        @foreach ($prod->stocks as $stok)
                        <div class="block">
                            <div class="flex rounded-full text-xs justify-center items-center border-[1px] bg-slate-200 aspect-square">
                                {{$stok->ukuran}}
                            </div>
                            <span class="block text-center text-xs">
                                {{$stok->jumlah}}
                            </span>
                        </div>
                        @endforeach
                    </div>
                    <hr class="my-2">
                    <div class="flex flex-wrap justify-end gap-2">
                        <a href="{{ route('admin.update.product', ['product'=>$prod->slug]) }}">
                            <i class="p-2 border-[1px] rounded-md fad fa-edit button button-success"></i>
                        </a>
                        <form action="{{ route('admin.delete.product', ['product'=>$prod->slug]) }}" method="post">
                            @csrf
                            <button class="trash-button" type="button">
                                <i class="p-2 border-[1px] rounded-md fad fa-trash-alt button button-danger"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <hr class="my-6">
        {{ $products->links() }}
        <div class="mb-6"></div>
    </div>
</section>