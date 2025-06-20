<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-breadcumb :title="$title"></x-breadcumb>
    <div class="flex sm:items-center flex-col sm:flex-row justify-between gap-3 mb-4">
        <h1 class="text-2xl font-semibold">{{ $title }}</h1>
        <div class="flex items-center gap-2 ">
            <button id="exportButton" data-dropdown-toggle="export"
                class="flex items-center justify-center font-medium rounded-lg text-sm px-3 py-2 border border-zinc-200 hover:bg-zinc-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-zinc-100 dark:focus:ring-zinc-700 dark:bg-zinc-800 dark:text-zinc-400 dark:border-zinc-600 dark:hover:text-white dark:hover:bg-zinc-700 text-zinc-900 focus:outline-none bg-white "
                type="button">
                <svg class="w-4.5 h-4.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 10V4a1 1 0 0 0-1-1H9.914a1 1 0 0 0-.707.293L5.293 7.207A1 1 0 0 0 5 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2M10 3v4a1 1 0 0 1-1 1H5m5 6h9m0 0-2-2m2 2-2 2" />
                </svg>

                Export Data
                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="export"
                class="z-10 hidden bg-white divide-y divide-zinc-100 rounded-lg shadow-sm w-44 dark:bg-zinc-700">
                <ul class="py-2 text-sm text-zinc-700 dark:text-zinc-200" aria-labelledby="exportButton">
                    <li>
                        <a href="{{ route('export.santri.pdf') }}"
                            class="block px-4 py-2 hover:bg-zinc-100 dark:hover:bg-zinc-600 dark:hover:text-white">Pdf</a>
                    </li>
                    <li>
                        <a href="{{ route('export.santri.excel') }}"
                            class="block px-4 py-2 hover:bg-zinc-100 dark:hover:bg-zinc-600 dark:hover:text-white">Excel</a>
                    </li>
                    <li>
                        <a href="{{ route('export.santri.csv') }}"
                            class="block px-4 py-2 hover:bg-zinc-100 dark:hover:bg-zinc-600 dark:hover:text-white">Csv</a>
                    </li>
                </ul>
            </div>
            <a href="{{ route('santri.create') }}"
                class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                </svg>
                Tambah Santri
            </a>
        </div>
    </div>
    <section class="bg-white dark:bg-zinc-800 p-4 rounded-md border border-zinc-200 dark:border-zinc-700">
        @if (isset($success))
            {{ $success }}
        @endif

        <div class="bg-white dark:bg-zinc-800 relative sm:rounded-lg">
            <div>
                <table class="w-full text-sm text-left text-zinc-500 dark:text-zinc-400" id="pagination-table">
                    <thead class="text-xs text-zinc-700 uppercase bg-zinc-50 dark:bg-zinc-700 dark:text-zinc-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">
                                <span class="flex items-center">
                                    No <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>
                            </th>
                            <th scope="col" class="px-4 py-3">
                                <span class="flex items-center">
                                    Nama Lengkap <svg class="w-4 h-4 ms-1" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>
                            </th>
                            <th scope="col" class="px-4 py-3">
                                <span class="flex items-center">
                                    Jenis Kelamin <svg class="w-4 h-4 ms-1" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>
                            </th>
                            <th scope="col" class="px-4 py-3">
                                <span class="flex items-center">
                                    Tanggal Diperbarui <svg class="w-4 h-4 ms-1" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>
                            </th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @forelse ($santris as $santri)
                            <tr class="border-b border-zinc-200 dark:border-zinc-700" x-data="{ showHapus: false }">
                                <th scope="row"
                                    class="px-4 py-3 font-medium text-zinc-900 whitespace-nowrap dark:text-white">
                                    {{ $no }}</th>
                                <td class="px-4 py-3">{{ $santri->nama }}</td>
                                <td class="px-4 py-3">{{ $santri->jenis_kelamin }}</td>
                                <td class="px-4 py-3">{{ $santri->updated_at->diffForHumans() }}</td>
                                <td class="px-4 py-3 flex items-center justify-end">
                                    <button id="santri-{{ $santri->id }}-button"
                                        data-dropdown-toggle="santri-{{ $santri->id }}"
                                        class="inline-flex items-center p-0.5 text-sm font-medium text-center text-zinc-500 hover:text-zinc-800 rounded-lg focus:outline-none dark:text-zinc-400 dark:hover:text-zinc-100"
                                        type="button">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                            viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                    <div id="santri-{{ $santri->id }}"
                                        class="hidden z-10 w-44 bg-white rounded divide-y divide-zinc-100 shadow dark:bg-zinc-700 dark:divide-zinc-600 wasu">
                                        <ul class="py-1 text-sm text-zinc-700 dark:text-zinc-200"
                                            aria-labelledby="santri-{{ $santri->id }}-button">
                                            <li>
                                                <a href="{{ route('santri.edit', $santri->id) }}"
                                                    class="block py-2 px-4 hover:bg-zinc-100 dark:hover:bg-zinc-600 dark:hover:text-white">Edit</a>
                                            </li>
                                            <li>
                                                <button type="button" x-on:click="showHapus=!showHapus"
                                                    class="block w-full text-start py-2 px-4 hover:bg-zinc-100 dark:hover:bg-zinc-600 dark:hover:text-white">Hapus</button>
                                            </li>
                                        </ul>
                                    </div>
                                    <section tabindex="-1"
                                        class="items-center justify-center overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-dvh md:h-full hidden"
                                        :class="{ 'hidden': !showHapus, 'flex bg-black/60 ': showHapus }">
                                        <div class="relative p-4 w-full max-w-lg h-auto md:h-auto">
                                            <div class="relative p-4 bg-white rounded-lg dark:bg-zinc-800 md:p-8">
                                                <div class="mb-4 text-sm font-light text-zinc-500 dark:text-zinc-400">
                                                    <h3 class="mb-3 text-2xl font-bold text-zinc-900 dark:text-white">
                                                        Yakin Ingin Menghapus Data?<br>({{ $santri->nama }})</h3>
                                                    <p>
                                                        Data yang telah dihapus tidak akan bisa dikembalikan
                                                        kembali, sehingga pastikan Anda benar-benar yakin
                                                        sebelum melakukan penghapusan.
                                                    </p>
                                                </div>
                                                <div
                                                    class="justify-between items-center pt-0 space-y-4 sm:flex sm:space-y-0">
                                                    <div
                                                        class="items-center mt-3 flex flex-col sm:flex-row w-full justify-end gap-2">
                                                        <button id="close-modal" type="button"
                                                            class="py-2 px-4 w-full text-sm font-medium text-zinc-500 bg-white rounded-lg border border-zinc-200 sm:w-auto hover:bg-zinc-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-zinc-900 focus:z-10 dark:bg-zinc-700 dark:text-zinc-300 dark:border-zinc-500 dark:hover:text-white dark:hover:bg-zinc-600 dark:focus:ring-zinc-600 order-2 sm:order-1"
                                                            x-on:click="showHapus=!showHapus">Batal</button>
                                                        <form action="{{ route('santri.destroy', $santri->id) }}"
                                                            method="POST" class="order-1 sm:order-2 w-full">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="py-2 px-4 w-full text-sm font-medium rounded-lg border  sm:w-auto focus:ring-4 focus:outline-none focus:ring-primary-300 focus:z-10 bg-red-600 text-white border-red-500 hover:text-white hover:bg-red-500 focus:ring-red-600">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </td>
                            </tr>
                            @php
                                $no++;
                            @endphp
                        @empty
                            <tr class=" border-zinc-200 dark:border-zinc-700">
                                <td colspan="5" class="px-4 py-3 text-center">Data Kosong!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
        <script>
            if (document.getElementById("pagination-table") && typeof simpleDatatables.DataTable !== 'undefined') {
                const dataTable = new simpleDatatables.DataTable("#pagination-table", {
                    paging: true,
                    perPage: 5,
                    perPageSelect: [5, 10, 15, 20, 25],
                    sortable: true
                });
            }
        </script>
    @endpush
</x-layout>
