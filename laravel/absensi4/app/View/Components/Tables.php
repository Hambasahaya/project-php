<?php

namespace App\View\Components;

use App\Models\Kelas;
use App\Models\Matakuliah;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Tables extends Component
{
    protected $data = [];
    public function __construct()
    {
        if (request()->routeIs('adminmatakuliah')) {
            $this->data = Matakuliah::all()->map->only(['id', 'nama_matakuliah', 'semester', 'foto_matakuliah'])->toArray();
        } elseif (request()->routeIs('adminkelas')) {
            $this->data = Kelas::with('dosen', 'matakuliah')->get()->map(function ($item) {
                return $item->only([
                    'id',
                    'kode_kelas',
                    'mata_kuliah',
                    'ruangan',
                    'jam_mulai',
                    'jam_selesai',
                    'hari',
                    'qrcode'
                ]) + [
                    'dosen' => $item->dosen?->only(['nama']),
                    'nama_matakuliah' => $item->matakuliah?->nama_matakuliah,
                ];
            });
        } elseif (request()->routeIs('adminMhs')) {
            $this->data = User::with('detail')
                ->where('role', 'mahasiswa')
                ->get()
                ->map(function ($user) {
                    return [
                        'id'      => $user->id,
                        'nama'    => $user->nama,
                        'email'   => $user->email,
                        'jurusan'   => $user->detail->jurusan ?? null,
                        'fakultas'   => $user->detail->fakultas ?? null,
                        'semester'   => $user->detail->semester ?? null,
                        'no_hp'   => $user->detail->no_hp ?? null,
                        'alamat'  => $user->detail->alamat ?? null,
                        'jenis_kelamin'  => $user->detail->jenis_kelamin ?? null,
                        "pendidikan_terakhir" => $user->detail->pendidikan_terakhir ?? null,
                        "foto" => $user->detail->foto ?? null,
                    ];
                })
                ->toArray();
        } elseif (request()->routeIs('adminDosen')) {
            $this->data = User::with('detail')
                ->where('role', 'dosen')
                ->get()
                ->map(function ($user) {
                    return [
                        'id'      => $user->id,
                        'nama'    => $user->nama,
                        'email'   => $user->email,
                        'nuptk'   => $user->detail->nuptk ?? null,
                        'no_hp'   => $user->detail->no_hp ?? null,
                        'alamat'  => $user->detail->alamat ?? null,
                        'jenis_kelamin'  => $user->detail->jenis_kelamin ?? null,
                        "pendidikan_terakhir" => $user->detail->pendidikan_terakhir ?? null,
                        "foto" => $user->detail->foto ?? null,
                    ];
                })
                ->toArray();
        } elseif (request()->routeIs('dosen.jadwal')) {
            $this->data = Kelas::with('dosen')
                ->where('dosen_pengampu', Auth::user()->id)
                ->get()
                ->map(function ($kelas) {
                    $matkul = Matakuliah::find($kelas->mata_kuliah);
                    return [
                        'id'              => $kelas->id,
                        'kode_kelas'      => $kelas->kode_kelas,
                        'ruangan'         => $kelas->ruangan,
                        'nama mata kuliah' => $matkul ? $matkul->nama_matakuliah : '-',
                        'jam_mulai'       => $kelas->jam_mulai,
                        'jam_selesai'     => $kelas->jam_selesai,
                        'hari'            => $kelas->hari,
                        'qrcode'          => $kelas->qrcode,
                        'nama dosen'      => $kelas->dosen->nama ?? '-',
                    ];
                })
                ->toArray();
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tables', ['data' => $this->data]);
    }
}
