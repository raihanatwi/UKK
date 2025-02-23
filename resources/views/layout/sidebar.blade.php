    {{-- Pembuka Membuat UI SIDEBAR --}}

    <aside class="w-64  sticky top-[-5px] h-screen rounded-2xl transition-transform -translate-x-full sm:translate-x-0 "
        aria-label="Sidebar">
        <div class="flex flex-col h-full bg-gray-100 shadow-lg ">
            <div class=" w-[200px] place-items-center">
                <h1 class="font-extrabold text-[40px] relative text-blue-700 ">Dasi</h1>
                <h2 class="mt-[-15px] text- text-blue-950 font-medium">Data Siswa</h2>
            </div>
            <div class="h-screen px-3 py-4 overflow-y-auto bg-gray-100 flex-1">
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="{{ route('siswa.index') }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg  hover:text-gray-200 hover:bg-gray-700 group">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 0 1-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0 1 12 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                              </svg>
                              
                            <span class="ms-3">Data Siswa</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('perizinan.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg  hover:text-gray-200 hover:bg-gray-700 group">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 0 1-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0 1 12 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                              </svg>         
                            <span class="ms-3">Absen</span>
                        </a>
                    </li> 
                    {{-- @if (auth()->user()->role === 'ADMIN')
                        <li>
                            <a href="{{ route('perizinan.show' )  }}" 
                               class="flex items-center p-2 text-gray-900 rounded-lg hover:text-gray-200 hover:bg-gray-700 group">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 0 1-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0 1 12 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                                </svg>
                                <span class="ms-3">Perizinan</span>
                            </a>
                        </li>
                    @endif     --}}
                </ul>
            </div>
            <div class="w-full flex justify-center relative">
                <div id="dropdown-menu" name="dropdown-menu"
                    class="absolute z-10 inline-block w-[200px] text-sm text-gray-500 transition-opacity duration-700 bg-white border border-gray-200 rounded-lg shadow-xs bottom-full mb-2">
                    <div class="w-full p-4 text-xl">
                        <p class=" text-base font-semibold leading-none text-gray-900">
                            {{ auth()->user()->name }}
                        </p>
                        <p class="mb-3 text-sm font-normal">
                            {{ auth()->user()->email }}
                        </p>
                    </div>
                    <div class="p-4">
                        <a data-modal-target="Keluar" data-modal-toggle="Keluar"
                            class="flex items-center p-2 text-gray-900 rounded-lg hover:text-gray-200 hover:bg-gray-700 group cursor-pointer"
                            href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Logout</span>
                        </a>
                    </div>
                </div>
                <button id="dropdown-button" type="button"
                    class="text-white bg-gray-800 hover:bg-gray-500 focus:outline-none font-medium w-full text-sm px-5 py-2.5 text-center">User
                    profile
                </button>
            </div>
    </aside>


    <div id="Keluar" name="Keluar" data-modal tabindex="-1"
    class="hidden fixed top-0 right-0 left-0 z-50  justify-center items-center w-full h-screen bg-black bg-opacity-50">
    <div class="relative p-4 w-full max-w-md">
        <div class="relative bg-gray-800 rounded-lg shadow-sm">

            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2"
                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500">Yakin ingin keluar dari akun
                    ini?</h3>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" data-modal-hide="Keluar"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Yakin
                    </button>
                </form>
                <button data-modal-hide="Keluar" type="button"
                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:ring-4 focus:ring-gray-100">
                    Kembali
                </button>
            </div>
        </div>
    </div>
</div>
    {{-- Penutup Membuat Sidebar --}}

    {{-- Membuat script popover untuk button user profile --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var dropdownMenu = document.getElementById('dropdown-menu');
            dropdownMenu.classList.add('hidden', 'opacity-0', 'invisible');

            document.getElementById('dropdown-button').addEventListener('click', function() {
                dropdownMenu.classList.toggle('hidden');
                dropdownMenu.classList.toggle('opacity-0');
                dropdownMenu.classList.toggle('invisible');
            });
        });

    </script>
