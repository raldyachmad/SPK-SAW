<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <nav class="mb-4 flex items-center text-sm text-gray-500 dark:text-gray-400">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-1 hover:underline">
            <svg aria-hidden="true"
                class="w-4 h-4 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z" />
            </svg>
            Dashboard
        </a>
    </nav>
    <section>
        <h1 class="text-2xl font-semibold mb-4">{{ $title }}</h1>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
            <div class="p-4 bg-white dark:bg-zinc-800 rounded-xl shadow flex gap-4 items-center">
                <div class="bg-blue-600/20 rounded-lg p-3">
                    <svg class=" w-8 h-8 text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="M16 19h4a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-2m-2.236-4a3 3 0 1 0 0-4M3 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-zinc-500 dark:text-zinc-400">Total Santri</h3>
                    <p class="text-2xl font-bold text-zinc-900 dark:text-white">{{ $totalSantri }}</p>
                </div>
            </div>
            <div class="p-4 bg-white dark:bg-zinc-800 rounded-xl shadow flex gap-4 items-center">
                <div class="bg-emerald-600/20 rounded-lg p-3">
                    <svg class=" w-8 h-8 text-emerald-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.143 4H4.857A.857.857 0 0 0 4 4.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 10 9.143V4.857A.857.857 0 0 0 9.143 4Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 20 9.143V4.857A.857.857 0 0 0 19.143 4Zm-10 10H4.857a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286A.857.857 0 0 0 9.143 14Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286a.857.857 0 0 0-.857-.857Z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-zinc-500 dark:text-zinc-400">Total Kategori</h3>
                    <p class="text-2xl font-bold text-zinc-900 dark:text-white mt-1">{{ $totalCriteria }}</p>
                </div>
            </div>
            <div class="p-4 bg-white dark:bg-zinc-800 rounded-xl shadow flex gap-4 items-center">
                <div class="bg-cyan-600/20 rounded-lg p-3">
                    <svg class=" w-8 h-8 text-cyan-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.143 4H4.857A.857.857 0 0 0 4 4.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 10 9.143V4.857A.857.857 0 0 0 9.143 4Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 20 9.143V4.857A.857.857 0 0 0 19.143 4Zm-10 10H4.857a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286A.857.857 0 0 0 9.143 14Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286a.857.857 0 0 0-.857-.857Z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-zinc-500 dark:text-zinc-400">Total Kategori</h3>
                    <p class="text-2xl font-bold text-zinc-900 dark:text-white mt-1">{{ $totalCriteria }}</p>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="flex gap-6 mb-6">
            <div class="bg-white dark:bg-zinc-800 p-4 rounded-xl shadow">
                <h4 class="text-lg font-semibold text-zinc-800 dark:text-white mb-4">Distribusi Santri</h4>
                <canvas id="santriChart"></canvas>
            </div>
            <div class="bg-white dark:bg-zinc-800 p-4 h-auto w-full rounded-xl shadow">
                <h4 class="text-lg font-semibold text-zinc-800 dark:text-white mb-4">Bobot Kategori</h4>
                <canvas id="kategoriChart"></canvas>
            </div>
        </div>
    </section>

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const santriChart = new Chart(document.getElementById('santriChart'), {
            type: 'doughnut',
            data: {
                labels: ['Laki-laki', 'Perempuan'],
                datasets: [{
                    label: 'Jumlah',
                    data: [
                        {{ $santris->where('jenis_kelamin', 'Perempuan')->count() }},
                        {{ $santris->where('jenis_kelamin', 'Laki-laki')->count() }},
                    ],
                    backgroundColor: ['oklch(48.8% 0.243 264.376)', 'oklch(43.2% 0.232 292.759)'],
                }]
            }
        });

        const kategoriChart = new Chart(document.getElementById('kategoriChart'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($criterias->pluck('nama')) !!},
                datasets: [{
                    label: 'Bobot',
                    data: {!! json_encode($criterias->pluck('bobot')) !!},
                    backgroundColor: 'oklch(68.5% 0.169 237.323)'
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</x-layout>
