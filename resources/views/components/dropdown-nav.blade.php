@props([
    'active' => false,
    'open' => false,
    'id',
])

<li x-data="{ open: {{ $open ? 'true' : 'false' }} }">
    <button type="button" @click="open = !open"
        class="flex items-center p-2 w-full text-zinc-900 rounded-lg group hover:bg-zinc-100 dark:text-white dark:hover:bg-zinc-700 hover:-translate-y-0.5 transition-all duration-200"
        :aria-controls="'{{ $id }}'">

        <!-- Slot ikon -->
        {{ $icon }}

        <span class="flex-1 ml-3 text-left whitespace-nowrap">
            {{ $label }}
        </span>

        <!-- Panah kanan/kebawah -->
        <svg aria-hidden="true"
            :class="{ 'rotate-90': !open, 'rotate-0': open }"
            class="w-6 h-6 text-zinc-500 transition-transform duration-300 rotate-90" fill="currentColor"
            viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
        </svg>
    </button>

    <ul :id="'{{ $id }}'"
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 max-h-0"
        x-transition:enter-end="opacity-100 max-h-40"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 max-h-40"
        x-transition:leave-end="opacity-0 max-h-0"
        class="py-2 space-y-2 overflow-hidden">
        {{ $slot }}
    </ul>
</li>
