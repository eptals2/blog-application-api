@extends('layouts.app')

@section('title', 'Projects')

@section('content')

<div class="mx-auto max-w-7xl px-6 py-8">

    <div class="mb-6 flex items-center justify-between">

        <div>
            <h1 class="text-3xl font-bold">
                Projects
            </h1>

            <p class="mt-1 text-gray-500">
                Manage projects
            </p>
        </div>

        <a
            href="{{ route('projects.create') }}"
            class="rounded-lg bg-blue-600 px-4 py-2 text-white hover:bg-blue-700"
        >
            + Create Project
        </a>

    </div>

    @if(session('success'))
        <div class="mb-6 rounded-lg bg-green-100 p-4 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <form
        method="GET"
        class="mb-6 flex flex-wrap gap-3"
    >

        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Search projects..."
            class="rounded-lg border px-4 py-2"
        >

        <select
            name="sort"
            class="rounded-lg border px-4 py-2"
        >
            <option value="created_at">Created Date</option>
            <option value="name">Name</option>
            <option value="updated_at">Updated Date</option>
        </select>

        <select
            name="direction"
            class="rounded-lg border px-4 py-2"
        >
            <option value="desc">Descending</option>
            <option value="asc">Ascending</option>
        </select>

        <button
            class="rounded-lg bg-gray-800 px-4 py-2 text-white"
        >
            Search
        </button>

    </form>

    <div class="overflow-hidden rounded-xl border bg-white shadow-sm">

        <table class="w-full">

            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 text-left">Name</th>
                    <th class="px-6 py-4 text-left">Description</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>

            <tbody>

                @forelse($projects as $project)

                    <tr class="border-t">

                        <td class="px-6 py-4 font-medium">
                            {{ $project->name }}
                        </td>

                        <td class="px-6 py-4 text-gray-600">
                            {{ $project->description }}
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex justify-end gap-2">

                                <a
                                    href="{{ route('projects.edit', $project) }}"
                                    class="rounded bg-yellow-500 px-3 py-1 text-sm text-white"
                                >
                                    Edit
                                </a>

                                <form
                                    method="POST"
                                    action="{{ route('projects.destroy', $project) }}"
                                    onsubmit="return confirm('Delete this project?')"
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
                            colspan="3"
                            class="px-6 py-10 text-center text-gray-500"
                        >
                            No projects found.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-6">
        {{ $projects->links() }}
    </div>

</div>

@endsection
