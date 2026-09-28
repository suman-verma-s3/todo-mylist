<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Admin Panel') | Todo-MyList
    </title>

    @vite(['resources/css/app.css', 'resources/css/admin.css'])

    @stack('styles')

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

        <aside
            class="sidebar"
            id="sidebar"
        >


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


                    <button
                        type="button"
                        class="close-menu"
                        id="closeMenu"
                    >
                        ×
                    </button>

                </div>

            </div>


            <div class="menu-title">
                Main Menu
            </div>


            <nav class="menu">


                <!-- Dashboard -->

                <a
                    href="{{ route('admin.dashboard') }}"
                    class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                >

                    <span>📊</span>

                    <span>
                        Dashboard
                    </span>

                </a>


                <!-- Todo -->

                <a
                    href="{{ route('admin.todos.index') }}"
                    class="{{ request()->routeIs('admin.todos.*') ? 'active' : '' }}"
                >

                    <span>📝</span>

                    <span>
                        Todo Management
                    </span>

                </a>


                <!-- Users -->

                <a
                    href="{{ route('admin.users.index') }}"
                    class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}"
                >

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


                    <button
                        type="button"
                        class="menu-toggle"
                        id="menuToggle"
                    >
                        ☰
                    </button>


                    <div>

                        <h2>
                            @yield('page-heading', 'Admin Panel')
                        </h2>

                        <p>
                            @yield('page-description', 'Manage your Todo-MyList application')
                        </p>

                    </div>

                </div>


                <div class="admin-info">

                    <strong>
                        {{ auth()->user()->name }}
                    </strong>

                    <span>
                        Administrator
                    </span>

                </div>


            </header>



            <!-- PAGE CONTENT -->

            @yield('content')


        </div>


    </div>



    <!-- =========================
         MOBILE MENU
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


        menuToggle.addEventListener('click', function () {

            sidebar.classList.add('open');

            mobileOverlay.classList.add('show');

        });


        closeMenu.addEventListener('click', function () {

            sidebar.classList.remove('open');

            mobileOverlay.classList.remove('show');

        });


        mobileOverlay.addEventListener('click', function () {

            sidebar.classList.remove('open');

            mobileOverlay.classList.remove('show');

        });


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


    @stack('scripts')

</body>

</html>