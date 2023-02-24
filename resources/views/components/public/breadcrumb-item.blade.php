@props(['link' => '#', 'icon', 'name'])
<div>
    <li>
        <a href="{{ $link }}"
            {{ $attributes->merge(['class'=>'inline-flex items-center text-sm lg:text-base font-medium text-green-500 hover:text-green-700 dark:text-green-300 dark:hover:text-white']) }}
            >
            <i class="{{$icon}}"></i>
            {{$name}}
        </a>
    </li>
</div>