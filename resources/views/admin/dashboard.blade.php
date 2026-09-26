<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard | Todo-MyList</title>

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

        button {
            font-family: inherit;
        }

        /* =========================
           MAIN LAYOUT
        ========================= */

        .layout {
            display: flex;
            min-height: 100vh;
        }


        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: #172033;
            color: white;
            padding: 24px 15px;
            flex-shrink: 0;
            position: relative;
            z-index: 1000;
        }

        .logo {
            padding: 0 12px 24px;
            border-bottom: 1px solid #2d374b;
            margin-bottom: 24px;
        }

        .logo-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo h1 {
            font-size: 23px;
            font-weight: 700;
        }

        .logo h1 span {
            color: #818cf8;
        }

        .logo p {
            color: #94a3b8;
            font-size: 12px;
            margin-top: 5px;
        }


        /* Menu */

        .menu-title {
            color: #64748b;
            font-size: 11px;
            text-transform: uppercase;
            padding: 0 12px;
            margin-bottom: 10px;
            letter-spacing: 0.5px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
            border-radius: 9px;
            margin-bottom: 6px;
            color: #cbd5e1;
            font-size: 14px;
            transition: 0.2s;
        }

        .menu a:hover {
            background: #273449;
            color: white;
        }

        .menu a.active {
            background: #4f46e5;
            color: white;
        }


        /* Logout */

        .logout {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #2d374b;
        }

        .logout button {
            width: 100%;
            border: none;
            background: transparent;
            color: #f87171;
            text-align: left;
            padding: 12px;
            border-radius: 9px;
            cursor: pointer;
            font-size: 14px;
        }

        .logout button:hover {
            background: #2a1d2a;
        }


        /* Close button */

        .close-menu {
            display: none;
            border: none;
            background: transparent;
            color: #cbd5e1;
            font-size: 28px;
            line-height: 1;
            cursor: pointer;
        }


        /* =========================
           MAIN AREA
        ========================= */

        .main {
            flex: 1;
            min-width: 0;
        }


        /* =========================
           TOPBAR
        ========================= */

        .topbar {
            min-height: 75px;
            background: white;
            border-bottom: 1px solid #e2e8f0;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 14px 35px;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .topbar h2 {
            font-size: 21px;
            color: #1e293b;
        }

        .topbar p {
            font-size: 13px;
            color: #64748b;
            margin-top: 4px;
        }

        .admin-info {
            text-align: right;
        }

        .admin-info strong {
            display: block;
            font-size: 14px;
        }

        .admin-info span {
            color: #64748b;
            font-size: 12px;
        }


        /* Mobile menu button */

        .menu-toggle {
            display: none;
            border: none;
            background: #4f46e5;
            color: white;
            width: 42px;
            height: 42px;
            border-radius: 9px;
            font-size: 22px;
            cursor: pointer;
        }


        /* =========================
           CONTENT
        ========================= */

        .content {
            padding: 30px;
            max-width: 1250px;
        }


        /* =========================
           WELCOME
        ========================= */

        .welcome {
            background: linear-gradient(135deg, #4f46e5, #6366f1);
            color: white;
            border-radius: 16px;
            padding: 25px 28px;
            margin-bottom: 22px;
        }

        .welcome small {
            color: #c7d2fe;
        }

        .welcome h1 {
            margin-top: 5px;
            font-size: 25px;
        }

        .welcome p {
            margin-top: 7px;
            color: #e0e7ff;
            font-size: 14px;
        }


        /* =========================
           DASHBOARD CARD
        ========================= */

        .dashboard-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.04);
            margin-bottom: 22px;
        }

        .card-header {
            padding: 22px 25px;
            border-bottom: 1px solid #e2e8f0;
        }

        .card-header h3 {
            font-size: 17px;
        }

        .card-header p {
            color: #64748b;
            font-size: 13px;
            margin-top: 5px;
        }


        /* =========================
           STATS
        ========================= */

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            padding: 20px;
            gap: 15px;
        }

        .stat-box {
            padding: 20px;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            background: #fafbff;
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .stat-label {
            color: #64748b;
            font-size: 13px;
        }

        .stat-icon {
            width: 38px;
            height: 38px;
            border-radius: 9px;

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

        .stat-number {
            font-size: 27px;
            font-weight: bold;
            margin-top: 13px;
        }

        .pending-number {
            color: #d97706;
        }

        .completed-number {
            color: #16a34a;
        }


        /* =========================
           MANAGEMENT
        ========================= */

        .management-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.04);
        }

        .management-title {
            margin-bottom: 20px;
        }

        .management-title h3 {
            font-size: 17px;
        }

        .management-title p {
            color: #64748b;
            font-size: 13px;
            margin-top: 5px;
        }

        .management-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
        }

        .management-item {
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 20px;
            transition: 0.2s;
        }

        .management-item:hover {
            border-color: #6366f1;
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.08);
            transform: translateY(-2px);
        }

        .management-icon {
            font-size: 24px;
            margin-bottom: 13px;
        }

        .management-item h4 {
            font-size: 15px;
        }

        .management-item p {
            color: #64748b;
            font-size: 12px;
            line-height: 1.5;
            margin-top: 6px;
        }

        .manage-link {
            display: inline-block;
            margin-top: 14px;
            color: #4f46e5;
            font-size: 12px;
            font-weight: bold;
        }


        /* =========================
           MOBILE OVERLAY
        ========================= */

        .mobile-overlay {
            display: none;
        }


        /* =========================
           TABLET
        ========================= */

        @media (max-width: 900px) {

            .sidebar {
                width: 220px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .management-grid {
                grid-template-columns: 1fr;
            }

        }


        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 700px) {

            .layout {
                display: block;
            }


            /* Sidebar hidden */

            .sidebar {
                position: fixed;
                top: 0;
                left: -270px;

                width: 250px;
                height: 100vh;
                min-height: 100vh;

                z-index: 1000;

                transition: left 0.3s ease;

                overflow-y: auto;
            }


            /* Sidebar open */

            .sidebar.open {
                left: 0;
            }


            /* Logo */

            .logo-row {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }


            /* Close */

            .close-menu {
                display: block;
            }


            /* Overlay */

            .mobile-overlay {
                position: fixed;
                inset: 0;

                background: rgba(0, 0, 0, 0.45);

                z-index: 999;
            }

            .mobile-overlay.show {
                display: block;
            }


            /* Main */

            .main {
                width: 100%;
            }


            /* Topbar */

            .topbar {
                padding: 14px 16px;
                min-height: 70px;
            }

            .menu-toggle {
                display: block;
            }

            .topbar h2 {
                font-size: 19px;
            }

            .topbar p {
                font-size: 11px;
            }

            .admin-info {
                display: none;
            }


            /* Content */

            .content {
                padding: 18px 14px;
            }


            /* Welcome */

            .welcome {
                padding: 20px;
                border-radius: 14px;
            }

            .welcome h1 {
                font-size: 21px;
            }

            .welcome p {
                font-size: 13px;
            }


            /* Stats */

            .dashboard-card {
                border-radius: 14px;
            }

            .card-header {
                padding: 18px;
            }

            .stats {
                grid-template-columns: 1fr;
                padding: 15px;
            }

            .stat-box {
                padding: 17px;
            }


            /* Management */

            .management-card {
                padding: 18px;
                border-radius: 14px;
            }

            .management-grid {
                grid-template-columns: 1fr;
            }

            .management-item {
                padding: 18px;
            }

        }
    </style>
</head>


<body>

    <!-- Mobile Overlay -->

    <div
        class="mobile-overlay"
        id="mobileOverlay"
    ></div>


    <div class="layout">


        <!-- =========================
             SIDEBAR
        ========================= -->

        <aside class="sidebar" id="sidebar">


            <!-- Logo -->

            <div class="logo">

                <div class="logo-row">

                    <div>

                        <h1>
                            Todo<span>MyList</span>
                        </h1>

                        <p>
                            Admin Management
                        </p>

                    </div>


                    <!-- Mobile Close -->

                    <button
                        type="button"
                        class="close-menu"
                        id="closeMenu"
                    >
                        ×
                    </button>

                </div>

            </div>


            <!-- Menu -->

            <div class="menu-title">
                Main Menu
            </div>


            <nav class="menu">


                <!-- Dashboard -->

                <a
                    href="{{ route('admin.dashboard') }}"
                    class="active"
                >
                    <span>📊</span>

                    <span>
                        Dashboard
                    </span>
                </a>


                <!-- Todo -->

                <a href="{{ route('todos.index') }}">

                    <span>📝</span>

                    <span>
                        Todo Management
                    </span>

                </a>


                <!-- Users -->

                <a href="#">

                    <span>👥</span>

                    <span>
                        User Management
                    </span>

                </a>


                <!-- Roles -->

                <a href="#">

                    <span>🔐</span>

                    <span>
                        Roles & Permissions
                    </span>

                </a>

            </nav>


            <!-- Logout -->

            <div class="logout">

                <form
                    method="POST"
                    action="{{ route('logout') }}"
                >

                    @csrf

                    <button type="submit">

                        🚪
                        &nbsp;
                        Logout

                    </button>

                </form>

            </div>

        </aside>



        <!-- =========================
             MAIN
        ========================= -->

        <div class="main">


            <!-- Topbar -->

            <header class="topbar">


                <div class="topbar-left">


                    <!-- Mobile Menu -->

                    <button
                        type="button"
                        class="menu-toggle"
                        id="menuToggle"
                    >
                        ☰
                    </button>


                    <div>

                        <h2>
                            Dashboard
                        </h2>

                        <p>
                            Manage your Todo-MyList application
                        </p>

                    </div>

                </div>


                <!-- Admin -->

                <div class="admin-info">

                    <strong>
                        {{ auth()->user()->name }}
                    </strong>

                    <span>
                        Administrator
                    </span>

                </div>

            </header>



            <!-- =========================
                 CONTENT
            ========================= -->

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



                <!-- =========================
                     TODO OVERVIEW CARD
                ========================= -->

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



                <!-- =========================
                     MANAGEMENT CARD
                ========================= -->

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
                            href="{{ route('todos.index') }}"
                            class="management-item"
                        >

                            <div class="management-icon">
                                📝
                            </div>

                            <h4>
                                Todo Management
                            </h4>

                            <p>
                                View and manage todo tasks.
                            </p>

                            <span class="manage-link">
                                Manage Todos →
                            </span>

                        </a>



                        <!-- User Management -->

                        <a
                            href="#"
                            class="management-item"
                        >

                            <div class="management-icon">
                                👥
                            </div>

                            <h4>
                                User Management
                            </h4>

                            <p>
                                Manage registered users.
                            </p>

                            <span class="manage-link">
                                Manage Users →
                            </span>

                        </a>



                        <!-- Roles -->

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
                                Manage Access →
                            </span>

                        </a>


                    </div>

                </div>


            </main>

        </div>

    </div>



    <!-- =========================
         MOBILE MENU JAVASCRIPT
    ========================= -->

    <script>

        const menuToggle =
            document.getElementById('menuToggle');

        const closeMenu =
            document.getElementById('closeMenu');

        const sidebar =
            document.getElementById('sidebar');

        const mobileOverlay =
            document.getElementById('mobileOverlay');


        /* Open */

        menuToggle.addEventListener('click', function () {

            sidebar.classList.add('open');

            mobileOverlay.classList.add('show');

        });


        /* Close */

        closeMenu.addEventListener('click', function () {

            sidebar.classList.remove('open');

            mobileOverlay.classList.remove('show');

        });


        /* Click outside */

        mobileOverlay.addEventListener('click', function () {

            sidebar.classList.remove('open');

            mobileOverlay.classList.remove('show');

        });


        /* Close after clicking menu link on mobile */

        const menuLinks =
            document.querySelectorAll('.menu a');

        menuLinks.forEach(function (link) {

            link.addEventListener('click', function () {

                if (window.innerWidth <= 700) {

                    sidebar.classList.remove('open');

                    mobileOverlay.classList.remove('show');

                }

            });

        });

    </script>

</body>

</html>