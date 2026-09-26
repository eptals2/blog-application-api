@extends('layouts.app')

@section('title', 'Admin Login')

@section('content')

<div class="flex min-h-[calc(100vh-1px)] items-center justify-center px-6">

    <div class="w-full max-w-md rounded-xl bg-white p-8 shadow">

        <div class="mb-8 text-center">

            <h1 class="text-3xl font-bold">
                Admin Login
            </h1>

            <p class="mt-2 text-gray-500">
                Project Task Management System
            </p>

        </div>

        @if($errors->any())
            <div class="mb-6 rounded-lg bg-red-100 p-4 text-sm text-red-700">
                {{ $errors->first() }}
            </div>
        @endif

        <form
            method="POST"
            action="{{ route('login.store') }}"
            class="space-y-5"
        >

            @csrf

            <div>
                <label class="mb-1 block font-medium">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:border-blue-500 focus:outline-none"
                >
            </div>

            <div>
                <label class="mb-1 block font-medium">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    required
                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:border-blue-500 focus:outline-none"
                >
            </div>

            <button
                type="submit"
                class="w-full rounded-lg bg-blue-600 py-2.5 font-medium text-white hover:bg-blue-700"
            >
                Login
            </button>

        </form>

    </div>

</div>

@endsection
