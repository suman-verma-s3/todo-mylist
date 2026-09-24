<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Tasks | Todo-MyList</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white border-b border-slate-200">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex justify-between items-center h-16">

                <div>
                    <h1 class="text-xl font-bold text-slate-800">
                        Todo<span class="text-indigo-600">MyList</span>
                    </h1>

                    <p class="text-xs text-slate-500">
                        Organize your day
                    </p>
                </div>

                <div class="flex items-center gap-4">

                    <span class="hidden sm:block text-sm text-slate-600">
                        {{ auth()->user()->name }}
                    </span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button
                            type="submit"
                            class="text-sm font-medium text-red-500 hover:text-red-700"
                        >
                            Logout
                        </button>
                    </form>

                </div>

            </div>

        </div>
    </nav>


    <!-- Main -->
    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">

            <div>
                <p class="text-sm font-medium text-indigo-600 mb-1">
                    MY TASKS
                </p>

                <h2 class="text-3xl font-bold text-slate-800">
                    Welcome, {{ auth()->user()->name }} 👋
                </h2>

                <p class="text-slate-500 mt-1">
                    Keep your tasks organized and stay productive.
                </p>
            </div>

            <a
                href="{{ route('todos.create') }}"
                class="inline-flex items-center justify-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-5 py-3 rounded-xl shadow-sm transition"
            >
                <span class="text-xl">+</span>
                Add New Todo
            </a>

        </div>


        <!-- Success Message -->
        @if(session('success'))

            <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl">
                {{ session('success') }}
            </div>

        @endif


        <!-- Stats -->
        @php
            $totalTodos = $todos->count();
            $completedTodos = $todos->where('status', 'completed')->count();
            $pendingTodos = $todos->where('status', 'pending')->count();
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">

            <!-- Total -->
            <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm">
                <p class="text-sm text-slate-500">
                    Total Tasks
                </p>

                <p class="text-3xl font-bold text-slate-800 mt-2">
                    {{ $totalTodos }}
                </p>
            </div>

            <!-- Pending -->
            <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm">
                <p class="text-sm text-slate-500">
                    Pending
                </p>

                <p class="text-3xl font-bold text-amber-500 mt-2">
                    {{ $pendingTodos }}
                </p>
            </div>

            <!-- Completed -->
            <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm">
                <p class="text-sm text-slate-500">
                    Completed
                </p>

                <p class="text-3xl font-bold text-green-600 mt-2">
                    {{ $completedTodos }}
                </p>
            </div>

        </div>


        <!-- Todo List -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

            <div class="px-6 py-5 border-b border-slate-200">

                <h3 class="text-lg font-bold text-slate-800">
                    Your Tasks
                </h3>

                <p class="text-sm text-slate-500 mt-1">
                    Manage your daily tasks from here.
                </p>

            </div>


            @forelse($todos as $todo)

                <div class="px-6 py-5 border-b border-slate-100 last:border-0 hover:bg-slate-50 transition">

                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                        <div class="flex-1">

                            <div class="flex items-center gap-3">

                                <h4 class="text-lg font-semibold text-slate-800">
                                    {{ $todo->title }}
                                </h4>

                                @if($todo->status === 'completed')

                                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700">
                                        Completed
                                    </span>

                                @else

                                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-amber-100 text-amber-700">
                                        Pending
                                    </span>

                                @endif

                            </div>


                            @if($todo->description)

                                <p class="text-sm text-slate-500 mt-2">
                                    {{ $todo->description }}
                                </p>

                            @endif


                            <p class="text-xs text-slate-400 mt-3">
                                Created {{ $todo->created_at->diffForHumans() }}
                            </p>

                        </div>


                        <!-- Actions -->
                        <div class="flex items-center gap-2">

                            <a
                                href="{{ route('todos.show', $todo) }}"
                                class="px-4 py-2 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-medium transition"
                            >
                                View
                            </a>

                            <a
                                href="{{ route('todos.edit', $todo) }}"
                                class="px-4 py-2 rounded-lg bg-indigo-50 hover:bg-indigo-100 text-indigo-600 text-sm font-medium transition"
                            >
                                Edit
                            </a>

                            <form
                                action="{{ route('todos.destroy', $todo) }}"
                                method="POST"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    onclick="return confirm('Are you sure you want to delete this todo?')"
                                    class="px-4 py-2 rounded-lg bg-red-50 hover:bg-red-100 text-red-600 text-sm font-medium transition"
                                >
                                    Delete
                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            @empty

                <div class="px-6 py-16 text-center">

                    <div class="text-5xl mb-4">
                        📝
                    </div>

                    <h3 class="text-xl font-semibold text-slate-800">
                        No tasks yet
                    </h3>

                    <p class="text-slate-500 mt-2 mb-6">
                        Start by creating your first task.
                    </p>

                    <a
                        href="{{ route('todos.create') }}"
                        class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-5 py-3 rounded-xl transition"
                    >
                        + Create Your First Todo
                    </a>

                </div>

            @endforelse

        </div>

    </main>

</body>
</html>