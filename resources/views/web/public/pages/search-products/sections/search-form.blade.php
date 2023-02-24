<section id="search-form" class="">
    <div class="container">
        <form method="get" action="{{ route('home.search-products') }}">
            <div class="flex px-3 w-full lg:w-2/3 mx-auto">
                <button id="dropdown-button" data-dropdown-toggle="dropdown"
                    class="flex-shrink-0 z-10 text-sm lg:text-base inline-flex items-center py-2.5 px-4 font-medium text-center text-green-900 bg-green-100 border border-green-300 rounded-l-lg hover:bg-green-200 focus:ring-4 focus:outline-none focus:ring-green-100 dark:bg-green-500 dark:hover:bg-green-600 dark:focus:ring-green-500 dark:text-white dark:border-green-600"
                    type="button">Semua produk 
                    <svg aria-hidden="true" class="ml-1 w-4 h-4" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd">
                        </path>
                    </svg>
                </button>
                <div id="dropdown"
                    class="z-10 w-44 bg-white rounded divide-y divide-green-100 shadow dark:bg-green-500 hidden"
                    style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(5px, 72px);"
                    data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom">
                    <ul class="list-none ml-0 p-3 space-y-1 text-green-500 dark:text-green-200"
                        aria-labelledby="dropdownRadioBgHoverButton">
                        <li class="list-none">
                            <div class="flex items-center p-2 rounded hover:bg-green-100 dark:hover:bg-green-600">
                                <input checked id="category-4" type="radio" value="all" name="category"
                                    class="w-4 h-4 text-green-600 bg-green-100 border-green-300 focus:ring-green-300 dark:focus:ring-green-600 dark:ring-offset-green-500 focus:ring-2 dark:bg-green-600 dark:border-green-300" onclick="getElementById('dropdown-button').childNodes[0].textContent = 'Semua produk';">
                                <label for="category-4"
                                    class="ml-2 w-full text-sm lg:text-base font-medium text-green-900 rounded dark:text-green-300">Semua produk</label>
                            </div>
                        </li>
                        <li class="list-none">
                            <div class="flex items-center p-2 rounded hover:bg-green-100 dark:hover:bg-green-600">
                                <input id="category-5" type="radio" value="promo" name="category"
                                    class="w-4 h-4 text-green-600 bg-green-100 border-green-300 focus:ring-green-300 dark:focus:ring-green-600 dark:ring-offset-green-500 focus:ring-2 dark:bg-green-600 dark:border-green-300" onclick="getElementById('dropdown-button').childNodes[0].textContent = 'Promo';">
                                <label for="category-5"
                                    class="ml-2 w-full text-sm lg:text-base font-medium text-green-900 rounded dark:text-green-300">Promo</label>
                            </div>
                        </li>
                        <li class="list-none">
                            <div class="flex items-center p-2 rounded hover:bg-green-100 dark:hover:bg-green-600">
                                <input id="category-6" type="radio" value="preorder" name="category"
                                    class="w-4 h-4 text-green-600 bg-green-100 border-green-300 focus:ring-green-300 dark:focus:ring-green-600 dark:ring-offset-green-500 focus:ring-2 dark:bg-green-600 dark:border-green-300" onclick="getElementById('dropdown-button').childNodes[0].textContent = 'Preorder';">
                                <label for="category-6"
                                    class="ml-2 w-full text-sm lg:text-base font-medium text-green-900 rounded dark:text-green-300">Preorder</label>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="relative w-full">
                    <input type="search" id="search-dropdown" name="search"
                        class="block p-2.5 w-full z-20 text-sm lg:text-base text-green-900 bg-green-50 rounded-r-lg border-l-green-50 border-l-2 border border-green-300 focus:ring-green-300 focus:border-green-300 dark:bg-green-500 dark:border-l-green-500  dark:border-green-600 dark:placeholder-green-400 dark:text-white dark:focus:border-green-300"
                        placeholder="Cari kode produk atau brand" required="">
                    <button type="submit"
                        class="absolute top-0 right-0 p-2.5 lg:p-3 font-medium text-white bg-green-500 rounded-r-lg border border-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-500 dark:focus:ring-green-800">
                        <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>
