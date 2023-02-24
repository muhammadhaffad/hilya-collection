<header class="fixed w-full z-40 border-b bg-white">
    <div class="container lg:min-w-full">
        <div class="flex flex-wrap justify-between items-center relative h-16">
            <button id="show" 
                data-drawer-target="sidebar"
                data-drawer-show="sidebar" 
                aria-controls="sidebar"
                class="lg:hidden text-green-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3.5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                type="button">
                <i class="fad fa-arrow-alt-from-left"></i>
            </button>
            <a href="/" class="font-bold text-lg text-green-600">
                <span class="text-xl font-semibold text-green-500 whitespace-nowrap dark:text-white">
                    <i class="fad fa-store"></i> Hilya Collection
                </span>
            </a>
            <button id="humberger"
                class="text-green-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3.5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                type="button">
                <i class="fad fa-bars"></i>
            </button>

            <!-- Dropdown menu -->
            <div 
                id="nav-menu"
                class="hidden absolute mt-1 z-10 right-0 w-44 top-full bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                <div class="py-3 px-4 text-sm text-gray-900 dark:text-white">
                    <div>Selamat datang</div>
                    <div class="font-medium truncate">{{ '@'.auth()->user()->username }}</div>
                </div>
                <ul class="list-none ml-0 py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownInformationButton">
                    <li>
                        <a href="{{route('admin.dashboard')}}"
                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                    </li>
                    <li>
                        <a href="{{route('admin.settings')}}"
                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                    </li>
                </ul>
                <div class="py-1">
                    <form method="POST" action="{{route('logout')}}">
                        @csrf
                        <button
                            class="w-full flex text-red-500 py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                            out</button>

                    </form>
                </div>
            </div>
            {{-- <button id="humberger" class="font-bold button button-light">
                <i class="fad fa-bars text-green-600"></i>
            </button>
            <nav id="nav-menu"
                class="hidden absolute bg-white mt-1 py-3 right-3 top-full max-w-[200px] w-full rounded-lg shadow-lg">
                <ul class="block">
                    <li class="group">
                        <span class="text-sm flex py-1 mx-5">Hai, {{ auth()->user()->username}}</span>
                    </li>
                    <hr>
                    <li class="group">
                        <a href="{{route('admin.settings')}}" class="text-sm flex py-1 mx-5 group-hover:text-blue-500">Pengaturan</a>
                    </li>
                    <li class="group">
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <input type="submit" class="text-sm flex py-1 mx-5 cursor-pointer group-hover:text-blue-500" value="Logout">
                        </form>
                    </li>
                    <li class="group">
                        <a href="#about" class="text-sm flex py-1 mx-5 group-hover:text-blue-500">Kontak</a>
                    </li>
                    <li class="group">
                        <a href="{{ request()->is('detail/*') ? route('home.index').'#brand' : '#brand' }}" class="text-sm flex py-1 mx-5 group-hover:text-blue-500">Brand</a>
                    </li>
                    @auth
                    <li class="group">
                        <a href="{{route('admin.dashboard')}}" class="text-sm flex py-1 mx-5 group-hover:text-blue-500">Dashboard</a>
                    </li>
                    @else
                    <li class="group">
                        <a href="{{route('login')}}" class="text-sm flex py-1 mx-5 group-hover:text-blue-500">Login</a>
                    </li>
                    @endauth
                </ul>
            </nav> --}}
        </div>
    </div>
</header>

<script>
    const humberger = document.querySelector('#humberger');
    const navMenu = document.querySelector('#nav-menu');

    humberger.addEventListener('click', function() {
        navMenu.classList.toggle('hidden');
    });
</script>
