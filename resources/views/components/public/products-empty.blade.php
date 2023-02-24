@props(['text'])
<div>
    <div class="flex flex-wrap justify-between lg:justify-start">
        <div class="p-2 w-full group lg:p-3">
            <div class="flex h-60 rounded-lg bg-slate-100 dark:bg-slate-600">
                <span class="mx-auto my-auto text-center font-semibold text-slate-800 lg:text-base dark:text-slate-50">{{ $text }}</span>
            </div>
        </div>
    </div>
</div>