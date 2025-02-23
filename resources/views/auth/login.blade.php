@include('layout.header')

<div class="flex flex-col gap-4 items-center justify-center min-h-screen bg-gray-100">
    <div class="max-w-sm w-full bg-white shadow-md rounded-lg overflow-hidden">
        <div class="h-[600px] px-6 py-4 flex flex-col justify-between">
            

            <div class=" w-full place-items-center">
                <h1 class="font-extrabold text-[80px] relative text-blue-700 ">Dasi</h1>
                <h2 class="text-[20px] mt-[-15px] text- text-blue-950 font-medium">Data Siswa</h2>
            </div>
            <div class="">
                <h2 class="text-center text-2xl font-bold mb-4">Login</h2>
                <form method="POST" action="{{ route('authenticate') }}" class="w-full">
                    {{-- menginput email --}}
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                        <input type="email" name="email" id="email"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            required>
                    </div>
                    {{-- menginput password  --}}
                    <div class="mb-6">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" name="password" id="password"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            required>
                    </div>
                    {{-- tombol login --}}
                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="w-full bg-blue-400 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Login</button>
                    </div>
                </form>
                <div class="mt-4 text-center">
                    <h1 class="text-sm">Belum punya akun? <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Daftar</a></h1>
                </div>
            </div>
        </div>
    </div>
    @if (session()->has('message'))
        <div id="toast-warning"
            class="flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-700"
            role="alert">
            <div
                class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z" />
                </svg>
                <span class="sr-only">Warning icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ session('message') }}</div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                data-dismiss-target="#toast-warning" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif
</div>
@include('layout.footer')
