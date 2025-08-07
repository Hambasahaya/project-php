<div class="container">
    <div class="row row-cols-2 ">
        @if(isset($data)&& $data!=null)
        @foreach($data as $jobsAll)
        <div class="col mt-4">
            <div class="card p-2 shadow-sm border-0 rounded-4 mb-4 overflow-hidden" style="max-width: 740px;">
                <div class="row g-0 align-items-center">
                    <div class="col-md-4 d-flex justify-content-center align-items-center bg-light p-3">
                        <img src="{{ asset('storage/foto_user/'.$jobsAll->perusahaan->foto) }}"
                            class="img-fluid rounded-circle border"
                            alt="Logo Perusahaan"
                            style="width: 120px; height: 120px; object-fit: cover;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-bold fs-5 text-primary">{{$jobsAll->judul_lowongan}}</h5>
                            <h6 class="card-subtitle mb-3 text-muted">{{$jobsAll->perusahaan->nama}}</h6>

                            <ul class="list-unstyled small mb-3">
                                <li><i class="bi bi-briefcase me-2"></i>{{$jobsAll->tipe_pekerjaan}}</li>
                                <li><i class="bi bi-geo-alt me-2"></i>{{$jobsAll->lokasi}}</li>
                                <li><i class="bi bi-currency-dollar me-2"></i>Rp{{number_format($jobsAll->gaji_minimum)}} - Rp{{number_format($jobsAll->gaji_maximum)}}</li>
                            </ul>

                            <div class="d-flex flex-wrap gap-2 mb-3">
                                @foreach($jobsAll->kategori_lowongan as $kategori)
                                <span class="badge bg-light text-dark border rounded-pill">{{$kategori}}</span>
                                @endforeach
                            </div>

                            <a href="{{ route('statusjobs', $jobsAll->id) }}" class="btn btn-primary btn-sm rounded-pill px-4">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>
</div>