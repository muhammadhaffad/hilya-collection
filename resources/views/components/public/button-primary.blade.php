@aware(['buttonName', 'color', 'link'])
<div>
    @if ($link == '')
        <button {{ $attributes->merge(['class'=>"bg-{$color}-400 text-white hover:bg-{$color}-500 focus:ring-2 focus:outline-none focus:ring-{$color}-300 rounded-lg border border-{$color}-200 text-sm font-medium px-5 py-2.5 hover:text-{$color}-900 focus:z-10 dark:bg-green-400 dark:text-white dark:border-none dark:hover:text-white dark:hover:bg-{$color}-600 dark:focus:ring-{$color}-500"])->merge() }}>
            {{ $buttonName }}
        </button>
    @else
        <a href="{{ $link }}" {{ $attributes->merge(['class'=>"inline-block text-center bg-{$color}-400 text-white hover:bg-{$color}-500 focus:ring-2 focus:outline-none focus:ring-{$color}-300 rounded-lg border border-{$color}-200 text-sm font-medium px-5 py-2.5 hover:text-{$color}-900 focus:z-10 dark:bg-green-400 dark:text-white dark:border-none dark:hover:text-white dark:hover:bg-{$color}-600 dark:focus:ring-{$color}-500"])->merge() }}>
            {{ $buttonName }}
        </a>
    @endif
</div>