@include ('layout.header')
<div class="flex">
    @include('layout.sidebar')


    <div class="w-full m-5 ">
        <div class="flex justify-between items-center">
            @if (auth()->user()->role == 'ADMIN')
                
            <a href="{{ route('siswa.create') }}" class=" bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 ">
                <i class="fa fa-plus"></i> Tambah
            </a>
            @endif

            <div class="">
                <form action="{{ route('siswa.index') }}" class=" flex pt-4 w-full" method="GET">

                    <button id="dropdown-button" data-dropdown-toggle="dropdown"
                        class="shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-800 bg-gray-50 border border-gray-300 rounded-s-lg"
                        type="button">All categories <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg></button>
                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44">
                        <ul class="py-2 text-sm text-gray-800" aria-labelledby="dropdown-button">
                            @foreach ($classes as $class)
                                <li>
                                    {{-- Menggunakan filter kelas --}}
                                    <a href="{{ route('siswa.index', ['kelas_siswa' => $class->kelas_siswa, 'search' => request()->query('search')]) }}"
                                        class="block px-4 py-2 hover:bg-gray-100 @if (request()->query('kelas_siswa') == $class->kelas_siswa) bg-gray-200 @endif">
                                        {{ $class->kelas_siswa }}
                                    </a>
                                    {{-- Menggunakan filter kelas --}}
                                </li>
                            @endforeach
                        </ul>
                    </div>


                    <div class="relative w-full" action="{{ route('siswa.index') }}" method="GET">
                        <input type="search" id="default-search" name="search"
                            class="block p-2.5 w-full z-20 text-sm text-gray-800 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 hover:bg-slate-200"
                            placeholder="Search " required />
                        <button type="submit"
                            class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-500 rounded-e-lg border  hover:bg-blue-700">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>



        <div class="flex relative overflow-x-auto shadow-md s">
            <table class="w-full text-sm text-left rtl:text-right text-gray-400 ">
                <thead class="text-xs text-white uppercase bg-gray-800">
                    <tr class="text-center">
                        <th scope="col" class="px-6 py-4">
                            Nama Siswa
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Kelas Siswa
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Nis
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($allSiswa->count() == 0)
                        <tr class="bg-white border-b border-gray-200">
                            <td colspan="4" class="text-center py-4">
                                <p class="text-gray-500 text-lg">
                                    Tidak ada data siswa yang dimaksud
                                </p>
                            </td>
                        </tr>
                    @endif

                    @foreach ($allSiswa as $siswa)
                        <tr class="text-center bg-white border-gray-200">
                            <td class="text-start px-9 py-3">{{ $siswa->nama_siswa }}</td>
                            <td>{{ $siswa->kelas_siswa }}</td>
                            <td>{{ $siswa->nis_siswa }}</td>
                            <td class="px-6 py-4 text-center">
                                <form action="{{ route('siswa.destroy', $siswa) }}" method="POST">
                                    <a href="{{ route('siswa.show', $siswa) }}" id="Detail"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                                    @if (auth()->user()->role == 'ADMIN')
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('siswa.edit', $siswa) }}"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                        <!-- Tombol untuk membuka modal -->
                                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                            class="font-medium text-red-600 dark:text-red-500 hover:underline"
                                            type="button">
                                            Delete
                                        </button>

                                        <!-- Modal Konfirmasi delete -->
                                        <div id="popup-modal" tabindex="-1"
                                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative w-full max-w-md max-h-full p-4">
                                                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                                    <button type="button"
                                                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="popup-modal">
                                                        <svg class="w-3 h-3" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <div class="p-4 text-center md:p-5">
                                                        <svg class="w-12 h-12 mx-auto mb-4 text-gray-400 dark:text-gray-200"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 20 20">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                        </svg>
                                                        <h3
                                                            class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                            Apakah anda yakin ingin menghapus data siswa ini?</h3>

                                                        <!-- Form Penghapusan -->
                                                        <form id="deleteForm"
                                                            action="{{ route('siswa.destroy', $siswa->id) }}"
                                                            method="POST" class="inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                                Yakin
                                                            </button>
                                                        </form>

                                                        <button data-modal-hide="popup-modal" type="button"
                                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                            Kembali
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </form>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('layout.footer')
