@extends('admin.layout')

@section('title', 'Task Management')


@section('content')

<main class="page">


    <!-- HEADER -->

    <div class="page-header">

        <div>

            <small>
                Administration
            </small>

            <h1>
                Task Management
            </h1>

            <p>
                Create and assign tasks to your team members.
            </p>

        </div>


        <div class="header-actions">

            <a
                href="{{ route('admin.todos.create') }}"
                class="create-btn"
            >
                + Create Task
            </a>

        </div>

    </div>


    <!-- SUCCESS MESSAGE -->

    @if(session('success'))

        <div class="success">
            {{ session('success') }}
        </div>

    @endif


    <!-- TASK CARD -->

    <section class="card">


        <div class="card-header">

            <div>

                <h2>
                    All Tasks
                </h2>

                <p>
                    Tasks assigned to team members.
                </p>

            </div>


            <span>

                {{ $todos->count() }} Tasks

            </span>

        </div>


        @if($todos->count())


            <div style="overflow-x:auto;">

                <table style="width:100%; border-collapse:collapse;">

                    <thead>

                        <tr>

                            <th style="padding:14px 20px; text-align:left; background:#f8fafc; font-size:11px;">
                                Task
                            </th>

                            <th style="padding:14px 20px; text-align:left; background:#f8fafc; font-size:11px;">
                                Assigned To
                            </th>

                            <th style="padding:14px 20px; text-align:left; background:#f8fafc; font-size:11px;">
                                Priority
                            </th>

                            <th style="padding:14px 20px; text-align:left; background:#f8fafc; font-size:11px;">
                                Status
                            </th>

                            <th style="padding:14px 20px; text-align:left; background:#f8fafc; font-size:11px;">
                                Due Date
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                        @foreach($todos as $todo)

                            <tr>


                                <td style="padding:16px 20px; border-top:1px solid #eef2f7;">

                                    <strong>
                                        {{ $todo->title }}
                                    </strong>


                                    @if($todo->description)

                                        <div style="color:#64748b; font-size:11px; margin-top:4px;">

                                            {{ $todo->description }}

                                        </div>

                                    @endif

                                </td>


                                <td style="padding:16px 20px; border-top:1px solid #eef2f7;">

                                    @if($todo->user)

                                        {{ $todo->user->name }}

                                    @else

                                        Not Assigned

                                    @endif

                                </td>


                                <td style="padding:16px 20px; border-top:1px solid #eef2f7;">

                                    {{ ucfirst($todo->priority) }}

                                </td>


                                <td style="padding:16px 20px; border-top:1px solid #eef2f7;">

                                    {{ ucwords(str_replace('_', ' ', $todo->status)) }}

                                </td>


                                <td style="padding:16px 20px; border-top:1px solid #eef2f7;">

                                    @if($todo->due_date)

                                        {{ $todo->due_date->format('d M Y') }}

                                    @else

                                        No date

                                    @endif

                                </td>


                            </tr>

                        @endforeach


                    </tbody>

                </table>

            </div>


        @else


            <div style="text-align:center; padding:55px 20px; color:#64748b;">

                <h3 style="color:#334155; margin-bottom:6px;">
                    No tasks yet
                </h3>

                <p>
                    Create your first task and assign it to a user.
                </p>


                <a
                    href="{{ route('admin.todos.create') }}"
                    class="create-btn"
                    style="display:inline-block; margin-top:15px;"
                >
                    + Create First Task
                </a>

            </div>


        @endif


    </section>


</main>

@endsection