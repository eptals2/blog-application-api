@extends('layouts.app')

@section('title', 'Tasks')

@section('content')

<div class="mx-auto max-w-7xl px-6 py-8">

    <div class="mb-6 flex items-center justify-between">

        <div>
            <h1 class="text-3xl font-bold">
                Tasks
            </h1>

            <p class="text-gray-500">
                Manage project tasks
            </p>
        </div>

        <a
            href="{{ route('tasks.create') }}"
            class="rounded-lg bg-blue-600 px-4 py-2 text-white"
        >
            + Create Task
        </a>

    </div>

    @if(session('success'))
        <div class="mb-6 rounded-lg bg-green-100 p-4 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-hidden rounded-xl border bg-white">

        <table class="w-full">

            <thead class="bg-gray-50">

                <tr>
                    <th class="px-5 py-4 text-left">Task</th>
                    <th class="px-5 py-4 text-left">Project</th>
                    <th class="px-5 py-4 text-left">Employee</th>
                    <th class="px-5 py-4 text-left">Due Date</th>
                    <th class="px-5 py-4 text-left">Priority</th>
                    <th class="px-5 py-4 text-left">Status</th>
                    <th class="px-5 py-4 text-right">Actions</th>
                </tr>

            </thead>

            <tbody>

                @forelse($tasks as $task)

                    <tr class="border-t">

                        <td class="px-5 py-4 font-medium">
                            {{ $task->title }}
                        </td>

                        <td class="px-5 py-4">
                            {{ $task->project?->name }}
                        </td>

                        <td class="px-5 py-4">
                            {{ $task->employee?->name ?? 'Unassigned' }}
                        </td>

                        <td class="px-5 py-4">
                            {{ $task->due_date }}
                        </td>

                        <td class="px-5 py-4 capitalize">
                            {{ $task->priority }}
                        </td>

                        <td class="px-5 py-4 capitalize">
                            {{ $task->status }}
                        </td>

                        <td class="px-5 py-4">
                            <div class="flex justify-end gap-2">

                                <a
                                    href="{{ route('tasks.edit', $task) }}"
                                    class="rounded bg-yellow-500 px-3 py-1 text-sm text-white"
                                >
                                    Edit
                                </a>

                                <form
                                    method="POST"
                                    action="{{ route('tasks.destroy', $task) }}"
                                    onsubmit="return confirm('Delete this task?')"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="rounded bg-red-600 px-3 py-1 text-sm text-white"
                                    >
                                        Delete
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td
                            colspan="7"
                            class="px-5 py-10 text-center text-gray-500"
                        >
                            No tasks found.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-6">
        {{ $tasks->links() }}
    </div>

</div>

@endsection
