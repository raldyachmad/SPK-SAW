<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-breadcumb></x-breadcumb>
    <section>
        <h1 class="text-2xl font-semibold mb-4">{{ $title }}</h1>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 mb-3">
            <!-- Total Santri -->
            <a href="{{ route('santri.index') }}"
                class="p-4 bg-white hover:bg-blue-600 group dark:bg-zinc-800 rounded-xl shadow flex gap-4 items-center transition">
                <div class="bg-blue-600/20 rounded-lg p-3 group-hover:bg-white/30 transition">
                    <svg class="w-8 h-8 text-blue-500 group-hover:text-white" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="M16 19h4a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-2m-2.236-4a3 3 0 1 0 0-4M3 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-zinc-500 dark:text-zinc-400 group-hover:text-white">Total Santri
                    </h3>
                    <p class="text-2xl font-bold text-zinc-900 dark:text-white group-hover:text-white">
                        {{ $totalSantri }}</p>
                </div>
            </a>

            <!-- Total Kriteria -->
            <a href="{{ route('criteria.index') }}"
                class="p-4 bg-white hover:bg-emerald-600 group dark:bg-zinc-800 rounded-xl shadow flex gap-4 items-center transition">
                <div class="bg-emerald-600/20 rounded-lg p-3 group-hover:bg-white/30 transition">
                    <svg class="w-8 h-8 text-emerald-500 group-hover:text-white" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.143 4H4.857A.857.857 0 0 0 4 4.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 10 9.143V4.857A.857.857 0 0 0 9.143 4Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 20 9.143V4.857A.857.857 0 0 0 19.143 4Zm-10 10H4.857a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286A.857.857 0 0 0 9.143 14Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286a.857.857 0 0 0-.857-.857Z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-zinc-500 dark:text-zinc-400 group-hover:text-white">Total
                        Kriteria</h3>
                    <p class="text-2xl font-bold text-zinc-900 dark:text-white group-hover:text-white mt-1">
                        {{ $totalCriteria }}</p>
                </div>
            </a>

            <!-- Total Penilaian -->
            <a href="{{ route('penilaian.index') }}"
                class="p-4 bg-white hover:bg-purple-600 group dark:bg-zinc-800 rounded-xl shadow flex gap-4 items-center transition">
                <div class="bg-purple-600/20 rounded-lg p-3 group-hover:bg-white/30 transition">
                    <svg class="w-8 h-8 text-purple-500 group-hover:text-white" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="M6 10h12M6 14h8m-8 4h6M4 6h16v14a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V6z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-sm font-medium text-zinc-500 dark:text-zinc-400 group-hover:text-white">Total
                        Penilaian</h3>
                    <p class="text-2xl font-bold text-zinc-900 dark:text-white group-hover:text-white mt-1">
                        {{ $totalPenilaian }}</p>
                </div>
            </a>

            <!-- Lulusan Terbaik -->
            <div class="p-4 bg-white dark:bg-zinc-800 rounded-xl shadow flex flex-col justify-between">
                <div class="mb-2">
                    <h3 class="text-sm font-medium text-yellow-600 dark:text-yellow-400">Lulusan Terbaik</h3>
                    @if ($totalPenilaian != 0)
                        <p class="text-lg font-bold text-yellow-800 dark:text-yellow-300 mt-1">
                            {{ $lulusanTerbaik['nama'] ?? '-' }}
                        </p>
                        <p class="text-sm text-yellow-700 dark:text-yellow-400">
                            Nilai Akhir: {{ $lulusanTerbaik['nilai_akhir'] ?? '-' }}
                        </p>
                    @else
                        <p class="text-lg">Kosong</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="flex flex-col sm:flex-row gap-3 mb-3">
            <!-- Distribusi Santri -->
            <div class="bg-white dark:bg-zinc-800 p-4 rounded-xl shadow w-full">
                <h4 class="text-lg font-semibold text-zinc-800 dark:text-white mb-4">Distribusi Jenis Kelamin</h4>
                <canvas id="santriChart" class="max-h-72"></canvas>
            </div>

            <!-- Bobot Kriteria -->
            <div class="bg-white dark:bg-zinc-800 p-4 rounded-xl shadow w-full">
                <h4 class="text-lg font-semibold text-zinc-800 dark:text-white mb-4">Bobot Tiap Kriteria</h4>
                <canvas id="kategoriChart" class="max-h-72"></canvas>
            </div>
        </div>
    </section>

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Chart: Distribusi Santri (Gender)
        new Chart(document.getElementById('santriChart'), {
            type: 'doughnut',
            data: {
                labels: ['Laki-laki', 'Perempuan'],
                datasets: [{
                    label: 'Jumlah',
                    data: [
                        {{ $santris->where('jenis_kelamin', 'Laki-laki')->count() }},
                        {{ $santris->where('jenis_kelamin', 'Perempuan')->count() }},
                    ],
                    backgroundColor: ['#4f46e5', '#ec4899'],
                    borderWidth: 0
                }]
            }
        });

        // Chart: Bobot Kriteria
        new Chart(document.getElementById('kategoriChart'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($criterias->pluck('nama')) !!},
                datasets: [{
                    label: 'Bobot',
                    data: {!! json_encode($criterias->pluck('bobot')) !!},
                    backgroundColor: '#14b8a6'
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
