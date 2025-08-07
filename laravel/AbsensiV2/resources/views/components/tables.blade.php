<div class="bg-white p-6 rounded-lg shadow mb-8">
    <select id="filterSelect" class="mb-4 border rounded px-2 py-1">
        <option value="minggu" checked>1 Minggu Terakhir</option>
        <option value="bulan">1 Bulan Terakhir</option>
        <option value="tahun">1 Tahun Terakhir</option>
    </select>

    <h2 class="text-xl font-semibold mb-4">Riwayat Absensi Anda</h2>
    <table class="min-w-full table-auto text-sm">
        <thead class="bg-gray-100 text-left">
            <tr>
                <th class="px-4 py-2">Tanggal</th>
                <th class="px-4 py-2">Jam Absen Masuk</th>
                <th class="px-4 py-2">Jam Absen pulang</th>
                <th class="px-4 py-2">Nama</th>
                <th class="px-4 py-2">Status</th>
            </tr>
        </thead>
        <tbody id="absenBody">
            @include('components.tables_absens', ['data' => $dataabsen])
        </tbody>
    </table>
</div>

@if(Auth::user()->role==="HR")
<div class="bg-white p-6 rounded-lg shadow mb-8">
    <select id="filterSelectall" class="mb-4 border rounded px-2 py-1">
        <option value="minggu" checked>1 Minggu Terakhir</option>
        <option value="bulan">1 Bulan Terakhir</option>
        <option value="tahun">1 Tahun Terakhir</option>
    </select>
    <h2 class="text-xl font-semibold mb-4">Riwayat Absensi Staff </h2>
    <table class="min-w-full table-auto text-sm">
        <thead class="bg-gray-100 text-left">
            <tr>
                <th class="px-4 py-2">Tanggal</th>
                <th class="px-4 py-2">Jam Absen Masuk</th>
                <th class="px-4 py-2">Jam Absen pulang</th>
                <th class="px-4 py-2">Nama Staff</th>
                <th class="px-4 py-2">Status</th>
            </tr>
        </thead>
        <tbody id="absenAllBody">
            @include('components.tables_absens_all', ['dataall' => $dataall])
        </tbody>
    </table>
</div>
@endif




<div class="mb-8">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold">Pengajuan</h2>
        @if(Auth::user()->role==="Staff")
        <button onclick="openModalPengajuan()" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Ajukan</button>
        @endif
    </div>
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-medium mb-4">Riwayat Pengajuan</h3>
        <table class="min-w-full table-auto text-sm">
            <thead class="bg-gray-100">
                <tr>

                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Pengajuan</th>
                    <th class="px-4 py-2">Tanggal</th>
                    <th class="px-4 py-2">Alasan</th>
                    <th class="px-4 py-2">Status</th>
                    @if(Auth::user()->role==="HR")
                    <th class="px-4 py-2">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($pengajuan as $allpengajuan)
                @php
                $start = \Carbon\Carbon::parse($allpengajuan->start);
                $end = \Carbon\Carbon::parse($allpengajuan->end);
                $totalHari = $start->diffInDays($end) + 1;
                $status = strtolower($allpengajuan->status);
                $statusColors = [
                'waiting List' => 'bg-blue-100 text-blue-800',
                'approve' => 'bg-green-100 text-grenn-800',
                'not approved' => 'bg-red-100 text-red-800',
                ];
                $badgeClass = $statusColors[$status] ?? 'bg-gray-100 text-gray-800';
                @endphp
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-2">{{$allpengajuan->user->nama}}</td>
                    <td class="px-4 py-2">{{$allpengajuan->jenis_tickets}}</td>
                    <td class="px-4 py-2"> {{ $allpengajuan->start }} s/d {{ $allpengajuan->end }} <br>
                        <span class="text-sm text-gray-500">({{ $totalHari }} hari)</span>
                    </td>
                    <td class="px-4 py-2">{{$allpengajuan->alasan}}</td>
                    <td class="px-4 py-2">
                        <span class="inline-block px-2 py-1 rounded-full text-xs font-medium  {{ $badgeClass }}"> {{ ucfirst($allpengajuan->status) }}</span>
                    </td>
                    @if(Auth::user()->role==="HR")
                    <td class="px-4 py-2">
                        @if($allpengajuan->status==="Waiting List")
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-outline-warning"
                                onclick="handlePengajuanAction(1, 'approve')">Izinkan</button>
                            <button type="button" class="btn btn-outline-danger"
                                onclick="handlePengajuanAction(1, 'reject')">Tolak</button>
                        </div>
                        @endif
                        @if($allpengajuan->status==="Approve")
                        <span class="inline-block px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-grenn-800">Sudah Disetuji</span>
                        @endif
                        @if($allpengajuan->status==="not approved")
                        <span class="inline-block px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">Pengajuan Sudah Ditolak!</span>
                        @endif
                    </td>
                    @endif

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>