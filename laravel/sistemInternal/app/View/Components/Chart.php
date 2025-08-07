<?php

namespace App\View\Components;

use App\Models\Absen;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
use App\Models\Task;
use Carbon\Carbon;

class Chart extends Component
{
    public array $chartData;

    public function __construct()
    {
        $user = Auth::user();
        $this->chartData = [];

        if ($user->role->role_name === 'hr') {
            $this->chartData['absensi_hr_week'] = $this->getAbsensiByUser($user->id, 'week');
            $this->chartData['absensi_week'] = $this->getallAbsensiByUser('week');
            $this->chartData['absensi_divisi_month'] = $this->getAbsensiAllDivisi('month');
            $this->chartData['task_hr'] = $this->getTaskByUser($user->id);
            $this->chartData['task_divisi'] = $this->getTaskAllDivisi();
            $this->chartData['total_task_per_divisi'] = $this->getTotalTaskPerDivisi();
        } else {
            $this->chartData['absensi_user_week'] = $this->getAbsensiByUser($user->id, 'week');
            $this->chartData['absensi_user_month'] = $this->getAbsensiByUser($user->id, 'month');
            $this->chartData['task_user'] = $this->getTaskByUser($user->id);
        }

        $this->chartData['jam_masuk_user'] = $this->getJamMasukByUserPerDay($user->id);
    }

    public function render(): View|Closure|string
    {
        return view('components.chart', [
            'chartData' => $this->chartData
        ]);
    }

    private function getallAbsensiByUser($range)
    {
        $start = $range === 'week' ? Carbon::now()->startOfWeek() : Carbon::now()->startOfMonth();
        $end = Carbon::now()->endOfDay();

        return Absen::whereBetween('tanggal', [$start, $end])
            ->selectRaw('DATE(tanggal) as tanggal, COUNT(*) as total')
            ->groupBy('tanggal')
            ->pluck('total', 'tanggal')
            ->toArray();
    }

    private function getAbsensiByUser($userId, $range)
    {
        $start = $range === 'week' ? Carbon::now()->startOfWeek() : Carbon::now()->startOfMonth();
        $end = Carbon::now()->endOfDay();

        return Absen::where('user_id', $userId)
            ->whereBetween('tanggal', [$start, $end])
            ->selectRaw('DATE(tanggal) as tanggal, COUNT(*) as total')
            ->groupBy('tanggal')
            ->pluck('total', 'tanggal')
            ->toArray();
    }

    private function getAbsensiAllDivisi($range)
    {
        $start = $range === 'week' ? Carbon::now()->startOfWeek() : Carbon::now()->startOfMonth();
        $end = Carbon::now()->endOfDay();

        return Absen::with('user.divisi')
            ->whereBetween('tanggal', [$start, $end])
            ->get()
            ->groupBy(fn($a) => optional($a->user->divisi)->nama_divisi ?? 'Tanpa Divisi')
            ->map(fn($group) => $group->count())
            ->toArray();
    }

    private function getTaskByUser($userId)
    {
        return Task::where('user_id', $userId)
            ->selectRaw('status_task, COUNT(*) as total')
            ->groupBy('status_task')
            ->pluck('total', 'status_task')
            ->toArray();
    }

    private function getTaskAllDivisi()
    {
        $tasks = Task::with('user.divisi')->get();
        $result = [];

        foreach ($tasks as $task) {
            $divisi = $task->user->divisi->nama_divisi ?? 'Tanpa Divisi';
            $status = $task->status_task ?? 'Tanpa Status';

            if (!isset($result[$divisi])) {
                $result[$divisi] = [];
            }

            if (!isset($result[$divisi][$status])) {
                $result[$divisi][$status] = 0;
            }

            $result[$divisi][$status]++;
        }

        return $result;
    }

    private function getTotalTaskPerDivisi()
    {
        $divisiTasks = $this->getTaskAllDivisi();
        $total = [];

        foreach ($divisiTasks as $divisi => $statuses) {
            $total[$divisi] = array_sum($statuses);
        }

        return $total;
    }

    private function convertTimeToDecimal($time)
    {
        list($hours, $minutes, $seconds) = explode(':', $time);
        return round($hours + ($minutes / 60), 2); // contoh: 08:15:00 → 8.25
    }

    private function getJamMasukByUserPerDay($userId)
    {
        $data = Absen::where('user_id', $userId)
            ->selectRaw('DATE(tanggal) as tanggal, TIME(jam_masuk) as jam')
            ->orderBy('tanggal')
            ->get();

        $result = [];

        foreach ($data as $item) {
            $result[$item->tanggal] = $this->convertTimeToDecimal($item->jam);
        }

        return $result;
    }
}
