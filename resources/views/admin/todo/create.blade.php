@extends('admin.layout')

@section('title', 'Create Task')


@section('content')

<main class="page" style="max-width:750px;">


    <!-- HEADER -->

    <div class="page-header">

        <div>

            <small>
                Administration
            </small>

            <h1>
                Create Task
            </h1>

            <p>
                Create a task and assign it to a team member.
            </p>

        </div>

    </div>


    <!-- FORM -->

    <div class="form-card">


        <div
            style="
                background:#eef2ff;
                color:#3730a3;
                padding:12px;
                border-radius:8px;
                font-size:12px;
                line-height:1.5;
                margin-bottom:22px;
            "
        >

            Select a user, add task details, choose priority
            and set a due date.

        </div>


        <form
            method="POST"
            action="{{ route('admin.todos.store') }}"
        >

            @csrf


            <!-- TITLE -->

            <div class="form-group">

                <label for="title">
                    Task Title
                </label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title') }}"
                    placeholder="Enter task title"
                >

                @error('title')

                    <div class="error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <!-- DESCRIPTION -->

            <div class="form-group">

                <label for="description">
                    Description
                </label>

                <textarea
                    id="description"
                    name="description"
                    placeholder="Enter task details..."
                >{{ old('description') }}</textarea>

                @error('description')

                    <div class="error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <!-- USER + PRIORITY -->

            <div class="form-row">


                <div class="form-group">

                    <label for="user_id">
                        Assign To
                    </label>

                    <select
                        id="user_id"
                        name="user_id"
                    >

                        <option value="">
                            Select User
                        </option>


                        @foreach($users as $user)

                            <option
                                value="{{ $user->id }}"
                                {{ old('user_id') == $user->id ? 'selected' : '' }}
                            >
                                {{ $user->name }}
                            </option>

                        @endforeach

                    </select>


                    @error('user_id')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <div class="form-group">

                    <label for="priority">
                        Priority
                    </label>

                    <select
                        id="priority"
                        name="priority"
                    >

                        <option value="">
                            Select Priority
                        </option>

                        <option
                            value="low"
                            {{ old('priority') == 'low' ? 'selected' : '' }}
                        >
                            Low
                        </option>

                        <option
                            value="medium"
                            {{ old('priority') == 'medium' ? 'selected' : '' }}
                        >
                            Medium
                        </option>

                        <option
                            value="high"
                            {{ old('priority') == 'high' ? 'selected' : '' }}
                        >
                            High
                        </option>

                    </select>


                    @error('priority')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


            </div>


            <!-- DUE DATE -->

            <div class="form-group">

                <label for="due_date">
                    Due Date
                </label>

                <input
                    type="date"
                    id="due_date"
                    name="due_date"
                    value="{{ old('due_date') }}"
                >


                @error('due_date')

                    <div class="error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <!-- BUTTONS -->

            <div
                style="
                    display:flex;
                    gap:10px;
                    margin-top:25px;
                "
            >

                <button
                    type="submit"
                    class="create-btn"
                    style="border:none; cursor:pointer; flex:1;"
                >
                    Create & Assign Task
                </button>


                <a
                    href="{{ route('admin.todos.index') }}"
                    class="nav-btn dashboard-btn"
                    style="display:flex; align-items:center; justify-content:center; flex:1;"
                >
                    Cancel
                </a>

            </div>


        </form>


    </div>


</main>

@endsection