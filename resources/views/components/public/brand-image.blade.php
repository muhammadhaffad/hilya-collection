@props(['link' => '', 'img' => '', 'altName' => ''])
<div>
    <a href="{{ $link }}"
        {{ $attributes->merge(['class' => 'flex items-center p-4 aspect-square justify-center border-2 rounded-lg']) }}>
        <img src="{{ $img }}" alt="{{ $altName }}"
            class="max-h-32 rounded-lg">
    </a>
</div>