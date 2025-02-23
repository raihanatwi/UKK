@include('layout.header')
<div class="w-full flex">
    @include('layout.sidebar')
    <div class="w-full flex flex-col items-start  h-screen relative  ">
        <div class="w-full bg-gray-700 flex justify-between items-center p-3">
            <a href="{{ route('siswa.index') }}" class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-7  text-white">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                </svg>
            </a>
            <h3 class="font-extrabold text-white text-[25px]">Detail {{ $siswa->nama_siswa }}</h3>
            <div class="w-[24px]"></div> <!-- Placeholder to balance the flex layout -->
        </div>
        <table class="justify-items-start pt-7 px-5 w-full flex  ">
            <tbody class="text-[22px] bg-gray-200 w-full p-5 rounded-lg ">
                <tr class="">
                    <td class="w-[200px] font-bold pr-4">Nama Siswa</td>
                    <td class="w-[2px] pr-2">:</td>
                    <td>{{ $siswa->nama_siswa }}</td>
                </tr>
                <tr class="">
                    <td class="w-[200px] font-bold pr-4">Kelas</td>
                    <td class="w-[2px] pr-2">:</td>
                    <td>{{ $siswa->kelas_siswa }}</td>
                </tr>
                <tr>
                    <td class="w-[200px] font-bold pr-4">Nis Siswa</td>
                    <td class="w-[2px] pr-2">:</td>
                    <td>{{ $siswa->nis_siswa }}</td>
                </tr>
                <tr>
                    <td class="w-[200px] font-bold pr-4">Nisn Siswa</td>
                    <td class="w-[2px] pr-2">:</td>
                    <td>{{ $siswa->nisn_siswa }}</td>
                </tr>
                <tr>
                    <td class="w-[200px] font-bold pr-4">Tempat Lahir</td>
                    <td class="w-[2px] pr-2">:</td>
                    <td>{{ $siswa->tempat_lahir_siswa }}</td>
                </tr>
                <tr>
                    <td class="w-[200px] font-bold pr-4">Tanggal Lahir</td>
                    <td class="w-[2px] pr-2">:</td>
                    <td>{{ $siswa->tanggal_lahir_siswa }}</td>
                </tr>
                <tr>
                    <td class="w-[200px] font-bold pr-4">Jenis Kelamin</td>
                    <td class="w-[2px] pr-2">:</td>
                    <td>{{ $siswa->jenis_kelamin_siswa }}</td>
                </tr>
                <tr>
                    <td class="w-[200px] font-bold pr-4">Alamat Siswa</td>
                    <td class="w-[2px] pr-2">:</td>
                    <td>{{ $siswa->alamat_siswa }}</td>
                </tr>
                <tr>
                    <td class="w-[200px] font-bold pr-4">Kelurahan</td>
                    <td class="w-[2px] pr-2">:</td>
                    <td>{{ $siswa->kelurahan_siswa }}</td>
                </tr>
                <tr>
                    <td class="w-[200px] font-bold pr-4">Kecamatan</td>
                    <td class="w-[2px] pr-2">:</td>
                    <td>{{ $siswa->kecamatan_siswa }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    @include('layout.footer')
