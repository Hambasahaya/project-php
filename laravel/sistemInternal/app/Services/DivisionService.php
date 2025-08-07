<?php

namespace App\Services;

use App\Models\User;
use App\Models\Division;
use App\Models\Role;
use App\Services\AuthServices\AuthService;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DivisionService
{
    public static function createDivision(array $data)
    {
        try {
            $validator = Validator::make($data, [
                'nama_divisi'       => 'required|string|max:255|unique:divisions,nama_divisi',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with("gagal_divisi", "Periksa Kembali Inputan anda!");
            }
            $division = Division::create([
                'nama_divisi'        => $data['nama_divisi'],
            ]);
            return redirect()->back()->with("succsess_divisi", "Divisi Berhasil Ditambahkan!");
        } catch (\Throwable $e) {
            return redirect()->back()->with("gagal_divisi", $e->getMessage());
        }
    }


    public static function updateDivision($id, array $data): RedirectResponse
    {
        $validator = Validator::make($data, [
            'nama_divisi'       => 'required|string|max:255|unique:divisions,nama_divisi',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with("gagal_divisi", "Periksa Kembali Inputan anda!");
        }
        $division = Division::find($id);
        if (!$division) {
            return redirect()->back()->with("gagal_divisi", "divisi tidak ada");
        }

        $division->update(['nama_divisi' => $data['nama_divisi']]);
        return redirect()->back()->with("succsess_divisi", "divisi berhasil di update");
    }

    public static function deleteDivision($id): RedirectResponse
    {
        try {
            $division = Division::find($id);

            if (!$division) {
                return redirect()->back()->with("gagal_divisi", "Divisi tidak ditemukan!");
            }
            $userCount = User::where('division_id', $division->id)->count();
            if ($userCount > 0) {
                return redirect()->back()->with(
                    "gagal_divisi",
                    "Divisi ini masih digunakan oleh {$userCount} user dan tidak bisa dihapus!"
                );
            }

            $division->delete();
            return redirect()->back()->with("success_divisi", "Divisi berhasil dihapus.");
        } catch (\Exception $e) {
            return redirect()->back()->with("gagal_divisi", "Terjadi kesalahan: " . $e->getMessage());
        }
    }


    public static function getAllDivisions()
    {
        return Division::all();
    }
    public static function setKepalaDivisi($divisionId, $kepalaDivisiId): array
    {
        $division = Division::find($divisionId);
        if (!$division) {
            return ['success' => false, 'message' => 'Divisi tidak ditemukan.'];
        }

        $user = User::find($kepalaDivisiId);
        if (!$user) {
            return ['success' => false, 'message' => 'User kepala divisi tidak ditemukan.'];
        }

        $division->update(['kepala_divisi' => $kepalaDivisiId]);
        return ['success' => true, 'message' => 'Kepala divisi berhasil diperbarui.'];
    }
    public static function getDivisionById($id)
    {
        $division = Division::find($id);
        if (!$division) {
            return Response::json(['success' => false, 'message' => 'Divisi tidak ditemukan.'], 404);
        }

        return Response::json(['success' => true, 'data' => $division]);
    }
}
