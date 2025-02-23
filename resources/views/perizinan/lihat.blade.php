@include('layout.header')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Perizinan</div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Nama Siswa:</strong>
                        <p>{{ $perizinan->nama }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Jenis Izin:</strong>
                        <p>{{ $perizinan->jenis_izin }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Tanggal Izin:</strong>
                        <p>{{ $perizinan->tanggal_izin->format('d/m/Y') }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Keterangan:</strong>
                        <p>{{ $perizinan->keterangan }}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Status:</strong>
                        <p>
                            <span class="badge bg-{{ $perizinan->status === 'pending' ? 'warning' : ($perizinan->status === 'disetujui' ? 'success' : 'danger') }}">
                                {{ ucfirst($perizinan->status) }}
                            </span>
                        </p>
                    </div>
                    @if($perizinan->dokumen_pendukung)
                    <div class="mb-3">
                        <strong>Dokumen Pendukung:</strong>
                        <p><a href="{{ Storage::url($perizinan->dokumen_pendukung) }}" target="_blank" class="btn btn-sm btn-secondary">Lihat Dokumen</a></p>
                    </div>
                    @endif
                    @if($perizinan->catatan_admin)
                    <div class="mb-3">
                        <strong>Catatan Admin:</strong>
                        <p>{{ $perizinan->catatan_admin }}</p>
                    </div>
                    @endif

                    @if(Auth::user()->role === 'ADMIN' && $perizinan->status === 'pending')
                    <form action="{{ route('perizinan.updateStatus', $perizinan) }}" method="POST" class="mt-4">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label class="form-label">Update Status</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                                <option value="disetujui">Disetujui</option>
                                <option value="ditolak">Ditolak</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Catatan Admin</label>
                            <textarea name="catatan_admin" class="form-control @error('catatan_admin') is-invalid @enderror" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Status</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection