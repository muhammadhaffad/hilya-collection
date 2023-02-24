<aside id="sidebar"
    class="w-64 overflow-y-auto h-screen transition ease-in lg:transform-none py-4 px-3 bg-gray-50 dark:bg-gray-800 fixed min-h-screen top-0 left-0 z-[40]"
    tabindex="-1" aria-labelledby="drawer-label">
    <div class="flex justify-between items-center pl-2 mb-5">
        <div class="mx-auto">
            <a href="{{ url('/') }}">
                <img src="{{ asset('storage/logo.png') }}" class="w-24" alt="">
            </a>
            <h5 class="text-base font-semibold text-gray-500 uppercase lg:hidden dark:text-gray-400">Menu</h5>
        </div>
        <button type="button" data-drawer-dismiss="sidebar" aria-controls="sidebar"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex items-center lg:hidden dark:hover:bg-gray-600 dark:hover:text-white">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Close menu</span>
        </button>
    </div>
    <ul class="space-y-2 list-none ml-0">
        <li>
            <a href="{{route('admin.dashboard')}}"
                class="flex items-center p-2 font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <i class="fad fa-th-large text-blue-500"></i>
                <span class="ml-3">Dashboard</span>
            </a>
        </li>
        <li>
            <button type="button"
                class="flex items-center p-2 w-full font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                <i class="fad fa-shopping-bag text-green-500"></i>
                <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Produk</span>
                <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <ul id="dropdown-example" class="hidden py-2 space-y-2 list-none ml-0">
                <li>
                    <a href="{{route('admin.add.product')}}"
                        class="flex items-center p-2 pl-11 w-full font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Tambah
                        produk</a>
                </li>
                <li>
                    <a href="{{route('admin.list.product')}}"
                        class="flex items-center p-2 pl-11 w-full font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Daftar
                        produk</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{route('admin.list.brand')}}"
                class="flex items-center p-2 font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <i class="fad fa-tags text-red-500"></i>
                <span class="flex-1 ml-3 whitespace-nowrap">Brand</span>
            </a>
        </li>
    </ul>
    <ul class="list-none ml-0 pt-4 mt-4 space-y-2 border-t border-gray-200 dark:border-gray-700">
        <li>
            <a href="{{route('admin.settings')}}"
                class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                <i class="fad fa-cogs text-slate-600"></i>
                <span class="ml-4">Pengaturan</span>
            </a>
        </li>
        <li>
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button
                    class="w-full flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                    <i class="fad fa-sign-out text-red-600"></i>
                    <span class="ml-4 text-red-600">Sign out</span>
                </button>
            </form>
        </li>
    </ul>
</aside>
