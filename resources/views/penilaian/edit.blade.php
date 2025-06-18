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
        <svg class="w-4 h-4 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m9 5 7 7-7 7" />
        </svg>
        <a href="{{ route('penilaian.index') }}" class="flex items-center gap-1 hover:underline">
            Penilaian
        </a>
        <svg class="w-4 h-4 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m9 5 7 7-7 7" />
        </svg>
        <a class="flex items-center gap-1 hover:underline">
            Edit Penilaian
        </a>
    </nav>
    <h1 class="text-2xl font-semibold mb-4">{{ $title }}</h1>
    <section class="bg-white dark:bg-zinc-800 p-4 rounded-md border border-zinc-200 dark:border-zinc-700">
        <h2 class="text-xl font-semibold text-zinc-800 dark:text-white mb-4">Nama: {{ $santri->nama }}</h2>

        <form action="{{ route('penilaian.update', $santri->id) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="santri_id" value="{{ $santri->id }}">
            <div class="grid md:grid-cols-3 md:gap-4">
                @foreach ($criterias as $criteria)
                    @php
                        $nilai = $penilaians[$criteria->id]->nilai ?? 0;
                    @endphp
                    <div class="mb-4" x-data="{ nilai: {{ $nilai }} }">
                        <label for="nilai_{{ $criteria->id }}"
                            class="block mb-2 text-sm font-medium text-zinc-900 dark:text-white capitalize">
                            {{ $criteria->nama }} ({{ $criteria->atribut }})
                        </label>
                        <input type="range" x-model.number="nilai" min="0" max="1" step="0.05"
                            class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700" />
                        <small class="mt-1 text-sm text-zinc-700 dark:text-zinc-300">
                            Nilai: <span x-text="nilai.toFixed(2)"></span>
                        </small>
                        <input type="hidden" name="nilai[{{ $criteria->id }}]" :value="nilai.toFixed(2)" />
                    </div>
                @endforeach
            </div>
            <div class="">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-500">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </section>
</x-layout>
