<header class="border-b bg-white">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">

        <a href="{{ route('projects.index') }}"
           class="text-xl font-bold text-gray-900">
            Project Task Management
        </a>

        <nav class="flex gap-6 text-sm">
            <a href="{{ route('projects.index') }}"
               class="text-gray-600 hover:text-gray-900">
                Projects
            </a>

            <a href="{{ route('employees.index') }}"
               class="text-gray-600 hover:text-gray-900">
                Employees
            </a>

            <a href="{{ route('tasks.index') }}"
               class="text-gray-600 hover:text-gray-900">
                Tasks
            </a>
        </nav>

    </div>
</header>
