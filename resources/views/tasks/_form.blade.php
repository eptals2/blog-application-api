<div class="space-y-5">

    <div>
        <label class="mb-1 block font-medium">
            Project
        </label>

        <select
            name="project_id"
            required
            class="w-full rounded-lg border px-4 py-2"
        >
            <option value="">Select project</option>

            @foreach($projects as $project)
                <option
                    value="{{ $project->id }}"
                    @selected(old('project_id', $task->project_id ?? '') == $project->id)
                >
                    {{ $project->name }}
                </option>
            @endforeach
        </select>

        @error('project_id')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="mb-1 block font-medium">
            Employee
        </label>

        <select
            name="employee_id"
            class="w-full rounded-lg border px-4 py-2"
        >
            <option value="">Unassigned</option>

            @foreach($employees as $employee)
                <option
                    value="{{ $employee->id }}"
                    @selected(old('employee_id', $task->employee_id ?? '') == $employee->id)
                >
                    {{ $employee->name }}
                </option>
            @endforeach
        </select>

        @error('employee_id')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="mb-1 block font-medium">
            Title
        </label>

        <input
            name="title"
            value="{{ old('title', $task->title ?? '') }}"
            required
            class="w-full rounded-lg border px-4 py-2"
        >

        @error('title')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="mb-1 block font-medium">
            Description
        </label>

        <textarea
            name="description"
            rows="4"
            class="w-full rounded-lg border px-4 py-2"
        >{{ old('description', $task->description ?? '') }}</textarea>
    </div>

    <div>
        <label class="mb-1 block font-medium">
            Due Date
        </label>

        <input
            type="date"
            name="due_date"
            value="{{ old('due_date', isset($task) && $task->due_date ? \Illuminate\Support\Carbon::parse($task->due_date)->format('Y-m-d') : '') }}"
            required
            class="w-full rounded-lg border px-4 py-2"
        >

        @error('due_date')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="mb-1 block font-medium">
            Priority
        </label>

        <select
            name="priority"
            required
            class="w-full rounded-lg border px-4 py-2"
        >
            @foreach(['low', 'medium', 'high'] as $priority)
                <option
                    value="{{ $priority }}"
                    @selected(old('priority', $task->priority ?? '') === $priority)
                >
                    {{ ucfirst($priority) }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="mb-1 block font-medium">
            Status
        </label>

        <select
            name="status"
            required
            class="w-full rounded-lg border px-4 py-2"
        >
            @foreach(['pending', 'ongoing', 'completed'] as $status)
                <option
                    value="{{ $status }}"
                    @selected(old('status', $task->status ?? 'pending') === $status)
                >
                    {{ ucfirst($status) }}
                </option>
            @endforeach
        </select>

        @error('status')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

</div>
