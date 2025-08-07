<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold mb-4">Absen Masuk</h2>
        @if($chek===false)
        <button class="w-full py-3 bg-red-500 text-white rounded hover:bg-red-600">Absen Masuk Belum Tersedia! <i class="bi bi-lock-fill"></i></button>
        @else
        @if($absenmasuk===null)
        <button onclick="openAbsenModals(this)" class="w-full py-3 bg-green-500 text-white rounded hover:bg-green-600" data-type="masuk">Absen Masuk</button>
        @else
        <h2 class="text-xl font-semibold mb-4 w-full py-3 bg-green-500 text-white rounded hover:bg-green-600">Absen Masuk sudah Dilakukan pada: {{ \Carbon\Carbon::parse($absenmasuk->tanggal_absen)->setTimeFromTimeString($absenmasuk->jam_masuk)->diffForHumans() }}</h2>
        @endif
        @endif
    </div>
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold mb-4">Absen Pulang</h2>
        @if($chek===false)
        <button class="w-full py-3 bg-red-500 text-white rounded hover:bg-red-600">Absen pulang Belum Tersedia! <i class="bi bi-lock-fill"></i></button>
        @else
        @if($absenpulang===null)
        <button onclick="alert('Anda absen pulang pada ${new Date().toLocaleTimeString()}')" class="w-full py-3 bg-yellow-500 text-white rounded hover:bg-yellow-600" data-type="masuk">Absen Pulang</button>
        @else
        <h2 class="text-xl font-semibold mb-4 w-full py-3 bg-green-500 text-white rounded hover:bg-green-600">Absen pulang sudah Dilakukan pada: {{ \Carbon\Carbon::parse($absenpulang->tanggal_absen)->setTimeFromTimeString($absenpulang->jam_pulang)->diffForHumans() }}</h2>
        @endif
        @endif
    </div>
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold mb-4">{{Auth::user()->role==="HR"?"Staff":"Verifikasi Face Recognition"}}</h2>
        @if($chek===false)
        <button onclick="faceveriv()" class="w-full py-3 bg-blue-500 text-white rounded hover:bg-blue-600">face recognition Record</button>
        @endif
        @if($chek===true)
        <button class="w-full py-3 bg-blue-500 text-white rounded hover:bg-blue-600">face recognition Record Berhasil! <i class="bi bi-check-circle"></i></button>
        @endif
        @if(Auth::user()->role==="HR")
        <button onclick="openRegisterModal()" class="w-full py-3 bg-blue-500 text-white rounded hover:bg-blue-600">Daftarkan Staff</button>
        @endif
    </div>
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold mb-4">Rekap Absen</h2>
        <form action="{{ route('rekap.absen.export') }}" method="GET" class="d-flex flex-column gap-2">
            <div class="mb-3 d-flex">
                <select name="range" class="form-select" required>
                    <option value="minggu">1 Minggu Terakhir</option>
                    <option value="bulan">1 Bulan Terakhir</option>
                    <option value="tahun">1 Tahun Terakhir</option>
                </select>
            </div>

            @if(Auth::user()->role !== 'HR')
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            @endif

            <div class="mb-3 d-flex">
                <button class="btn btn-success w-100" type="submit">Export Rekap ke Excel</button>
            </div>
        </form>
    </div>



</div>