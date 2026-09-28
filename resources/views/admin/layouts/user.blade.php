<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ config('app.name', 'TodoMyList') }}
    </title>

    @vite([
        'resources/css/app.css',
        'resources/css/user.css',
        'resources/js/app.js'
    ])

</head>

<body>

    <div class="user-layout">

        <!-- =========================
             SIDEBAR
        ========================== -->

        <aside class="user-sidebar" id="userSidebar">

            <div class="user-logo">

                <div>

                    <h2>
                        Todo<span>MyList</span>
                    </h2>

                    <p>
                        User Panel
                    </p>

                </div>

                <button
                    type="button"
                    class="user-close"
                    id="userClose"
                >
                    ×
                </button>

            </div>


            <!-- Menu -->

            <div class="user-menu-title">
                Main Menu
            </div>


            <nav class="user-menu">

                <a
                    href="{{ route('dashboard') }}"
                    class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"
                >
                    <span>📊</span>
                    <span>Dashboard</span>
                </a>


                <a
                    href="{{ route('todos.index') }}"
                    class="{{ request()->routeIs('todos.*') ? 'active' : '' }}"
                >
                    <span>📝</span>
                    <span>My Tasks</span>
                </a>


                <a href="{{ route('todos.index') }}">
                    <span>⏳</span>
                    <span>Pending Tasks</span>
                </a>


                <a href="{{ route('todos.index') }}">
                    <span>✅</span>
                    <span>Completed Tasks</span>
                </a>


                <a
                    href="{{ route('profile.edit') }}"
                    class="{{ request()->routeIs('profile.*') ? 'active' : '' }}"
                >
                    <span>👤</span>
                    <span>My Profile</span>
                </a>

            </nav>


            <!-- Logout -->

            <div class="user-logout">

                <form
                    method="POST"
                    action="{{ route('logout') }}"
                >

                    @csrf

                    <button type="submit">
                        🚪
                        <span>Logout</span>
                    </button>

                </form>

            </div>

        </aside>


        <!-- Overlay -->

        <div
            class="user-overlay"
            id="userOverlay"
        ></div>


        <!-- =========================
             MAIN
        ========================== -->

        <div class="user-main">


            <!-- Topbar -->

            <header class="user-topbar">

                <div class="user-topbar-left">

                    <button
                        type="button"
                        class="user-menu-toggle"
                        id="userMenuToggle"
                    >
                        ☰
                    </button>


                    <div>

                        <h1>
                            @yield('page-title', 'Dashboard')
                        </h1>

                        <p>
                            Manage your tasks easily
                        </p>

                    </div>

                </div>


                <div class="user-account">

                    <strong>
                        {{ auth()->user()->name }}
                    </strong>

                    <span>
                        User
                    </span>

                </div>

            </header>


            <!-- Page Content -->

            <main class="user-content">

                @yield('content')

            </main>

        </div>

    </div>


    <!-- =========================
         MOBILE MENU
    ========================== -->

    <script>

        const userMenuToggle =
            document.getElementById('userMenuToggle');

        const userClose =
            document.getElementById('userClose');

        const userSidebar =
            document.getElementById('userSidebar');

        const userOverlay =
            document.getElementById('userOverlay');


        function openUserMenu() {

            userSidebar.classList.add('open');

            userOverlay.classList.add('show');

        }


        function closeUserMenu() {

            userSidebar.classList.remove('open');

            userOverlay.classList.remove('show');

        }


        userMenuToggle.addEventListener(
            'click',
            openUserMenu
        );


        userClose.addEventListener(
            'click',
            closeUserMenu
        );


        userOverlay.addEventListener(
            'click',
            closeUserMenu
        );


        document
            .querySelectorAll('.user-menu a')
            .forEach(function (link) {

                link.addEventListener(
                    'click',
                    function () {

                        if (window.innerWidth <= 700) {

                            closeUserMenu();

                        }

                    }
                );

            });

    </script>

</body>

</html>