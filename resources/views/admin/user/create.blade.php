<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Create User | TodoMyList</title>

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
        }

        /* NAVBAR */

        .navbar {
            min-height: 70px;

            background: white;

            border-bottom: 1px solid #e2e8f0;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 30px;
        }

        .brand-name {
            font-size: 22px;
            font-weight: 700;
        }

        .brand-name span {
            color: #4f46e5;
        }

        .brand-tagline {
            font-size: 11px;
            color: #64748b;
            margin-top: 3px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .back-btn {
            background: #f1f5f9;
            color: #475569;

            padding: 9px 13px;

            border-radius: 8px;

            font-size: 12px;
            font-weight: 600;
        }

        .back-btn:hover {
            background: #e2e8f0;
        }

        .logout-btn {
            border: none;

            background: transparent;

            cursor: pointer;

            color: #64748b;

            font-size: 12px;
            font-weight: 600;
        }

        .logout-btn:hover {
            color: #dc2626;
        }

        /* PAGE */

        .page {
            max-width: 700px;

            margin: auto;

            padding: 40px 20px;
        }

        .page-header {
            margin-bottom: 22px;
        }

        .page-header small {
            color: #4f46e5;

            font-size: 12px;

            font-weight: 600;

            text-transform: uppercase;
        }

        .page-header h1 {
            font-size: 27px;

            margin-top: 5px;
        }

        .page-header p {
            color: #64748b;

            font-size: 13px;

            margin-top: 5px;
        }

        /* CARD */

        .card {
            background: white;

            border: 1px solid #e2e8f0;

            border-radius: 14px;

            padding: 25px;
        }

        /* INFO */

        .info {
            background: #eef2ff;

            color: #3730a3;

            padding: 12px;

            border-radius: 8px;

            font-size: 12px;

            line-height: 1.5;

            margin-bottom: 20px;
        }

        /* FORM */

        .form-group {
            margin-bottom: 19px;
        }

        label {
            display: block;

            font-size: 12px;

            font-weight: 600;

            margin-bottom: 7px;
        }

        input,
        select {
            width: 100%;

            padding: 11px 12px;

            border: 1px solid #cbd5e1;

            border-radius: 8px;

            outline: none;

            font-size: 13px;

            background: white;
        }

        input:focus,
        select:focus {
            border-color: #4f46e5;
        }

        .error {
            color: #dc2626;

            font-size: 11px;

            margin-top: 5px;
        }

        /* ACTIONS */

        .actions {
            display: flex;

            gap: 10px;

            margin-top: 25px;
        }

        .btn {
            border: none;

            padding: 11px 17px;

            border-radius: 8px;

            font-size: 13px;

            font-weight: 600;

            cursor: pointer;

            text-align: center;
        }

        .save {
            background: #4f46e5;

            color: white;

            flex: 1;
        }

        .save:hover {
            background: #4338ca;
        }

        .cancel {
            background: #f1f5f9;

            color: #475569;

            flex: 1;
        }

        .cancel:hover {
            background: #e2e8f0;
        }

        /* MOBILE */

        @media (max-width: 600px) {

            .navbar {
                padding: 15px;

                flex-direction: column;

                align-items: flex-start;

                gap: 12px;
            }

            .nav-links {
                width: 100%;

                justify-content: space-between;
            }

            .page {
                padding: 25px 14px;
            }

            .card {
                padding: 18px;
            }

            .actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }

        }

    </style>

</head>


<body>


    <!-- NAVBAR -->

    <nav class="navbar">


        <div>

            <div class="brand-name">

                Todo<span>MyList</span>

            </div>

            <div class="brand-tagline">

                User Management

            </div>

        </div>


        <div class="nav-links">


            <a
                href="{{ route('admin.dashboard') }}"
                class="back-btn"
            >
                ← Dashboard
            </a>


            <a
                href="{{ route('admin.users.index') }}"
                class="back-btn"
            >
                Users
            </a>


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


    <!-- PAGE -->

    <main class="page">


        <div class="page-header">


            <small>
                Administration
            </small>


            <h1>
                Create User
            </h1>


            <p>
                Add a new team member to TodoMyList.
            </p>


        </div>


        <div class="card">


            <div class="info">

                Create a user here. You can later assign tasks
                to this user from Todo Management.

            </div>


            <form
                method="POST"
                action="{{ route('admin.users.store') }}"
            >

                @csrf


                <!-- NAME -->

                <div class="form-group">

                    <label for="name">
                        Full Name
                    </label>


                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Enter full name"
                    >


                    @error('name')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <!-- EMAIL -->

                <div class="form-group">

                    <label for="email">
                        Email Address
                    </label>


                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Enter email address"
                    >


                    @error('email')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <!-- PASSWORD -->

                <div class="form-group">

                    <label for="password">
                        Password
                    </label>


                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Minimum 8 characters"
                    >


                    @error('password')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <!-- CONFIRM PASSWORD -->

                <div class="form-group">

                    <label for="password_confirmation">
                        Confirm Password
                    </label>


                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Confirm password"
                    >

                </div>


                <!-- ROLE -->

                <div class="form-group">

                    <label for="role">
                        Role
                    </label>


                    <select
                        id="role"
                        name="role"
                    >

                        <option value="">
                            Select Role
                        </option>


                        <option
                            value="user"
                            {{ old('role') === 'user' ? 'selected' : '' }}
                        >
                            User
                        </option>


                        <option
                            value="admin"
                            {{ old('role') === 'admin' ? 'selected' : '' }}
                        >
                            Admin
                        </option>

                    </select>


                    @error('role')

                        <div class="error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <!-- BUTTONS -->

                <div class="actions">


                    <button
                        type="submit"
                        class="btn save"
                    >
                        Create User
                    </button>


                    <a
                        href="{{ route('admin.users.index') }}"
                        class="btn cancel"
                    >
                        Cancel
                    </a>


                </div>


            </form>


        </div>


    </main>


</body>

</html>