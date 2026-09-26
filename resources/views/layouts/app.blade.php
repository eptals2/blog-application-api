<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Project Task Management')
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.ts'])
</head>

<body class="min-h-screen bg-gray-100 text-gray-900">

    @auth
        <header class="border-b bg-white">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">

                <a
                    href="{{ route('projects.index') }}"
                    class="text-xl font-bold"
                >
                    Project Task Management
                </a>

                <nav class="flex items-center gap-6">

                    <a
                        href="{{ route('projects.index') }}"
                        class="text-gray-600 hover:text-gray-900"
                    >
                        Projects
                    </a>

                    <a
                        href="{{ route('employees.index') }}"
                        class="text-gray-600 hover:text-gray-900"
                    >
                        Employees
                    </a>

                    <a
                        href="{{ route('tasks.index') }}"
                        class="text-gray-600 hover:text-gray-900"
                    >
                        Tasks
                    </a>

                    <span class="text-sm text-gray-500">
                        {{ auth()->user()->name }}
                    </span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button
                            type="submit"
                            class="text-red-600 hover:text-red-800"
                        >
                            Logout
                        </button>
                    </form>

                </nav>

            </div>
        </header>
    @endauth

    <main>
        @yield('content')
    </main>

</body>

</html>
