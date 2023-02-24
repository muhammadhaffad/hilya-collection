@props([
    'dropdownButton',
    'topMenu',
    'middleMenu',
    'bottomMenu'
    ])
<div>
    <button id="humberger"
        {{ $dropdownButton->attributes->merge(['class' => 'lg:hidden text-green-500 bg-white border border-slate-300 focus:outline-none hover:bg-slate-100 focus:ring-4 focus:ring-slate-200 font-medium rounded-lg text-sm px-3.5 py-2.5 dark:bg-slate-800 dark:text-green-400 dark:border-green-500 dark:hover:bg-slate-700 dark:hover:border-slate-600 dark:focus:ring-slate-700']) }}
        class=""
        type="button">
        <i class="fad fa-bars"></i>{{ $dropdownButton }}
    </button>

    <!-- Dropdown menu -->
    <div id="nav-menu"
        {{ $attributes->merge(['class' => 'hidden lg:flex lg:justify-end lg:static lg:w-max lg:ml-auto lg:mr-0 lg:shadow-none lg:divide-opacity-0 lg:mt-0 absolute mt-4 z-10 right-0 w-44 top-full bg-white rounded divide-y divide-slate-100 shadow dark:bg-slate-700 dark:lg:bg-slate-800 dark:divide-slate-600 dark:lg:divide-opacity-0']) }}>
        <div {{ $topMenu->attributes->merge(['class' => 'lg:hidden py-3 px-4 text-sm text-slate-900 dark:text-white']) }}>
            {{ $topMenu }}
            {{-- <div class="font-medium truncate">{{ '@'.auth()->user()->username }}</div> --}}
        </div>
        <ul {{ $middleMenu->attributes->merge(['class' => 'lg:flex lg:text-base list-none ml-0 py-1 text-sm text-slate-700 dark:text-white']) }}
            aria-labelledby="dropdownInformationButton">
            {{ $middleMenu }}
        </ul>
        <div class="py-1">
            <ul {{ $bottomMenu->attributes->merge(['class' => 'list-none lg:text-base ml-0 text-sm text-slate-700 dark:text-white']) }}>
                {{ $bottomMenu }}
            </ul>
        </div>
    </div>
</div>
