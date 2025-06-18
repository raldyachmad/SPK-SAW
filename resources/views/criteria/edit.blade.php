<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-breadcumb :title="$title"></x-breadcumb>
    <h1 class="text-2xl font-semibold mb-4">{{ $title }}</h1>
    <section class="bg-white dark:bg-zinc-800 p-4 rounded-md border border-zinc-200 dark:border-zinc-700">
        <form action="{{ route('criteria.update', $criteria->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid md:grid-cols-2 md:gap-4">
                <div>
                    <label for="nama" class="block mb-2 text-sm font-medium text-zinc-900 dark:text-white">
                        Nama Kriteria</label>
                    <input type="text" id="nama"
                        class="bg-zinc-50 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required autocomplete="off" name="nama" value="{{ $criteria->nama }}">
                    @error('nama')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div x-data="{ bobot: {{ $criteria->bobot }} }">
                    <label for="bobot" class="block mb-2 text-sm font-medium text-zinc-900 dark:text-white">
                        Bobot Kriteria</label>
                    <input type="range" x-model.number="bobot" min="0" max="1" step="0.05"
                        value="{{ $criteria->bobot }}"
                        class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700" />
                    <small class="mt-6">
                        Bobot: <span x-text="bobot.toFixed(2)"></span>
                    </small>
                    <input type="hidden" name="bobot" :value="bobot.toFixed(2)" />
                    @error('bobot')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="atribut" class="block mb-2 text-sm font-medium text-zinc-900 dark:text-white">Atribut
                        Kategori</label>
                    <select id="atribut" name="atribut"
                        class="bg-zinc-50 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                        <option disabled>Pilih</option>
                        <option value="benefit" {{ $criteria->atribut == 'benefit' ? 'selected' : '' }}>Benefit
                        </option>
                        <option value="cost" {{ $criteria->atribut == 'cost' ? 'selected' : '' }}>Cost</option>
                    </select>
                    @error('atribut')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <button type="submit"
                class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit
                Data</button>
        </form>
    </section>
</x-layout>
