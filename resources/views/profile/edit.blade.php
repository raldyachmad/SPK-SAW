<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <nav class="mb-4 flex items-center text-sm text-zinc-500 dark:text-zinc-400">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-1 hover:underline">
            <svg aria-hidden="true"
                class="w-4 h-4 text-zinc-500 transition duration-75 dark:text-zinc-400 group-hover:text-zinc-900 dark:group-hover:text-white"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z" />
            </svg>
            Dashboard
        </a>
        <svg class="w-4 h-4 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m9 5 7 7-7 7" />
        </svg>
        <a href="{{ route('penilaian.index') }}" class="flex items-center gap-1 hover:underline">
            Penilaian
        </a>
        <svg class="w-4 h-4 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m9 5 7 7-7 7" />
        </svg>
        <a class="flex items-center gap-1">
            {{ $title }}
        </a>
    </nav>
    <h1 class="text-2xl font-semibold mb-4">{{ $title }}</h1>
    <section class="space-y-5">
        <div class="bg-white dark:bg-zinc-800 p-4 rounded-md border border-zinc-200 dark:border-zinc-700">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="bg-white dark:bg-zinc-800 p-4 rounded-md border border-zinc-200 dark:border-zinc-700">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="bg-white dark:bg-zinc-800 p-4 rounded-md border border-zinc-200 dark:border-zinc-700">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </section>
</x-layout>
