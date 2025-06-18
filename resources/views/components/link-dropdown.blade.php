@props([
    'href',
    'active' => false,
])

<li>
    <a href="{{ $href }}"
        {{ $attributes->merge([
            'class' => 'flex items-center p-2 pl-11 text-zinc-900 rounded-lg transition duration-75 group dark:text-white ' .
                        ($active ? 'bg-zinc-100 dark:bg-zinc-700' : 'hover:bg-zinc-100 dark:hover:bg-zinc-700')
        ]) }}>
        {{ $slot }}
    </a>
</li>
