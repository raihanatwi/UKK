@include('layout.header')
@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100 p-4">
    <div class="w-full max-w-2xl bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="bg-blue-600 text-white text-center py-4 text-lg font-semibold">
            Ajukan Perizinan
        </div>
        <div class="p-6">
            <form action="{{ route('perizinan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-gray-700 font-medium">Nama Siswa</label>
                    <input name="nama" type="text" class="w-full p-2 mt-1 border rounded bg-gray-100" value="{{ Auth::user()->name }}" disabled> 
                </div>
                <div>
                    <label class="block text-gray-700 font-medium">Nis</label>
                    <input name="nis_siswa" type="text" class="w-full p-2 mt-1 border rounded bg-gray-100" value="{{ Auth::user()->nis }}"  disabled> 
                </div>

                <div>
                    <label class="block text-gray-700 font-medium">Jenis Izin</label>
                    <select name="jenis_izin" class="w-full p-2 mt-1 border rounded focus:ring focus:ring-blue-300" required>
                        <option value="">Pilih Jenis Izin</option>
                        @foreach($jenisIzin as $jenis)
                            <option value="{{ $jenis }}">{{ $jenis }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium">Tanggal Izin</label>
                    <input type="date" name="tanggal_izin" class="w-full p-2 mt-1 border rounded focus:ring focus:ring-blue-300" value="{{ now()->toDateString() }}" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium">Keterangan</label>
                    <textarea name="keterangan" class="w-full p-2 mt-1 border rounded focus:ring focus:ring-blue-300" required></textarea>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium">Dokumen Pendukung</label>
                    <input type="file" name="dokumen_pendukung" class="w-full p-2 mt-1 border rounded focus:ring focus:ring-blue-300">
                    <small class="text-gray-500">Format: PDF, JPG, JPEG, PNG (Max: 2MB)</small>
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition duration-300">
                    Submit Perizinan
                </button>
            </form>
        </div>
    </div>
</div>

@include('layout.footer')