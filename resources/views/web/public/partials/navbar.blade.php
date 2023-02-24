<header class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 dark:bg-slate-800">
    <div class="container">
        <div class="flex items-center justify-between relative px-3 h-16 z-10">
            <a href="{{ url('') }}">
                <img src="{{ asset('storage/logo.png') }}" class="w-20" alt="">
            </a>
            {{-- <x-public.navbar-title 
                link="{{route('home.index')}}" 
                icon="fad fa-store" 
                title="Hilya Collection">
            </x-public.navbar-title> --}}
            <x-public.navbar-menu>
                <x-slot:dropdownButton>
                </x-slot:dropdownButton>
                <x-slot:topMenu>
                    Selamat Datang
                </x-slot:topMenu>
                <x-slot:middleMenu>
                    <x-public.navbar-menu-li 
                        link="{{ request()->is('/') ? '#' : route('home.index') . '#' }}" 
                        :isActive="request()->is('/')"
                        menuName="Beranda">
                    </x-public.navbar-menu-li>
                    <x-public.navbar-menu-li
                        link="{{ request()->is('auth/login') ? route('home.index') . '#about' : '#about' }}" 
                        menuName="Kontak">
                    </x-public.navbar-menu-li>
                    <x-public.navbar-menu-li 
                        link="{{ request()->is('detail/*') ? '#brand' : route('home.index') . '#brand' }}"
                        :isActive="request()->is('detail/*') || request()->is('brand/*')" 
                        menuName="Brand">
                    </x-public.navbar-menu-li>
                </x-slot:middleMenu>
                <x-slot:bottomMenu>
                    @auth
                        <x-public.navbar-menu-li
                            link="{{ route('admin.dashboard') }}" 
                            menuName="Dashboard">
                        </x-public.navbar-menu-li>
                    @else
                        <x-public.navbar-menu-li
                            link="{{ route('login') }}" 
                            :isActive="request()->is('auth/login')"
                            menuName="Login">
                        </x-public.navbar-menu-li>
                    @endauth
                </x-slot:bottomMenu>
            </x-public.navbar-menu>
        </div>
    </div>
</header>
<hr class="dark:border-slate-700">