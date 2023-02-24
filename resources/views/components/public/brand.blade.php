@props(['brand'])
<div class="space-y-2">
    <x-public.brand-image 
        link="{{ route('home.brand-products', ['brand' => $brand->slug]) }}"
        img="{{ asset('storage/' . $brand->logo) }}" 
        class="border-blue-200 dark:border-slate-400">
    </x-public.brand-image>
    <x-public.brand-badge brandName="{{ $brand->nama }}" class="bg-blue-100 text-blue-600 dark:bg-slate-600 dark:text-blue-300"></x-public.brand-badge>
</div>