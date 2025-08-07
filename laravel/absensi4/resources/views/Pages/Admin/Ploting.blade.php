@extends('Layouts.AdminLayout')

@section('content')
<div class="container">
    <h3 class="mb-4">Plotting Mahasiswa ke Kelas: <strong>{{ $kelas->kode_kelas }}</strong></h3>

    <form action="{{ route('plotingMahasiswa.store', $kelas->id) }}" method="POST">
        @csrf

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                Pilih Mahasiswa
            </div>
            <div class="card-body" style="max-height: 400px; overflow-y: auto;">
                <div class="row">
                    @forelse($mahasiswa as $mhs)
                    <div class="col-md-4 mb-2">
                        <div class="form-check border rounded px-3 py-2">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="mahasiswa[]"
                                value="{{ $mhs->id }}"
                                id="mhs_{{ $mhs->id }}"
                                {{ in_array($mhs->id, $selected) ? 'checked' : '' }}>
                            <label class="form-check-label" for="mhs_{{ $mhs->id }}">
                                {{ $mhs->nama }} <br><small class="text-muted">{{ $mhs->nim }}</small>
                            </label>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <p class="text-danger">Tidak ada mahasiswa ditemukan.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="mt-3 d-flex justify-content-between">
            <a href="{{ route('adminkelas') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection