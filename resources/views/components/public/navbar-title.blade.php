@props([
    'title',
    'icon',
    'link'
])
<div>
    <a href="{{ $link }}">
        <span {{ $attributes->merge(['class' => 'text-xl font-semibold text-green-500 whitespace-nowrap dark:text-green-400']) }}>
            <i class="{{ $icon }}"></i> {{ $title }}
        </span>
    </a>
</div>