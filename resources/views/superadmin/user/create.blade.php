<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-breadcumb :title="$title"></x-breadcumb>
    <h1 class="text-2xl font-semibold mb-4">{{ $title }}</h1>
    <section class="bg-white dark:bg-zinc-800 p-4 rounded-md border border-zinc-200 dark:border-zinc-700">
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="grid md:grid-cols-2 md:gap-4">
                <div>
                    <label for="name"
                        class="block mb-2 text-sm font-medium text-zinc-900 dark:text-white after:ml-0.5 after:text-red-500 after:content-['*']">
                        Nama Lengkap
                    </label>
                    <input type="text" id="name" name="name" required autocomplete="off"
                        class="bg-zinc-50 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('name')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-zinc-900 dark:text-white after:ml-0.5 after:text-red-500 after:content-['*']">
                        Email
                    </label>
                    <input type="email" id="email" name="email" required autocomplete="off"
                        class="bg-zinc-50 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('email')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password"
                        class="block mb-2 text-sm font-medium text-zinc-900 dark:text-white after:ml-0.5 after:text-red-500 after:content-['*']">
                        Password
                    </label>
                    <x-password-input id="password" name="password" required class="mt-1 block w-full"
                        autocomplete="new-password" />
                    @error('password')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation"
                        class="block mb-2 text-sm font-medium text-zinc-900 dark:text-white after:ml-0.5 after:text-red-500 after:content-['*']">
                        Konfirmasi Password
                    </label>
                    <x-password-input id="password_confirmation" name="password_confirmation" required
                        class="mt-1 block w-full" autocomplete="new-password" />
                    @error('password')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label for="role"
                        class="block mb-2 text-sm font-medium text-zinc-900 dark:text-white after:ml-0.5 after:text-red-500 after:content-['*']">
                        Role
                    </label>
                    <select id="role" name="role" required
                        class="bg-zinc-50 border border-zinc-300 text-zinc-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected disabled>Pilih Role</option>
                        <option value="superadmin">Super Admin</option>
                        <option value="admin">Admin</option>
                    </select>
                    @error('role')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Simpan Data
            </button>
        </form>
    </section>
</x-layout>
