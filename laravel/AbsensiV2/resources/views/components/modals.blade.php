<div id="modal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white w-full max-w-lg p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4">Form Pengajuan</h2>
        <form id="pengajuanForm" class="space-y-4" action="{{route('pengajuan.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label class="block mb-1 font-medium">Jenis Pengajuan</label>
                <select name="jenis_tickets" required class="w-full border rounded p-2">
                    <option value="">-- Pilih --</option>
                    <option value="cuti">Cuti</option>
                    <option value="izin">Izin</option>
                    <option value="sakit">Sakit</option>
                </select>
            </div>
            <div>
                <label class="block mb-1 font-medium">Tanggal Mulai</label>
                <input type="date" name="start" required class="w-full border rounded p-2">
            </div>
            <div>
                <label class="block mb-1 font-medium">Tanggal Selesai</label>
                <input type="date" name="end" required class="w-full border rounded p-2">
            </div>
            <div>
                <label class="block mb-1 font-medium">Alasan</label>
                <textarea name="alasan" rows="2" required class="w-full border rounded p-2"></textarea>
            </div>
            <div>
                <label class="block mb-1 font-medium">Upload Bukti (optional)</label>
                <input type="file" name="bukti" class="w-full border rounded p-2" />
            </div>
            <div class="flex justify-end gap-2">
                <button type="button" id="batalBtn" class="px-4 py-2 bg-gray-500 text-white rounded">Batal</button>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Kirim</button>
            </div>
        </form>
    </div>
</div>



<div id="registerModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md relative p-6">
        <h2 class="text-xl font-bold mb-4">Registrasi Staff Baru</h2>
        <form id="registerForm" class="space-y-4">
            <input name="name" type="text" required placeholder="Nama" class="w-full border px-3 py-2 rounded">
            <input name="email" type="email" required placeholder="Email" class="w-full border px-3 py-2 rounded">
            <input name="password" type="password" required placeholder="Password" class="w-full border px-3 py-2 rounded">
            <div class="flex justify-end space-x-2 pt-2">
                <button type="button" onclick="closeRegisterModal()" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Daftar</button>
            </div>
        </form>
    </div>
</div>




<div id="absenmodals" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md relative p-6">
        <h2 class="text-xl font-bold mb-4"></h2>
        <div class="relative aspect-video mb-4">
            <video id="absenVideo" autoplay muted class="rounded w-full h-full"></video>
            <canvas id="absenCanvas" class="absolute top-0 left-0 w-full h-full pointer-events-none"></canvas>
        </div>
        <form id="absenForm" class="space-y-4">
            <div class="flex justify-end space-x-2 pt-2">
                <button type="button" onclick="closeAbsenmodal()" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Absen</button>
            </div>
        </form>
    </div>
</div>






<div id="faceverif" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md relative p-6">
        <h2 class="text-xl font-bold mb-4">Verivikasi Wajah Anda</h2>
        <div class="relative aspect-video mb-4">
            <video id="verifVideo" autoplay muted class="rounded w-full h-full"></video>
            <canvas id="verifCanvas" class="absolute top-0 left-0 w-full h-full pointer-events-none"></canvas>
        </div>
        <form id="faceverifform" class="space-y-4">
            <div class="flex justify-end space-x-2 pt-2">
                <button type="button" onclick="closefaceverif()" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Daftar</button>
            </div>
        </form>
    </div>
</div>