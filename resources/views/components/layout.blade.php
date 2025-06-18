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
    <title>{{ $title }} | {{ config('app.name') }}</title>

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


<body class="min-h-full max-w-screen overflow-x-hidden text-gray-800 dark:text-white">
    <div class="antialiased bg-zinc-50 dark:bg-zinc-900  max-w-screen ">
        <x-header></x-header>

        <x-sidebar></x-sidebar>
        <main class="p-4 md:px-5 md:ml-64 min-h-screen max-w-screen pt-20 overflow-hidden overflow-y-auto">
            {{ $slot }}
        </main>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('sidebar-search');
            const menuItems = document.querySelectorAll('#sidebar-menu > li');

            searchInput.addEventListener('input', function() {
                const query = this.value.toLowerCase();

                menuItems.forEach(item => {
                    const text = item.textContent.toLowerCase();
                    // Jika teks mengandung input atau input kosong (tampilkan semua)
                    if (text.includes(query)) {
                        item.style.display = '';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    </script>
    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
</body>

</html>
