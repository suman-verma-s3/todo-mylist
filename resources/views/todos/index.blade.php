<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Tasks | TodoMyList</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
            color: #1e293b;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button,
        input,
        textarea {
            font-family: inherit;
        }


        /* =========================
           TOP NAVBAR
        ========================= */

        .navbar {
            height: 70px;
            background: white;
            border-bottom: 1px solid #e2e8f0;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 30px;
        }

        .brand {
            display: flex;
            flex-direction: column;
        }

        .brand-name {
            font-size: 22px;
            font-weight: 700;
            color: #1e293b;
        }

        .brand-name span {
            color: #4f46e5;
        }

        .brand-tagline {
            font-size: 11px;
            color: #64748b;
            margin-top: 3px;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-name {
            font-size: 13px;
            color: #475569;
        }

        .logout-btn {
            border: none;
            background: transparent;
            color: #475569;
            font-size: 13px;
            cursor: pointer;
            padding: 8px 12px;
            border-radius: 7px;
        }

        .logout-btn:hover {
            background: #f1f5f9;
            color: #ef4444;
        }


        /* =========================
           PAGE
        ========================= */

        .page {
            max-width: 1100px;
            margin: 0 auto;
            padding: 35px 20px 50px;
        }


        /* =========================
           PAGE HEADER
        ========================= */

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 25px;
        }

        .page-title small {
            color: #4f46e5;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .page-title h1 {
            font-size: 27px;
            margin-top: 5px;
            color: #0f172a;
        }

        .page-title p {
            color: #64748b;
            font-size: 13px;
            margin-top: 6px;
        }


        /* =========================
           ADD TASK BUTTON
        ========================= */

        .add-task-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            background: #4f46e5;
            color: white;

            padding: 12px 18px;
            border-radius: 9px;

            font-size: 13px;
            font-weight: 600;

            transition: 0.2s;
        }

        .add-task-btn:hover {
            background: #4338ca;
            transform: translateY(-1px);
        }


        /* =========================
           TASK SUMMARY
        ========================= */

        .summary {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-bottom: 25px;
        }

        .summary-box {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 18px 20px;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .summary-info span {
            display: block;
            color: #64748b;
            font-size: 12px;
        }

        .summary-info strong {
            display: block;
            font-size: 24px;
            margin-top: 6px;
        }

        .summary-icon {
            width: 40px;
            height: 40px;

            border-radius: 10px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 18px;
        }

        .total-icon {
            background: #e0e7ff;
        }

        .pending-icon {
            background: #fef3c7;
        }

        .completed-icon {
            background: #dcfce7;
        }


        /* =========================
           TASK CONTAINER
        ========================= */

        .task-container {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 15px;
            overflow: hidden;
        }

        .task-container-header {
            padding: 20px 22px;

            border-bottom: 1px solid #e2e8f0;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .task-container-header h2 {
            font-size: 17px;
        }

        .task-container-header p {
            font-size: 12px;
            color: #64748b;
            margin-top: 4px;
        }

        .task-count {
            background: #eef2ff;
            color: #4f46e5;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }


        /* =========================
           TASK ITEM
        ========================= */

        .task-list {
            padding: 10px 20px 20px;
        }

        .task-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;

            padding: 18px 5px;

            border-bottom: 1px solid #eef2f7;
        }

        .task-item:last-child {
            border-bottom: none;
        }


        /* Checkbox */

        .task-check {
            width: 22px;
            height: 22px;

            border: 2px solid #cbd5e1;
            border-radius: 50%;

            flex-shrink: 0;

            margin-top: 2px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 12px;
        }

        .task-check.completed {
            background: #22c55e;
            border-color: #22c55e;
            color: white;
        }


        /* Task Content */

        .task-content {
            flex: 1;
            min-width: 0;
        }

        .task-title-row {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .task-title {
            font-size: 15px;
            font-weight: 700;
            color: #1e293b;
        }

        .task-title.completed {
            text-decoration: line-through;
            color: #94a3b8;
        }


        /* Status */

        .status {
            display: inline-block;
            padding: 4px 9px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 600;
        }

        .status.pending {
            background: #fef3c7;
            color: #b45309;
        }

        .status.completed {
            background: #dcfce7;
            color: #15803d;
        }


        .task-description {
            color: #64748b;
            font-size: 13px;
            line-height: 1.5;
            margin-top: 7px;
        }

        .task-date {
            color: #94a3b8;
            font-size: 11px;
            margin-top: 9px;
        }


        /* =========================
           TASK ACTIONS
        ========================= */

        .task-actions {
            display: flex;
            align-items: center;
            gap: 7px;
            flex-shrink: 0;
        }

        .action-btn {
            border: none;
            padding: 7px 11px;
            border-radius: 7px;
            font-size: 11px;
            cursor: pointer;
            font-weight: 600;
        }

        .view-btn {
            background: #f1f5f9;
            color: #475569;
        }

        .edit-btn {
            background: #eef2ff;
            color: #4f46e5;
        }

        .delete-btn {
            background: #fef2f2;
            color: #dc2626;
        }

        .action-btn:hover {
            opacity: 0.8;
        }


        /* =========================
           EMPTY STATE
        ========================= */

        .empty-state {
            text-align: center;
            padding: 55px 20px;
        }

        .empty-icon {
            font-size: 45px;
            margin-bottom: 15px;
        }

        .empty-state h3 {
            font-size: 17px;
        }

        .empty-state p {
            color: #64748b;
            font-size: 13px;
            margin-top: 6px;
        }


        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 700px) {

            .navbar {
                height: 65px;
                padding: 0 16px;
            }

            .brand-name {
                font-size: 19px;
            }

            .user-name {
                display: none;
            }

            .page {
                padding: 22px 14px 40px;
            }

            .page-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .page-title h1 {
                font-size: 23px;
            }

            .add-task-btn {
                width: 100%;
                justify-content: center;
            }

            .summary {
                grid-template-columns: 1fr;
                gap: 10px;
            }

            .summary-box {
                padding: 15px 17px;
            }

            .task-container-header {
                padding: 17px;
            }

            .task-list {
                padding: 5px 15px 15px;
            }

            .task-item {
                gap: 11px;
                padding: 17px 3px;
            }

            .task-actions {
                flex-wrap: wrap;
                justify-content: flex-end;
            }

            .action-btn {
                padding: 7px 9px;
            }

        }


        /* Small mobile */

        @media (max-width: 450px) {

            .task-item {
                display: grid;
                grid-template-columns: 22px 1fr;
            }

            .task-actions {
                grid-column: 2;
                justify-content: flex-start;
                margin-top: 5px;
            }

            .task-title {
                font-size: 14px;
            }

            .task-description {
                font-size: 12px;
            }

        }

    </style>

</head>


<body>


    <!-- =========================
         NAVBAR
    ========================= -->

    <nav class="navbar">

        <div class="brand">

            <div class="brand-name">
                Todo<span>MyList</span>
            </div>

            <div class="brand-tagline">
                Organize your day
            </div>

        </div>


        <div class="nav-right">

            <span class="user-name">
                {{ auth()->user()->name }}
            </span>

            <form
                method="POST"
                action="{{ route('logout') }}"
            >

                @csrf

                <button
                    type="submit"
                    class="logout-btn"
                >
                    Logout
                </button>

            </form>

        </div>

    </nav>



    <!-- =========================
         PAGE
    ========================= -->

    <main class="page">


        <!-- Page Header -->

        <div class="page-header">

            <div class="page-title">

                <small>
                    My Tasks
                </small>

                <h1>
                    Welcome, {{ auth()->user()->name }} 👋
                </h1>

                <p>
                    Keep your tasks organized and stay productive.
                </p>

            </div>


            <a
                href="{{ route('todos.create') }}"
                class="add-task-btn"
            >
                <span>+</span>
                Add New Task
            </a>

        </div>



        <!-- =========================
             SUMMARY
        ========================= -->

        <div class="summary">


            <!-- Total -->

            <div class="summary-box">

                <div class="summary-info">

                    <span>
                        Total Tasks
                    </span>

                    <strong>
                        {{ $todos->count() }}
                    </strong>

                </div>

                <div class="summary-icon total-icon">
                    📝
                </div>

            </div>


            <!-- Pending -->

            <div class="summary-box">

                <div class="summary-info">

                    <span>
                        Pending
                    </span>

                    <strong>
                        {{ $todos->where('status', 'pending')->count() }}
                    </strong>

                </div>

                <div class="summary-icon pending-icon">
                    ⏳
                </div>

            </div>


            <!-- Completed -->

            <div class="summary-box">

                <div class="summary-info">

                    <span>
                        Completed
                    </span>

                    <strong>
                        {{ $todos->where('status', 'completed')->count() }}
                    </strong>

                </div>

                <div class="summary-icon completed-icon">
                    ✓
                </div>

            </div>


        </div>



        <!-- =========================
             TASK LIST
        ========================= -->

        <section class="task-container">


            <!-- Header -->

            <div class="task-container-header">

                <div>

                    <h2>
                        Your Tasks
                    </h2>

                    <p>
                        Manage your daily tasks from here.
                    </p>

                </div>

                <span class="task-count">
                    {{ $todos->count() }} Tasks
                </span>

            </div>



            <!-- Task List -->

            <div class="task-list">


                @forelse ($todos as $todo)


                    <div class="task-item">


                        <!-- Check -->

                        <div
                            class="task-check
                            {{ $todo->status === 'completed' ? 'completed' : '' }}"
                        >

                            @if ($todo->status === 'completed')
                                ✓
                            @endif

                        </div>



                        <!-- Content -->

                        <div class="task-content">

                            <div class="task-title-row">

                                <h3
                                    class="task-title
                                    {{ $todo->status === 'completed' ? 'completed' : '' }}"
                                >
                                    {{ $todo->title }}
                                </h3>


                                @if ($todo->status === 'completed')

                                    <span class="status completed">
                                        Completed
                                    </span>

                                @else

                                    <span class="status pending">
                                        Pending
                                    </span>

                                @endif

                            </div>


                            @if ($todo->description)

                                <p class="task-description">
                                    {{ $todo->description }}
                                </p>

                            @endif


                            <p class="task-date">

                                Created
                                {{ $todo->created_at->diffForHumans() }}

                            </p>

                        </div>



                        <!-- Actions -->

                        <div class="task-actions">


                            <a
                                href="{{ route('todos.show', $todo) }}"
                                class="action-btn view-btn"
                            >
                                View
                            </a>


                            <a
                                href="{{ route('todos.edit', $todo) }}"
                                class="action-btn edit-btn"
                            >
                                Edit
                            </a>


                            <form
                                method="POST"
                                action="{{ route('todos.destroy', $todo) }}"
                                onsubmit="return confirm('Are you sure you want to delete this task?')"
                            >

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="action-btn delete-btn"
                                >
                                    Delete
                                </button>

                            </form>


                        </div>


                    </div>


                @empty


                    <!-- Empty -->

                    <div class="empty-state">

                        <div class="empty-icon">
                            📝
                        </div>

                        <h3>
                            No tasks yet
                        </h3>

                        <p>
                            Start by creating your first task.
                        </p>

                        <br>

                        <a
                            href="{{ route('todos.create') }}"
                            class="add-task-btn"
                        >
                            + Create Your First Task
                        </a>

                    </div>


                @endforelse


            </div>

        </section>


    </main>


</body>

</html>