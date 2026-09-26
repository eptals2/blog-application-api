<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskWebController extends Controller
{
    public function index()
    {
        $tasks = Task::with(['project', 'employee'])
            ->latest()
            ->paginate(10);

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $projects = Project::orderBy('name')->get();
        $employees = Employee::orderBy('name')->get();

        return view('tasks.create', compact(
            'projects',
            'employees'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_id' => ['required', 'exists:projects,id'],
            'employee_id' => ['nullable', 'exists:employees,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'due_date' => ['required', 'date'],
            'priority' => ['required', 'in:low,medium,high'],
            'status' => ['required', 'in:pending,ongoing,completed'],
        ]);

        if (
            $validated['status'] === 'completed' &&
            empty($validated['employee_id'])
        ) {
            return back()
                ->withErrors([
                    'employee_id' =>
                        'A task cannot be completed without an assigned employee.',
                ])
                ->withInput();
        }

        Task::create($validated);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task created successfully.');
    }

    public function edit(Task $task)
    {
        $projects = Project::orderBy('name')->get();
        $employees = Employee::orderBy('name')->get();

        return view('tasks.edit', compact(
            'task',
            'projects',
            'employees'
        ));
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'project_id' => ['required', 'exists:projects,id'],
            'employee_id' => ['nullable', 'exists:employees,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'due_date' => ['required', 'date'],
            'priority' => ['required', 'in:low,medium,high'],
            'status' => ['required', 'in:pending,ongoing,completed'],
        ]);

        if (
            $validated['status'] === 'completed' &&
            empty($validated['employee_id'])
        ) {
            return back()
                ->withErrors([
                    'employee_id' =>
                        'A task cannot be completed without an assigned employee.',
                ])
                ->withInput();
        }

        $task->update($validated);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task deleted successfully.');
    }
}
