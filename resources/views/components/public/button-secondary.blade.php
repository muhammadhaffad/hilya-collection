@aware(['buttonName', 'color', 'link'])
<div>
    @if ($link == '')
        <button {{ $attributes->merge(['class'=>"text-{$color}-500 bg-white hover:bg-{$color}-100 focus:ring-2 focus:outline-none focus:ring-{$color}-300 rounded-lg border border-{$color}-200 text-sm font-medium px-5 py-2.5 hover:text-{$color}-900 focus:z-10 dark:bg-slate-700 dark:text-{$color}-300 dark:border-slate-500 dark:hover:text-white dark:hover:bg-slate-600 dark:focus:ring-slate-600"])->merge() }}>
            {{ $buttonName }}
        </button>
    @else
        <a href="{{ $link }}" {{ $attributes->merge(['class'=>"inline-block text-center text-{$color}-500 bg-white hover:bg-{$color}-100 focus:ring-2 focus:outline-none focus:ring-{$color}-300 rounded-lg border border-{$color}-200 text-sm font-medium px-5 py-2.5 hover:text-{$color}-900 focus:z-10 dark:bg-slate-700 dark:text-{$color}-300 dark:border-slate-500 dark:hover:text-white dark:hover:bg-slate-600 dark:focus:ring-slate-600"])->merge() }}>
            {{ $buttonName }}
        </a>
    @endif
</div>
