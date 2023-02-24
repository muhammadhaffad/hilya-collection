<section id="dashboard" class="px-3 pt-8">
    <div class="container space-y-8">
        <div class="flex font-semibold">
            <span
                class="text-blue-600 bg-blue-50 rounded-lg px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                <i class="fad fa-th-large text-blue-600"></i>
                Dashboard
            </span>
        </div>
        <div class="grid grid-cols-1 gap-3 lg:grid-cols-3">
            <div class="p-6 relative overflow-hidden bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                <div class="absolute opacity-70 -left-8 top-1/3">
                    <i class="text-9xl fad fa-shopping-bag text-green-500"></i>
                </div>
                <div class="relative flex flex-col gap-2 items-baseline">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Jumlah semua produk</h5>
                </div>
                <p class="relative mb-3 font-bold text-3xl text-right text-gray-700 dark:text-gray-400"> {{ $totalStock }} </p>
                <a href="{{ route('admin.list.product') }}" class="relative inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Lihat produk
                    <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
            <div class="p-6 relative overflow-hidden bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                <div class="absolute opacity-70 -left-8 top-1/3">
                    <i class="text-9xl fad fa-tags text-red-500"></i>
                </div>
                <div class="relative flex flex-col gap-2 items-baseline">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Jumlah semua brand</h5>
                </div>
                <p class="relative mb-3 font-bold text-3xl text-right text-gray-700 dark:text-gray-400"> {{ $totalBrand }} </p>
                <a href="{{ route('admin.list.brand') }}" class="relative inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Lihat brand
                    <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
        </div>
    </div>
</section>