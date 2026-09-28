@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('page-heading', 'Dashboard')

@section('page-description', 'Manage your Todo-MyList application')


@section('content')

<main class="content">


    <!-- Welcome -->

    <div class="welcome">

        <small>
            Welcome back!
        </small>

        <h1>
            {{ auth()->user()->name }} 👋
        </h1>

        <p>
            Here's an overview of your Todo-MyList application.
        </p>

    </div>


    <!-- Todo Overview -->

    <div class="dashboard-card">


        <div class="card-header">

            <h3>
                Todo Overview
            </h3>

            <p>
                Quick summary of all tasks
            </p>

        </div>


        <div class="stats">


            <!-- Total -->

            <div class="stat-box">

                <div class="stat-top">

                    <span class="stat-label">
                        Total Todos
                    </span>

                    <div class="stat-icon total-icon">
                        📝
                    </div>

                </div>

                <div class="stat-number">
                    {{ $totalTodos }}
                </div>

            </div>


            <!-- Pending -->

            <div class="stat-box">

                <div class="stat-top">

                    <span class="stat-label">
                        Pending Todos
                    </span>

                    <div class="stat-icon pending-icon">
                        ⏳
                    </div>

                </div>

                <div class="stat-number pending-number">
                    {{ $pendingTodos }}
                </div>

            </div>


            <!-- Completed -->

            <div class="stat-box">

                <div class="stat-top">

                    <span class="stat-label">
                        Completed Todos
                    </span>

                    <div class="stat-icon completed-icon">
                        ✓
                    </div>

                </div>

                <div class="stat-number completed-number">
                    {{ $completedTodos }}
                </div>

            </div>


        </div>

    </div>



    <!-- Management -->

    <div class="management-card">


        <div class="management-title">

            <h3>
                Management
            </h3>

            <p>
                Manage different sections of your application.
            </p>

        </div>


        <div class="management-grid">


            <!-- Todo Management -->

            <a
                href="{{ route('admin.todos.index') }}"
                class="management-item"
            >

                <div class="management-icon">
                    📝
                </div>

                <h4>
                    Todo Management
                </h4>

                <p>
                    Create, assign and manage tasks for users.
                </p>

                <span class="manage-link">
                    Manage Todos →
                </span>

            </a>



            <!-- User Management -->

            <a
                href="{{ route('admin.users.index') }}"
                class="management-item"
            >

                <div class="management-icon">
                    👥
                </div>

                <h4>
                    User Management
                </h4>

                <p>
                    Create and manage application users.
                </p>

                <span class="manage-link">
                    Manage Users →
                </span>

            </a>



            <!-- Roles & Permissions -->

            <a
                href="#"
                class="management-item"
            >

                <div class="management-icon">
                    🔐
                </div>

                <h4>
                    Roles & Permissions
                </h4>

                <p>
                    Manage roles and permissions.
                </p>

                <span class="manage-link">
                    Coming Soon →
                </span>

            </a>


        </div>


    </div>


</main>

@endsection