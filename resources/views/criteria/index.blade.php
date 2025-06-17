<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <nav class="mb-4 flex items-center text-sm text-zinc-500 dark:text-zinc-400">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-1 hover:underline">
            <svg aria-hidden="true"
                class="w-4 h-4 text-zinc-500 transition duration-75 dark:text-zinc-400 group-hover:text-zinc-900 dark:group-hover:text-white"
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
        <a href="{{ route('criteria.index') }}" class="flex items-center gap-1 hover:underline">
            Kriteria
        </a>
    </nav>
    <div class="flex flex-col md:flex-row items-center justify-between  mb-5">
        <div
            class="w-full  flex flex-col md:flex-row space-y-2 md:space-y-0  items-center justify-between  md:space-x-3 flex-shrink-0">
            <h1 class="text-2xl font-semibold">{{ $title }}</h1>
            <a href="{{ route('criteria.create') }}"
                class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                </svg>
                Tambah Kriteria
            </a>
        </div>
    </div>
    @if (session('success'))
        <div id="alert-3"
            class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 fixed top-20 right-7 max-w-full"
            role="alert">
            <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Sukses</span>
            <div class="ms-3 me-8 text-sm font-medium">
                {{ session('success') }}
            </div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif
    <section class="bg-white dark:bg-zinc-800 p-4 rounded-md border border-zinc-200 dark:border-zinc-800">
        <div class="relative sm:rounded-lg">
            <div class="">
                <table class="w-full text-sm text-left text-zinc-500 dark:text-zinc-400" id="pagination-table">
                    <thead class="text-xs text-zinc-700 uppercase bg-zinc-50 dark:bg-zinc-900 dark:text-zinc-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">
                                <span class="flex items-center">No
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>
                            </th>
                            <th scope="col" class="px-4 py-3">
                                <span class="flex items-center">Nama Kriteria
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>
                            </th>
                            <th scope="col" class="px-4 py-3">
                                <span class="flex items-center">Bobot
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>
                            </th>
                            <th scope="col" class="px-4 py-3">
                                <span class="flex items-center">Atribut
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
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
                        @forelse ($criterias as $criteria)
                            <tr class="border-b border-zinc-200 dark:border-zinc-700">
                                <th scope="row"
                                    class="px-4 py-3 font-medium text-zinc-900 whitespace-nowrap dark:text-white">
                                    {{ $no }}</th>
                                <td class="px-4 py-3">{{ $criteria->nama }}</td>
                                <td class="px-4 py-3">{{ $criteria->bobot }}</td>
                                <td class="px-4 py-3 capitalize">{{ $criteria->atribut }}</td>
                                <td class="px-4 py-3 flex items-center justify-end">
                                    <button id="criteria-{{ $no }}-button"
                                        data-dropdown-toggle="criteria-{{ $no }}"
                                        class="inline-flex items-center p-0.5 text-sm font-medium text-center text-zinc-500 hover:text-zinc-800 rounded-lg focus:outline-none dark:text-zinc-400 dark:hover:text-zinc-100"
                                        type="button">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                            viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                    <div id="criteria-{{ $no }}"
                                        class="hidden z-10 w-44 bg-white rounded divide-y divide-zinc-100 shadow dark:bg-zinc-700 dark:divide-zinc-600">
                                        <ul class="py-1 text-sm text-zinc-700 dark:text-zinc-200"
                                            aria-labelledby="criteria-{{ $no }}-button">
                                            <li>
                                                <a href="{{ route('criteria.edit', $criteria->id) }}"
                                                    class="block py-2 px-4 hover:bg-zinc-100 dark:hover:bg-zinc-600 dark:hover:text-white">Edit</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block py-2 px-4 hover:bg-zinc-100 dark:hover:bg-zinc-600 dark:hover:text-white">Hapus</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @php
                                $no++;
                            @endphp
                        @empty
                            <tr class=" border-zinc-200 dark:border-zinc-700">
                                <td colspan="4" class="px-4 py-3 text-center">Data Kosong!</td>
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
                });
            }
        </script>
    @endpush
</x-layout>
