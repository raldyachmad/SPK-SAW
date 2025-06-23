<nav
    class="bg-white border-b border-zinc-200 px-3 md:px-6 py-2.5 dark:bg-zinc-800 dark:border-zinc-700 fixed left-0 right-0 top-0 z-50 max-w-screen">
    <div class="flex flex-wrap justify-between items-center">
        <div class="flex justify-start items-center">
            <button data-drawer-target="drawer-navigation" data-drawer-toggle="drawer-navigation"
                aria-controls="drawer-navigation"
                class="p-2 mr-2 text-zinc-600 rounded-lg cursor-pointer md:hidden hover:text-zinc-900 hover:bg-zinc-100 focus:bg-zinc-100 dark:focus:bg-zinc-700 focus:ring-2 focus:ring-zinc-100 dark:focus:ring-zinc-700 dark:text-zinc-400 dark:hover:bg-zinc-700 dark:hover:text-white">
                <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
                <svg aria-hidden="true" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Toggle sidebar</span>
            </button>
            <a href="{{ route(Auth::user()->role == 'admin' ? 'dashboard' : 'superadmin.dashboard') }}" class="flex gap-3 items-center justify-between mr-4">
                <img src="{{ asset('logo.svg') }}" alt="Logo SPK Skripsi" class="size-9 rounded-sm">
                <span class="self-center text-xl whitespace-nowrap dark:text-white"><span
                        class="font-semibold text-transparent bg-clip-text bg-gradient-to-r to-sky-400 from-purple-600">SPK</span>
                    Skripsi</span>
            </a>
        </div>
        <div class="flex items-center gap-1 lg:order-2">
            <button @click="toggleTheme"
                class="p-2 text-zinc-500 rounded-lg hover:text-zinc-900 hover:bg-zinc-100 dark:text-zinc-400 dark:hover:text-white dark:hover:bg-zinc-700 focus:ring-4 focus:ring-zinc-300 dark:focus:ring-zinc-600 ">
                <svg x-show="isDark" class="w-5 h-5 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 5V3m0 18v-2M7.05 7.05 5.636 5.636m12.728 12.728L16.95 16.95M5 12H3m18 0h-2M7.05 16.95l-1.414 1.414M18.364 5.636 16.95 7.05M16 12a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z" />
                </svg>
                <svg x-show="!isDark" class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 21a9 9 0 0 1-.5-17.986V3c-.354.966-.5 1.911-.5 3a9 9 0 0 0 9 9c.239 0 .254.018.488 0A9.004 9.004 0 0 1 12 21Z" />
                </svg>

            </button>
            <button type="button"
                class="flex mx-3 text-sm bg-zinc-800 rounded-full md:mr-0 focus:ring-4 focus:ring-zinc-300 dark:focus:ring-zinc-600"
                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full"
                    src="{{ Avatar::create(Auth::user()->name)->toBase64() }}"
                    alt="{{ Auth::user()->name }}" />
            </button>
            <!-- Dropdown menu -->
            <div class="hidden z-50 my-4 w-56 text-base list-none bg-white divide-y divide-zinc-100 shadow dark:bg-zinc-700 dark:divide-zinc-600 rounded-md overflow-hidden"
                id="dropdown">
                <div class="py-3 px-4">
                    <span
                        class="block text-sm font-semibold text-zinc-900 dark:text-white">{{ Auth::user()->name }}</span>
                    <span class="block text-sm text-zinc-900 truncate dark:text-white">{{ Auth::user()->email }}</span>
                </div>
                <ul class="py-1 text-zinc-700 dark:text-zinc-300" aria-labelledby="dropdown">
                    <li>
                        <a href="{{ url(Auth::user()->role == 'admin' ? 'profile':'superadmin/profile') }}"
                            class="block py-2 px-4 text-sm hover:bg-zinc-100 dark:hover:bg-zinc-600 dark:hover:text-white">
                            Profil Saya
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                class="block
                                        py-2 px-4 text-sm hover:bg-zinc-100 dark:hover:bg-zinc-600
                                        dark:hover:text-white">
                                Log Out</a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
