@props(['href', 'active' => false])

<li>
    <a href="{{ $href }}"
        class="flex items-center p-2 text-zinc-900 rounded-lg dark:text-white
        {{ $active ? 'bg-zinc-100 dark:bg-zinc-700' : 'hover:bg-zinc-100 dark:hover:bg-zinc-700' }}
        group hover:-translate-y-0.5 transition-all duration-200">

        <span
            class="w-6 h-6 text-zinc-500 dark:text-zinc-400
        {{ $active ? 'text-zinc-900 dark:text-white' : 'group-hover:text-zinc-900 dark:group-hover:text-white' }}">
            {{ $icon }}
        </span>

        <span class="ml-3">{{ $slot }}</span>
    </a>
</li>
