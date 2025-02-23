@include('layout.header')

@section('content')
<div class="container mx-auto p-6">
    <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="bg-blue-500 text-white px-6 py-4 flex justify-between items-center">
            <h5 class="text-lg font-semibold">Data Perizinan</h5>
            @if(Auth::user()->role === 'SISWA')
                <a href="{{ route('perizinan.create') }}" class="bg-white text-blue-500 px-4 py-2 rounded-lg font-semibold hover:bg-gray-200">Ajukan Izin</a>
            @endif
        </div>
        <div class="p-6">
            <table class="w-full border-collapse border border-gray-300 text-gray-700">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">No</th>
                        @if(Auth::user()->role === 'ADMIN')
                        <th class="border border-gray-300 px-4 py-2">Nama Siswa</th>
                        @endif
                        <th class="border border-gray-300 px-4 py-2">Jenis Izin</th>
                        <th class="border border-gray-300 px-4 py-2">Tanggal</th>
                        <th class="border border-gray-300 px-4 py-2">Status</th>
                        <th class="border border-gray-300 px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($perizinan as $index => $izin)
                    <tr class="hover:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $index + 1 }}</td>
                        @if(Auth::user()->role === 'ADMIN')
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $izin->nama }}</td>
                        @endif
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $izin->jenis_izin }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $izin->tanggal_izin->format('d/m/Y') }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <span class="px-3 py-1 rounded-full text-white 
                                {{ $izin->status === 'pending' ? 'bg-yellow-500' : ($izin->status === 'disetujui' ? 'bg-green-500' : 'bg-red-500') }}">
                                {{ ucfirst($izin->status) }}
                            </span>
                        </td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <a href="{{ route('perizinan.show', $izin) }}" class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-700">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $perizinan->links() }}
            </div>
        </div>
    </div>
</div>

@include('layout.footer')
