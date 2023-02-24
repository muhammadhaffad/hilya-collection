@props([
    'link',
    'isActive' => false,
    'menuName'
    ])
<div>
    <li>
        <a href="{{ $link }}" {{ $attributes->class([
            'block py-2 px-4 lg:hover:rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white',
            'text-green-400' => $isActive            
            ]) }}>
            {{ $menuName }}
        </a>
    </li>
</div>