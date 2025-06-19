<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-breadcumb :title="$title"></x-breadcumb>
    <h1 class="text-2xl font-semibold mb-4">{{ $title }}</h1>
    <section class="bg-white dark:bg-zinc-800 p-4 rounded-md border border-zinc-200 dark:border-zinc-700">
        <form action="{{ route('santri.update', $santri->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid md:grid-cols-2 md:gap-4">
                <div>
                    <label for="nama" class="block mb-2 text-sm font-medium text-zinc-900 dark:text-white after:ml-0.5 after:text-red-500 after:content-['*']">
                        Nama Lengkap</label>
                    <input type="text" id="default-input"
                        class="bg-zinc-50 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        name="nama" value="{{ $santri->nama }}">
                </div>
                <div>
                    <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-zinc-900 dark:text-white after:ml-0.5 after:text-red-500 after:content-['*']">
                        Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin"
                        class="bg-zinc-50 border border-zinc-300 text-zinc-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option disabled>Pilih</option>
                        <option value="Laki-laki" {{ $santri->jenis_kelamin == 'Laki-laki' ? 'selected':'' }}>Laki-laki</option>
                        <option value="Perempuan" {{ $santri->jenis_kelamin == 'Perempuan' ? 'selected':'' }}>Perempuan</option>
                    </select>
                </div>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit
                Data</button>
        </form>
    </section>
</x-layout>
