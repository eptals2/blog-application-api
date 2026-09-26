@extends('layouts.app')

@section('title', 'Employees')

@section('content')

<div class="mx-auto max-w-7xl px-6 py-8">

    <div class="mb-6 flex justify-between">

        <div>
            <h1 class="text-3xl font-bold">
                Employees
            </h1>

            <p class="text-gray-500">
                Manage employees
            </p>
        </div>

        <a
            href="{{ route('employees.create') }}"
            class="rounded-lg bg-blue-600 px-4 py-2 text-white"
        >
            + Add Employee
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
                    <th class="px-6 py-4 text-left">Name</th>
                    <th class="px-6 py-4 text-left">Email</th>
                    <th class="px-6 py-4 text-left">Position</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>

            <tbody>

                @forelse($employees as $employee)

                    <tr class="border-t">

                        <td class="px-6 py-4 font-medium">
                            {{ $employee->name }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $employee->email }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $employee->position }}
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex justify-end gap-2">

                                <a
                                    href="{{ route('employees.edit', $employee) }}"
                                    class="rounded bg-yellow-500 px-3 py-1 text-sm text-white"
                                >
                                    Edit
                                </a>

                                <form
                                    method="POST"
                                    action="{{ route('employees.destroy', $employee) }}"
                                    onsubmit="return confirm('Delete this employee?')"
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
                            colspan="4"
                            class="px-6 py-10 text-center text-gray-500"
                        >
                            No employees found.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-6">
        {{ $employees->links() }}
    </div>

</div>

@endsection
