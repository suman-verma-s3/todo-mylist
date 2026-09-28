<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'User Panel | TodoMyList')
    </title>

    @vite([
        'resources/css/user.css',
        'resources/js/app.js'
    ])

</head>

<body>

    <!-- Mobile Overlay -->

    <div
        class="user-mobile-overlay"
        id="userMobileOverlay"
    ></div>


    <div class="user-layout">


        <!-- =================================
             SIDEBAR
        ================================= -->

        <aside
            class="user-sidebar"
            id="userSidebar"
        >

            <!-- Logo -->

            <div class="user-logo">

                <div class="user-logo-row">

                    <div>

                        <h1>
                            Todo<span>MyList</span>
                        </h1>

                        <p>
                            User Panel
                        </p>

                    </div>


                    <!-- Mobile Close -->

                    <button
                        type="button"
                        class="user-close-menu"
                        id="userCloseMenu"
                    >
                        ×
                    </button>

                </div>

            </div>


            <!-- Menu Title -->

            <div class="user-menu-title">
                Main Menu
            </div>


            <!-- Menu -->

            <nav class="user-menu">


                <!-- Dashboard -->

                <a
                    href="{{ route('dashboard') }}"
                    class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"
                >

                    <span>📊</span>

                    <span>
                        Dashboard
                    </span>

                </a>


                <!-- My Tasks -->

                <a
                    href="{{ route('todos.index') }}"
                    class="{{ request()->routeIs('todos.*') ? 'active' : '' }}"
                >

                    <span>📝</span>

                    <span>
                        My Tasks
                    </span>

                </a>


                <!-- Pending -->

                <a href="{{ route('todos.index') }}">

                    <span>⏳</span>

                    <span>
                        Pending Tasks
                    </span>

                </a>


                <!-- Completed -->

                <a href="{{ route('todos.index') }}">

                    <span>✅</span>

                    <span>
                        Completed Tasks
                    </span>

                </a>


                <!-- Profile -->

                <a
                    href="{{ route('profile.edit') }}"
                    class="{{ request()->routeIs('profile.*') ? 'active' : '' }}"
                >

                    <span>👤</span>

                    <span>
                        My Profile
                    </span>

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
                        &nbsp;
                        Logout

                    </button>

                </form>

            </div>

        </aside>


        <!-- =================================
             MAIN
        ================================= -->

        <div class="user-main">


            <!-- =================================
                 TOPBAR
            ================================= -->

            <header class="user-topbar">


                <div class="user-topbar-left">


                    <!-- Mobile Toggle -->

                    <button
                        type="button"
                        class="user-menu-toggle"
                        id="userMenuToggle"
                    >
                        ☰
                    </button>


                    <div>

                        <h2>
                            @yield('page-title', 'Dashboard')
                        </h2>

                        <p>
                            Manage your tasks easily
                        </p>

                    </div>

                </div>


                <!-- User Info -->

                <div class="user-info">

                    <strong>
                        {{ auth()->user()->name }}
                    </strong>

                    <span>
                        User
                    </span>

                </div>

            </header>


            <!-- =================================
                 PAGE CONTENT
            ================================= -->

            <main class="user-content">

                @yield('content')

            </main>


        </div>

    </div>


    <!-- =================================
         MOBILE MENU SCRIPT
    ================================= -->

    <script>

        const userMenuToggle =
            document.getElementById('userMenuToggle');

        const userCloseMenu =
            document.getElementById('userCloseMenu');

        const userSidebar =
            document.getElementById('userSidebar');

        const userMobileOverlay =
            document.getElementById('userMobileOverlay');


        // Open menu

        userMenuToggle.addEventListener('click', function () {

            userSidebar.classList.add('open');

            userMobileOverlay.classList.add('show');

        });


        // Close menu

        userCloseMenu.addEventListener('click', function () {

            userSidebar.classList.remove('open');

            userMobileOverlay.classList.remove('show');

        });


        // Close when clicking outside

        userMobileOverlay.addEventListener('click', function () {

            userSidebar.classList.remove('open');

            userMobileOverlay.classList.remove('show');

        });


        // Close menu after clicking a link on mobile

        const userMenuLinks =
            document.querySelectorAll('.user-menu a');

        userMenuLinks.forEach(function (link) {

            link.addEventListener('click', function () {

                if (window.innerWidth <= 700) {

                    userSidebar.classList.remove('open');

                    userMobileOverlay.classList.remove('show');

                }

            });

        });

    </script>

</body>

</html>