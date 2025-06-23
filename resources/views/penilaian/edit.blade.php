<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-breadcumb :title="$title"></x-breadcumb>
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
                            class="block mb-2 text-sm font-medium text-zinc-900 dark:text-white capitalize after:ml-0.5 after:text-red-500 after:content-['*']">
                            {{ $criteria->nama }} ({{ $criteria->atribut }})
                        </label>
                        <input type="range" x-model.number="nilai" min="0" max="100" step="0.5"
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
