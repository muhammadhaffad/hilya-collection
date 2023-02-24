@props(['brandName' => ''])
<div>
    <div class="flex justify-center">
        <span
            {{ $attributes->merge(['class' => 'mt-1 text-center text-sm lg:text-base font-medium px-2.5 py-0.5 rounded-lg']) }}>
            <i class="fad fa-tag"></i> {{ $brandName }}
        </span>
    </div>
</div>