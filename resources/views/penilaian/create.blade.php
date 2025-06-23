<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-breadcumb :title="$title"></x-breadcumb>

    <h1 class="text-2xl font-semibold mb-4">{{ $title }}</h1>
    <section class="bg-white dark:bg-zinc-800 p-4 rounded-md border border-zinc-200 dark:border-zinc-700">

        <form action="{{ route('penilaian.store') }}" method="POST">
            @csrf
            <div class="grid md:grid-cols-3 md:gap-4">
                <div class="mb-4">
                    <label for="santri_id" class="block mb-2 text-sm font-medium text-zinc-900 dark:text-white after:ml-0.5 after:text-red-500 after:content-['*']">Pilih
                        Santri</label>
                    <select name="santri_id" id="santri_id" required
                        class="bg-zinc-50 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">-- Pilih Santri --</option>
                        @foreach ($santris as $santri)
                            <option value="{{ $santri->id }}">{{ $santri->nama }}</option>
                        @endforeach
                    </select>
                </div>
                @foreach ($criterias as $criteria)
                    <div class="mb-4" x-data="{ nilai: 0 }">
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
            <button type="submit" class="mt-6 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">
                Simpan Penilaian
            </button>
        </form>
    </section>
    <section id="modal-konfirmasi" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/60">
        <div class="relative p-4 w-full max-w-lg h-auto md:h-auto">
            <div class="relative p-4 bg-white rounded-lg dark:bg-zinc-800 md:p-8">
                <div class="mb-4 text-sm font-light text-zinc-500 dark:text-zinc-400">
                    <h3 class="mb-3 text-2xl font-bold text-zinc-900 dark:text-white">
                        Data sudah ada sebelumnya, ingin menggantinya?
                    </h3>
                    <p>Data lama akan digantikan. Klik "Yakin" jika ingin melanjutkan.</p>
                </div>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button"
                        class="py-2 px-4 text-sm font-medium text-zinc-500 bg-white rounded-lg border border-zinc-200 hover:bg-zinc-100 dark:bg-zinc-700 dark:text-zinc-300 dark:border-zinc-500 dark:hover:text-white dark:hover:bg-zinc-600"
                        id="btn-batal">
                        Batal
                    </button>
                    <button type="button"
                        class="py-2 px-4 text-sm font-medium rounded-lg bg-amber-600 text-white border border-amber-500 hover:bg-amber-500"
                        id="btn-yakin">
                        Yakin
                    </button>
                </div>
            </div>
        </div>
    </section>


    @push('scripts')
        <script>
            const penilaians = @json($penilaians);
            const santriSelect = document.getElementById('santri_id');
            const modal = document.getElementById('modal-konfirmasi');
            const btnYakin = document.getElementById('btn-yakin');
            const btnBatal = document.getElementById('btn-batal');

            let lanjutSubmit = false;

            santriSelect.addEventListener('change', (e) => {
                const selectedId = parseInt(e.target.value);
                const existing = penilaians.find(p => p.santri_id === selectedId);

                if (existing) {
                    e.preventDefault();
                    showModal(() => {
                        lanjutSubmit = true;
                        // re-set kembali nilai dropdown agar form bisa submit
                        santriSelect.value = selectedId;
                    });

                    // kosongkan dulu pilihan biar user tidak bisa langsung submit
                    santriSelect.value = '';
                }
            });

            function showModal(onConfirm) {
                modal.classList.remove('hidden');

                btnYakin.onclick = () => {
                    modal.classList.add('hidden');
                    onConfirm(); // lanjut aksi setelah klik yakin
                };

                btnBatal.onclick = () => {
                    modal.classList.add('hidden');
                };
            }
        </script>
    @endpush
</x-layout>
