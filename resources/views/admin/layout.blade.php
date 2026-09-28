<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin Panel') | TodoMyList</title>

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

        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            min-height: 70px;
            background: #ffffff;
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

        /* =========================
           COMMON PAGE
        ========================= */

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

        /* =========================
           BUTTONS
        ========================= */

        .create-btn {
            background: #4f46e5;
            color: white;

            padding: 11px 17px;

            border-radius: 8px;

            font-size: 13px;
            font-weight: 600;
        }

        .create-btn:hover {
            background: #4338ca;
        }

        /* =========================
           CARD
        ========================= */

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
            align-items: center;
            justify-content: space-between;
        }

        .card-header h2 {
            font-size: 17px;
        }

        .card-header p {
            color: #64748b;
            font-size: 12px;
            margin-top: 4px;
        }

        /* =========================
           FORM
        ========================= */

        .form-card {
            background: white;

            border: 1px solid #e2e8f0;

            border-radius: 14px;

            padding: 25px;
        }

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
        textarea,
        select {
            width: 100%;

            padding: 11px 12px;

            border: 1px solid #cbd5e1;

            border-radius: 8px;

            outline: none;

            font-size: 13px;

            background: white;

            font-family: inherit;
        }

        textarea {
            min-height: 110px;
            resize: vertical;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #4f46e5;
        }

        .form-row {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 15px;
        }

        .error {
            color: #dc2626;

            font-size: 11px;

            margin-top: 5px;
        }

        /* =========================
           SUCCESS
        ========================= */

        .success {
            background: #dcfce7;
            color: #166534;

            padding: 11px 15px;

            border-radius: 8px;

            margin-bottom: 18px;

            font-size: 13px;
        }

        /* =========================
           MOBILE
        ========================= */

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
                flex-direction: column;

                align-items: flex-start;

                gap: 15px;
            }

            .header-actions {
                width: 100%;
            }

            .header-actions a {
                flex: 1;

                text-align: center;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

        }

    </style>

    @stack('styles')

</head>


<body>


    <!-- COMMON ADMIN NAVBAR -->

    <nav class="navbar">

        <div>

            <div class="brand-name">
                Todo<span>MyList</span>
            </div>

            <div class="brand-tagline">
                Admin Panel
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


    <!-- PAGE CONTENT -->

    @yield('content')


    @stack('scripts')

</body>

</html>