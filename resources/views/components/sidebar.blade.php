<!-- Sidebar -->
<aside {{ $isActive = request() }}
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-zinc-200 md:translate-x-0 dark:bg-zinc-800 dark:border-zinc-700"
    aria-label="Sidenav" id="drawer-navigation">
    <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-zinc-800">
        <div class="relative">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-zinc-500 dark:text-zinc-400" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z">
                    </path>
                </svg>
            </div>
            <input type="text" name="search" id="sidebar-search"
                class="bg-zinc-50 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Cari Menu" autocomplete="off"/>
        </div>
        <p class="text-zinc-900 dark:text-white text-sm mt-4 px-1 mb-2">Menu</p>
        <ul class="space-y-2 text-sm" id="sidebar-menu">
            @if (Auth::user()->role == 'superadmin')
                <x-single-nav href="{{ route('superadmin.dashboard') }}" :active="$isActive->is('superadmin/dashboard')">
                    <x-slot name="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z" />
                        </svg>
                    </x-slot>
                    Dashboard
                </x-single-nav>
            @else
                <x-single-nav href="{{ route('dashboard') }}" :active="$isActive->is('dashboard')">
                    <x-slot name="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z" />
                        </svg>
                    </x-slot>
                    Dashboard
                </x-single-nav>
                <x-dropdown-nav :active="$isActive->is('santri*')" :open="request()->is('santri*')" id="dropdown-santri">
                    <x-slot name="icon">
                        <svg class="flex-shrink-0 w-6 h-6 text-zinc-500 transition duration-75 group-hover:text-zinc-900 dark:text-zinc-400 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="M16 19h4a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-2m-2.236-4a3 3 0 1 0 0-4M3 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </x-slot>

                    <x-slot name="label">Data Santri</x-slot>

                    <x-link-dropdown :href="route('santri.index')" :active="$isActive->is('santri')">
                        Daftar Santri
                    </x-link-dropdown>

                    <x-link-dropdown :href="route('santri.create')" :active="$isActive->is('santri/create')">
                        Tambah Santri
                    </x-link-dropdown>
                </x-dropdown-nav>

                <x-dropdown-nav :active="$isActive->is('criteria*')" :open="request()->is('criteria*')" id="dropdown-kriteria">
                    <x-slot name="icon">
                        <svg class="flex-shrink-0 w-6 h-6 text-zinc-500 transition duration-75 group-hover:text-zinc-900 dark:text-zinc-400 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.143 4H4.857A.857.857 0 0 0 4 4.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 10 9.143V4.857A.857.857 0 0 0 9.143 4Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 20 9.143V4.857A.857.857 0 0 0 19.143 4Zm-10 10H4.857a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286A.857.857 0 0 0 9.143 14Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286a.857.857 0 0 0-.857-.857Z" />
                        </svg>
                    </x-slot>

                    <x-slot name="label">Data Kriteria</x-slot>

                    <x-link-dropdown :href="route('criteria.index')" :active="$isActive->is('criteria')">
                        Daftar Kriteria
                    </x-link-dropdown>

                    <x-link-dropdown :href="route('criteria.create')" :active="$isActive->is('criteria/create')">
                        Tambah Kriteria
                    </x-link-dropdown>
                </x-dropdown-nav>
                <x-dropdown-nav :active="$isActive->is('penilaian*')" :open="request()->is('penilaian*')" id="dropdown-penilaian">
                    <x-slot name="icon">
                        <svg class="flex-shrink-0 w-6 h-6 text-zinc-500 transition duration-75 group-hover:text-zinc-900 dark:text-zinc-400 dark:group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3.78552 9.5 12.7855 14l9-4.5-9-4.5-8.99998 4.5Zm0 0V17m3-6v6.2222c0 .3483 2 1.7778 5.99998 1.7778 4 0 6-1.3738 6-1.7778V11" />
                        </svg>
                    </x-slot>

                    <x-slot name="label">Data Penilaian</x-slot>

                    <x-link-dropdown :href="route('penilaian.index')" :active="$isActive->is('penilaian')">
                        Hasil Penilaian
                    </x-link-dropdown>

                    <x-link-dropdown :href="route('penilaian.create')" :active="$isActive->is('penilaian/create')">
                        Tambah Penilaian
                    </x-link-dropdown>

                </x-dropdown-nav>
            @endif
        </ul>
    </div>
</aside>
