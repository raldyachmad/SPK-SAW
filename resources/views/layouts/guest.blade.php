<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="themeSwitcher()" x-init="initTheme()"
    :class="isDark ? 'dark' : 'light'">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? '' }} | {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        function themeSwitcher() {
            return {
                isDark: false,
                initTheme() {
                    // ambil dari localStorage
                    this.isDark = localStorage.getItem('theme') === 'dark';
                },
                toggleTheme() {
                    this.isDark = !this.isDark;
                    localStorage.setItem('theme', this.isDark ? 'dark' : 'light');
                }
            }
        }
    </script>
</head>

<body class="font-sans text-zinc-900 antialiased">
    <button @click="toggleTheme"
        class="p-2 text-gray-500 rounded-l-lg hover:text-gray-900 bg-white shadow-lg shadow-blue-600/40 dark:bg-zinc-700 dark:text-gray-400 dark:hover:text-white dark:hover:bg-zinc-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600 fixed top-1/2 right-0">
        <svg x-show="isDark" class="w-5 h-5 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
            height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 5V3m0 18v-2M7.05 7.05 5.636 5.636m12.728 12.728L16.95 16.95M5 12H3m18 0h-2M7.05 16.95l-1.414 1.414M18.364 5.636 16.95 7.05M16 12a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z" />
        </svg>
        <svg x-show="!isDark" class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
            height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 21a9 9 0 0 1-.5-17.986V3c-.354.966-.5 1.911-.5 3a9 9 0 0 0 9 9c.239 0 .254.018.488 0A9.004 9.004 0 0 1 12 21Z" />
        </svg>

    </button>
    <div class="min-h-dvh flex flex-col justify-center items-center px-3 pt-6 sm:pt-0 bg-zinc-100 dark:bg-zinc-900">
        <div
            class="w-full sm:max-w-md px-4 sm:px-6 py-4 overflow-hidden sm:rounded-lg -mt-20 md:mt-0">
            <a href="/" class="flex items-center justify-center gap-3 my-6">
                <x-application-logo class="size-18 rounded-sm" />
                <span class=" text-3xl whitespace-nowrap dark:text-white">
                    <span
                        class="font-semibold text-transparent bg-clip-text bg-gradient-to-r to-sky-400 from-purple-600">
                        SPK</span>
                    Skripsi</span>
            </a>
            {{ $slot }}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
