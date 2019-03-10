<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task as TaskRequest;
use App\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return response()->json($tasks);
    }

    public function store(TaskRequest $request)
    {
        $task = Task::create($request->all());

        return response()->json($task, 201);
    }

    public function show(Task $task)
    {
        return response()->json($task);
    }

    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->all());

        return response()->json($task, 202);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response(null,204);
    }
}
