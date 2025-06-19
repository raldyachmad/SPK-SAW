<!DOCTYPE html>
<html x-data="themeSwitcher()" x-init="initTheme()" :class="isDark ? 'dark' : 'light'">

<head>
    <meta charset="UTF-8">
    <script>
        // Tambahkan dark class SECEPAT mungkin sebelum DOM render
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.tailwindcss.css">
    <title>{{ config('app.name') }}</title>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        function themeSwitcher() {
            return {
                isDark: localStorage.getItem('theme') === 'dark',
                initTheme() {
                    this.isDark = localStorage.getItem('theme') === 'dark';
                },
                toggleTheme() {
                    this.isDark = !this.isDark;
                    localStorage.setItem('theme', this.isDark ? 'dark' : 'light');
                    document.documentElement.classList.toggle('dark', this.isDark);
                }
            }
        }
    </script>
</head>

<body>
    <section class="bg-white dark:bg-gray-900 h-dvh flex items-center">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center">
                <h1 class="font-bold text-blue-500 text-9xl mb-5">{{ $code }}</h1>
                <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 dark:text-white">
                    Oops, {{ $title }}
                </p>
                <p class="mb-4 font-light text-gray-500 dark:text-gray-400">
                    {{ $message }}
                </p>
                <button onclick="window.history.back()"
                    class="inline-flex text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center dark:focus:ring-blue-900 my-4">
                    Kembali
                </button>
            </div>
        </div>
    </section>

</body>

</html>
