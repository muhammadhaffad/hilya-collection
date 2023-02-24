@props(['breadcrumbItem'])
<div>
    <nav {{ $attributes->merge(['class' => 'flex justify-between px-3 items-center']) }} aria-label="Breadcrumb">
        <ol {{ $breadcrumbItem->attributes->merge(['class'=>'inline-flex items-center space-x-1 md:space-x-3 mr-2 overflow-hidden']) }}>
            {{ $breadcrumbItem }}
        </ol>
        <a href="javascript:history.back()" class="text-blue-500 font-medium text-sm lg:text-base dark:text-blue-300">
            Kembali
        </a>
    </nav>
</div>