<div>
    <div {{ $attributes->merge(['class'=>'flex px-3 w-full lg:w-2/3 mx-auto']) }}>
        <button id="dropdown-button" data-dropdown-toggle="dropdown"
            {{ $button->attributes->merge(['class' => 'flex-shrink-0 z-10 text-sm lg:text-base inline-flex items-center py-2.5 px-4 font-medium text-center text-green-900 bg-green-100 border border-green-300 rounded-l-lg hover:bg-green-200 focus:ring-4 focus:outline-none focus:ring-green-100 dark:bg-slate-700 dark:hover:bg-slate-800 dark:focus:ring-slate-700 dark:text-white dark:border-slate-600']) }}
            type="button">{{ $button->attributes->get('buttonName') }} 
            <i class="{{ $button->attributes->get('buttonIcon') }}"></i>
        </button>
        <div id="dropdown"
            class="z-10 w-44 bg-white rounded divide-y divide-green-100 shadow dark:bg-slate-500 hidden"
            style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(5px, 72px);"
            data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom">
            <ul {{ $dropdownItem->attributes->merge(['class'=>'list-none ml-0 p-3 space-y-1 text-green-500 dark:text-green-200']) }}
                aria-labelledby="dropdownRadioBgHoverButton">
                {{ $dropdownItem }}
            </ul>
        </div>
        <div class="relative w-full">
            <input type="search" id="search-dropdown" name="search"
                class="block p-2.5 w-full z-20 text-sm lg:text-base text-green-900 bg-green-50 rounded-r-lg border-l-green-50 border-l-2 border border-green-300 focus:ring-green-300 focus:border-green-300 dark:bg-slate-600 dark:border-l-slate-600  dark:border-slate-600 dark:placeholder-slate-400 dark:text-white dark:focus:border-slate-700"
                placeholder="Cari kode produk atau brand" required="">
            <button type="submit"
                class="absolute top-0 right-0 p-2.5 lg:p-3 font-medium text-white bg-green-500 rounded-r-lg border border-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-500 dark:focus:ring-slate-800">
                <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <span class="sr-only">Search</span>
            </button>
        </div>
    </div>
</div>