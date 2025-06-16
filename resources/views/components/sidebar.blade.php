<!-- Sidebar -->
<aside {{ $isActive = request() }}
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-zinc-800 dark:border-gray-700"
    aria-label="Sidenav" id="drawer-navigation">
    <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-zinc-800">
        <div class="relative">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z">
                    </path>
                </svg>
            </div>
            <input type="text" name="search" id="sidebar-search"
                class="bg-zinc-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-zinc-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Cari Menu" autocomplete="off" />
        </div>
        <p class="text-gray-900 dark:text-white text-sm mt-4 px-1 mb-2">Menu</p>
        <ul class="space-y-2" id="sidebar-menu">
            <li>

                <a href="{{ route('dashboard') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white {{ $isActive->is('dashboard') ? 'bg-zinc-100 dark:bg-zinc-700' : 'hover:bg-zinc-100 dark:hover:bg-zinc-700' }} group">
                    <svg aria-hidden="true"
                        class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 {{ $isActive->is('dashboard') ? 'text-gray-900 dark:text-white' : 'group-hover:text-gray-900 dark:group-hover:text-white' }}"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z" />
                    </svg>
                    <span class="ml-3">Dashboard</span>
                </a>

            </li>
            <li x-data="{ santri: {{ request()->is('santri') || request()->is('santri/create') ? 'true' : 'false' }} }">
                <button type="button" @click="santri = !santri"
                    class="flex items-center p-2 w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-zinc-100 dark:text-white dark:hover:bg-zinc-700"
                    aria-controls="dropdown-santri" data-collapse-toggle="dropdown-santri">

                    <!-- Icon Santri -->
                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="M16 19h4a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-2m-2.236-4a3 3 0 1 0 0-4M3 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>

                    <span class="flex-1 ml-3 text-left whitespace-nowrap">Data Santri</span>

                    <!-- Icon Panah yang Berotasi -->
                    <svg aria-hidden="true" :class="{ 'rotate-90': !santri, 'rotate-0': santri }"
                        class="w-6 h-6 text-zinc-500 transition-transform duration-300 rotate-90" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-santri"
                    class="{{ $isActive->is('santri') || $isActive->is('santri/create') ? '' : 'hidden' }} py-2 space-y-2">
                    <li>
                        <a href="{{ route('santri.index') }}"
                            class="flex items-center p-2 pl-11 w-full  text-gray-900 rounded-lg transition duration-75 group dark:text-white {{ $isActive->is('santri') ? 'bg-zinc-100 dark:bg-zinc-700' : 'hover:bg-zinc-100 dark:hover:bg-zinc-700' }}">Daftar
                            Santri</a>
                    </li>
                    <li>
                        <a href="{{ route('santri.create') }}"
                            class="flex items-center p-2 pl-11 w-full  text-gray-900 rounded-lg transition duration-75 group dark:text-white {{ $isActive->is('santri/create') ? 'bg-zinc-100 dark:bg-zinc-700' : 'hover:bg-zinc-100 dark:hover:bg-zinc-700' }}">Tambah
                            Santri</a>
                    </li>
                </ul>
            </li>
            <li x-data="{ kriteria: {{ request()->is('criteria') || request()->is('criteria/create') ? 'true' : 'false' }} }">
                <button type="button" @click="kriteria = !kriteria"
                    class="flex items-center p-2 w-full  text-gray-900 rounded-lg transition duration-75 group hover:bg-zinc-100 dark:text-white dark:hover:bg-zinc-700"
                    aria-controls="dropdown-kriteria" data-collapse-toggle="dropdown-kriteria">

                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.143 4H4.857A.857.857 0 0 0 4 4.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 10 9.143V4.857A.857.857 0 0 0 9.143 4Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 20 9.143V4.857A.857.857 0 0 0 19.143 4Zm-10 10H4.857a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286A.857.857 0 0 0 9.143 14Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286a.857.857 0 0 0-.857-.857Z" />
                    </svg>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">Data Kriteria</span>
                    <svg aria-hidden="true" :class="{ 'rotate-90': !kriteria, 'rotate-0': kriteria }"
                        class="w-6 h-6 text-zinc-500 transition-transform duration-300 rotate-90" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-kriteria"
                    class="{{ $isActive->is('criteria') || $isActive->is('criteria/create') ? '' : 'hidden' }}  py-2 space-y-2">
                    <li>
                        <a href="{{ route('criteria.index') }}"
                            class="flex items-center p-2 pl-11 w-full  text-gray-900 rounded-lg transition duration-75 group dark:text-white {{ $isActive->is('criteria') ? 'bg-zinc-100 dark:bg-zinc-700' : 'hover:bg-zinc-100 dark:hover:bg-zinc-700' }}">Daftar
                            Kriteria</a>
                    </li>
                    <li>
                        <a href="{{ route('criteria.create') }}"
                            class="flex items-center p-2 pl-11 w-full  text-gray-900 rounded-lg transition duration-75 group dark:text-white {{ $isActive->is('criteria/create') ? 'bg-zinc-100 dark:bg-zinc-700' : 'hover:bg-zinc-100 dark:hover:bg-zinc-700' }}">Tambah
                            Kriteria</a>
                    </li>
                </ul>
            </li>
            <li x-data="{ penilaian: {{ request()->is('penilaian') || request()->is('penilaian/create') ? 'true' : 'false' }} }">
                <button type="button" @click="penilaian = !penilaian"
                    class="flex items-center p-2 w-full  text-gray-900 rounded-lg transition duration-75 group hover:bg-zinc-100 dark:text-white dark:hover:bg-zinc-700"
                    aria-controls="dropdown-penilaian" data-collapse-toggle="dropdown-penilaian">
                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3.78552 9.5 12.7855 14l9-4.5-9-4.5-8.99998 4.5Zm0 0V17m3-6v6.2222c0 .3483 2 1.7778 5.99998 1.7778 4 0 6-1.3738 6-1.7778V11" />
                    </svg>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">Data Penilaian</span>
                    <svg aria-hidden="true" :class="{ 'rotate-90': !penilaian, 'rotate-0': penilaian }"
                        class="w-6 h-6 text-zinc-500 transition-transform duration-300 rotate-90" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-penilaian"
                    class="{{ $isActive->is('penilaian') || $isActive->is('penilaian/create') ? '' : 'hidden' }}  py-2 space-y-2">
                    <li>
                        <a href="{{ route('penilaian.create') }}"
                            class="flex items-center p-2 pl-11 w-full  text-gray-900 rounded-lg transition duration-75 group dark:text-white {{ $isActive->is('penilaian/create') ? 'bg-zinc-100 dark:bg-zinc-700' : 'hover:bg-zinc-100 dark:hover:bg-zinc-700' }}">Tambah
                            Penilaian</a>
                    </li>
                    <li>
                        <a href="{{ route('penilaian.index') }}"
                            class="flex items-center p-2 pl-11 w-full  text-gray-900 rounded-lg transition duration-75 group dark:text-white {{ $isActive->is('penilaian') ? 'bg-zinc-100 dark:bg-zinc-700' : 'hover:bg-zinc-100 dark:hover:bg-zinc-700' }}">Hasil
                            Penilaian</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
