<?php

namespace App\Services;

use App\Models\Task;
use App\Models\User;
use App\Models\Division;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class TaskService
{
    public static function createTask(array $data): RedirectResponse
    {
        try {
            $validator = Validator::make($data, [
                'judul'            => 'required|string|max:255|unique:tasks,judul',
                'deskripsi'        => 'nullable|string|unique:tasks,deskripsi',
                'deadline' => 'required|date',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->with('gagal_task', "perikas lagi inputan anda!");
            }
            $task = [
                'division_id' => Auth::user()->division_id,
                'user_id'       => Auth::user()->id,
                'judul'     => $data["judul"],
                'deskripsi'     => $data["deskripsi"],
                'tanggal_deadline' => $data["deadline"],
                "status_task" => "On Progres"
            ];
            Task::create($task);
            return redirect()->back()->with("success_task", "Tugas dengan judul {$data["judul"]} berhasil dibuat.");
        } catch (\Exception $e) {
            return redirect()->back()->with("gagal_task", $e->getMessage());
        }
    }


    public static function updateTask($id, array $data): RedirectResponse
    {
        $task = Task::find($id);
        if (!$task) {
            return redirect()->back()->with("gagal_task", "Data Tugas tidak ditemukan");
        }

        $validator = Validator::make($data, [
            'judul'       => 'required|string|max:255|unique:tasks,judul,' . $task->id,
            'deskripsi'   => 'required|string|unique:tasks,deskripsi,' . $task->id,
            'deadline'    => 'required|date',
            'status_task' => 'required|string|in:On Progres,In Revision,On Review,Done',
            'file_tugas'  => 'nullable|file',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('gagal_task', "periksa lagi inputan anda!");
        }

        if (isset($data['file_tugas']) && is_file($data['file_tugas'])) {
            $task->file_tugas = FileService::upload($data['file_tugas'], "file_task");
        }

        $task->judul = $data['judul'];
        $task->deskripsi = $data['deskripsi'];
        $task->tanggal_deadline = $data['deadline'];
        $task->status_task = $data['status_task'];
        $task->save();
        return redirect()->back()->with('success_task', 'Tugas berhasil diperbarui.');
    }


    public static function deleteTask($id): RedirectResponse
    {
        $task = Task::find($id);
        if (!$task) {
            return redirect()->back()->with('gagal_task', 'Tugas tidak ditemukan');
        }

        $task->delete();
        return redirect()->back()->with('success_task', 'Tugas berhasil dihapus');
    }

    public static function getTaskById($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return Response::json(['success' => false, 'message' => 'Tugas tidak ditemukan.'], 404);
        }

        return Response::json(['success' => true, 'data' => $task]);
    }
    public static function getTaskUser()
    {
        return Task::where('user_id', Auth::user()->id)->get();
    }

    public static function getAllTasks()
    {
        return Task::with(['division', 'user'])->get();
    }

    public static function updateTaskStatus($id, $status): array
    {
        $task = Task::find($id);
        if (!$task) {
            return ['success' => false, 'message' => 'Tugas tidak ditemukan.'];
        }

        $validStatuses = ['pending', 'on_progress', 'done'];
        if (!in_array($status, $validStatuses)) {
            return ['success' => false, 'message' => 'Status tidak valid.'];
        }

        $task->status_task = $status;
        $task->save();

        return ['success' => true, 'message' => 'Status tugas berhasil diperbarui.'];
    }

    public static function getAllTugasByDivisi($divisionId)
    {
        $tasks = Task::with(['division', 'user'])
            ->where('division_id', $divisionId)
            ->get();

        return Response::json(['success' => true, 'data' => $tasks]);
    }
    public static function getAllTugasUserInDivisi($divisionId, $userId)
    {
        $tasks = Task::with(['division', 'user'])
            ->where('division_id', $divisionId)
            ->where('user_id', $userId)
            ->get();

        return Response::json(['success' => true, 'data' => $tasks]);
    }
}
