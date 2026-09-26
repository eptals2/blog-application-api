<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignTaskRequest;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();

        return response()->json([
            'tasks' => $tasks,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $validated = $request->validated();

        $task = Task::create($validated);

        return response()->json([
            'message' => 'Task created successfully',
            'task' => $task->load([
                'project',
                'employee',
            ]),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::findOrFail($id);

        return response()->json([
            'task' => $task,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, string $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->validated());

        return response()->json([
            'message' => 'Task updated successfully',
            'task' => $task->load([
                'project',
                'employee',
            ]),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json([
            'message' => 'Task deleted successfully',
        ], 200);
    }
    public function assignTask(AssignTaskRequest $request, string $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->validated());

        return response()->json([
            'message' => 'Employee assigned to task successfully',
            'task' => $task->load([
                'project',
                'employee',
            ]),
        ], 200);
    }
}
