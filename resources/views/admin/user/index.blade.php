<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>User Management | TodoMyList</title>

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

        .nav-right {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-btn {
            padding: 9px 13px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
        }

        .dashboard-btn {
            background: #f1f5f9;
            color: #475569;
        }

        .dashboard-btn:hover {
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
            max-width: 1100px;
            margin: auto;
            padding: 35px 20px;
        }

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 25px;
        }

        .page-header small {
            color: #4f46e5;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .page-header h1 {
            margin-top: 5px;
            font-size: 27px;
        }

        .page-header p {
            color: #64748b;
            font-size: 13px;
            margin-top: 5px;
        }

        .header-actions {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .add-btn {
            background: #4f46e5;
            color: white;
            padding: 11px 17px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
        }

        .add-btn:hover {
            background: #4338ca;
        }

        /* SUCCESS */

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 11px 15px;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        /* CARD */

        .card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            overflow: hidden;
        }

        .card-header {
            padding: 20px;

            border-bottom: 1px solid #e2e8f0;

            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header h2 {
            font-size: 17px;
        }

        .card-header p {
            color: #64748b;
            font-size: 12px;
            margin-top: 4px;
        }

        .user-count {
            background: #eef2ff;
            color: #4f46e5;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        /* TABLE */

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            padding: 14px 20px;
            background: #f8fafc;
            color: #64748b;
            font-size: 11px;
            text-transform: uppercase;
        }

        td {
            padding: 16px 20px;
            border-top: 1px solid #eef2f7;
            font-size: 13px;
        }

        /* USER */

        .user-info {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .avatar {
            width: 36px;
            height: 36px;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #eef2ff;
            color: #4f46e5;

            font-weight: 700;
        }

        .user-name {
            font-weight: 600;
        }

        .user-email {
            color: #64748b;
            font-size: 11px;
            margin-top: 3px;
        }

        /* ROLE */

        .role {
            display: inline-block;

            padding: 5px 10px;

            border-radius: 20px;

            font-size: 10px;
            font-weight: 600;
        }

        .role.admin {
            background: #ede9fe;
            color: #6d28d9;
        }

        .role.user {
            background: #e0f2fe;
            color: #0369a1;
        }

        .date {
            color: #64748b;
            font-size: 12px;
        }

        .empty {
            text-align: center;
            padding: 50px 20px;
            color: #64748b;
        }

        /* MOBILE */

        @media (max-width: 700px) {

            .navbar {
                padding: 15px;
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }

            .nav-right {
                width: 100%;
                justify-content: space-between;
            }

            .page {
                padding: 25px 14px;
            }

            .page-header {
                align-items: flex-start;
                flex-direction: column;
                gap: 15px;
            }

            .header-actions {
                width: 100%;
            }

            .header-actions a {
                flex: 1;
                text-align: center;
            }

            .card-header {
                padding: 16px;
            }

            th,
            td {
                padding: 12px 14px;
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


        <div class="nav-right">

            <a
                href="{{ route('admin.dashboard') }}"
                class="nav-btn dashboard-btn"
            >
                ← Dashboard
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


        <!-- HEADER -->

        <div class="page-header">


            <div>

                <small>
                    Administration
                </small>

                <h1>
                    User Management
                </h1>

                <p>
                    Manage users who can receive and complete tasks.
                </p>

            </div>


            <div class="header-actions">

                <a
                    href="{{ route('admin.dashboard') }}"
                    class="nav-btn dashboard-btn"
                >
                    Dashboard
                </a>


                <a
                    href="{{ route('admin.users.create') }}"
                    class="add-btn"
                >
                    + Add User
                </a>

            </div>


        </div>


        <!-- SUCCESS MESSAGE -->

        @if(session('success'))

            <div class="success">

                {{ session('success') }}

            </div>

        @endif


        <!-- USER CARD -->

        <section class="card">


            <div class="card-header">


                <div>

                    <h2>
                        All Users
                    </h2>

                    <p>
                        Users available for task assignment.
                    </p>

                </div>


                <span class="user-count">

                    {{ $users->count() }} Users

                </span>


            </div>


            @if($users->count())


                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th>
                                    User
                                </th>

                                <th>
                                    Role
                                </th>

                                <th>
                                    Joined
                                </th>

                            </tr>

                        </thead>


                        <tbody>


                            @foreach($users as $user)


                                <tr>


                                    <td>


                                        <div class="user-info">


                                            <div class="avatar">

                                                {{ strtoupper(substr($user->name, 0, 1)) }}

                                            </div>


                                            <div>

                                                <div class="user-name">

                                                    {{ $user->name }}

                                                </div>


                                                <div class="user-email">

                                                    {{ $user->email }}

                                                </div>

                                            </div>


                                        </div>


                                    </td>


                                    <td>


                                        @if($user->roles->count())


                                            @foreach($user->roles as $role)


                                                <span
                                                    class="role {{ $role->name }}"
                                                >

                                                    {{ ucfirst($role->name) }}

                                                </span>


                                            @endforeach


                                        @else


                                            <span class="role user">

                                                No Role

                                            </span>


                                        @endif


                                    </td>


                                    <td>

                                        <span class="date">

                                            {{ $user->created_at->format('d M Y') }}

                                        </span>

                                    </td>


                                </tr>


                            @endforeach


                        </tbody>

                    </table>

                </div>


            @else


                <div class="empty">

                    No users found.

                </div>


            @endif


        </section>


    </main>


</body>

</html>