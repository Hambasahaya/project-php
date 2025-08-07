<?php

namespace App\Http\Controllers;

use App\Services\LeaveService;
use Illuminate\Http\Request;
use App\Services\PengajuanService;

class LeaveController extends Controller
{
    protected $service;

    public function __construct(LeaveService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return response()->json($this->service->getPengajuans());
    }

    public function addPengajuan(Request $request)
    {
        try {
            $this->service->store($request);
            return back()->with('pengajuans_success', "Pengajuan diproses");
        } catch (\Exception $e) {
            return back()->with('pengajuans_fail', $e->getMessage());
        }
    }

    public function approve($id)
    {
        return $this->service->approve($id);

        // if (isset($result['error'])) {
        //     return response()->json(['message' => $result['error']], 400);
        // }

        // return response()->json(['message' => $result['message']]);
    }

    public function reject($id)
    {
        $result = $this->service->reject($id);

        if (isset($result['error'])) {
            return response()->json(['message' => $result['error']], 400);
        }

        return response()->json(['message' => $result['message']]);
    }
}
