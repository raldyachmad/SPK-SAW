@props(['id' => 'password', 'name' => 'password', 'required' => false, 'autocomplete' => 'current-password'])

<div x-data="{ show: false }" class="relative">
    <input
        :type="show ? 'text' : 'password'"
        id="{{ $id }}"
        name="{{ $name }}"
        {{ $required ? 'required' : '' }}
        autocomplete="{{ $autocomplete }}"
        {{ $attributes->merge([
            'class' => 'bg-zinc-50 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'
        ]) }}
    >
    <button
        type="button"
        @click="show = !show"
        class="absolute inset-y-0 right-0 px-3 flex items-center text-zinc-500 hover:text-zinc-800 dark:hover:text-zinc-400"
        tabindex="-1"
    >
        <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 12a3 3 0 01-6 0m6 0a3 3 0 00-6 0m6 0h0M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z"/>
        </svg>
        <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.966 9.966 0 012.26-3.592M6.42 6.42A9.958 9.958 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.966 9.966 0 01-1.357 2.568M15 12a3 3 0 11-6 0m9 9L3 3"/>
        </svg>
    </button>
</div>
