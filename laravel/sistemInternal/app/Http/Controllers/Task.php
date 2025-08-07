<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Http\Request;

class Task extends Controller
{
    public function AddNewTask(Request $request)
    {
        return TaskService::createTask($request->only('judul', "deskripsi", "deadline"));
    }
    public function getTaskByid($id)
    {
        return TaskService::getTaskById($id);
    }
    public function UpdateTask($id, Request $request)
    {
        return TaskService::updateTask($id, $request->all());
    }
    public function Deletetask($id)
    {
        return TaskService::deleteTask($id);
    }
}
