@extends('layouts.user')

@section('title', 'User Dashboard')

@section('page-title', 'Dashboard')

@section('content')

    <div class="user-welcome">

        <small>
            Welcome back!
        </small>

        <h1>
            Hello, {{ auth()->user()->name }} 👋
        </h1>

        <p>
            Here you can manage your assigned tasks and track your progress.
        </p>

    </div>


    <div class="user-card">

        <div class="user-card-header">

            <h3>
                My Task Overview
            </h3>

            <p>
                Keep track of your assigned tasks.
            </p>

        </div>


        <div class="user-stats">


            <div class="user-stat">

                <div class="user-stat-top">

                    <span class="user-stat-label">
                        Total Tasks
                    </span>

                    <div class="user-stat-icon user-total-icon">
                        📝
                    </div>

                </div>

                <div class="user-stat-number">
                    {{ $totalTodos ?? 0 }}
                </div>

            </div>


            <div class="user-stat">

                <div class="user-stat-top">

                    <span class="user-stat-label">
                        Pending
                    </span>

                    <div class="user-stat-icon user-pending-icon">
                        ⏳
                    </div>

                </div>

                <div class="user-stat-number user-pending-number">
                    {{ $pendingTodos ?? 0 }}
                </div>

            </div>


            <div class="user-stat">

                <div class="user-stat-top">

                    <span class="user-stat-label">
                        Completed
                    </span>

                    <div class="user-stat-icon user-completed-icon">
                        ✓
                    </div>

                </div>

                <div class="user-stat-number user-completed-number">
                    {{ $completedTodos ?? 0 }}
                </div>

            </div>


        </div>

    </div>


    <div class="user-actions">

        <div class="user-actions-title">

            <h3>
                My Tasks
            </h3>

            <p>
                Quickly access your task sections.
            </p>

        </div>


        <div class="user-actions-grid">


            <a
                href="{{ route('todos.index') }}"
                class="user-action"
            >

                <div class="user-action-icon">
                    📝
                </div>

                <h4>
                    My Tasks
                </h4>

                <p>
                    View all tasks assigned to you.
                </p>

                <span class="user-action-link">
                    View Tasks →
                </span>

            </a>


            <a
                href="{{ route('todos.index') }}"
                class="user-action"
            >

                <div class="user-action-icon">
                    ⏳
                </div>

                <h4>
                    Pending Tasks
                </h4>

                <p>
                    Check tasks that are still pending.
                </p>

                <span class="user-action-link">
                    View Pending →
                </span>

            </a>


            <a
                href="{{ route('todos.index') }}"
                class="user-action"
            >

                <div class="user-action-icon">
                    ✅
                </div>

                <h4>
                    Completed Tasks
                </h4>

                <p>
                    Check your completed tasks.
                </p>

                <span class="user-action-link">
                    View Completed →
                </span>

            </a>


        </div>

    </div>

@endsection