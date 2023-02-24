@props([
    'icon', 
    'sectionName',
    'color'
    ])
<div>
    <div class="self-baseline px-3 font-semibold flex">
        <span
            {{ $attributes->merge(['class'=>'rounded-lg px-5 py-2.5 mr-2']) }}
            >
            <i class="{{ $icon }}"></i>
            {{ $sectionName }}
        </span>
    </div>
</div>