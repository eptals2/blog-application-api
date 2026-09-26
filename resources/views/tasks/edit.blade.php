@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')

<div class="mx-auto max-w-2xl px-6 py-8">

    <h1 class="mb-6 text-3xl font-bold">
        Edit Task
    </h1>

    <form
        method="POST"
        action="{{ route('tasks.update', $task) }}"
        class="rounded-xl bg-white p-6 shadow"
    >

        @csrf
        @method('PUT')

        @include('tasks._form')

        <div class="mt-6 flex gap-3">

            <button class="rounded-lg bg-blue-600 px-5 py-2 text-white">
                Update Task
            </button>

            <a
                href="{{ route('tasks.index') }}"
                class="rounded-lg border px-5 py-2"
            >
                Cancel
            </a>

        </div>

    </form>

</div>

@endsection
