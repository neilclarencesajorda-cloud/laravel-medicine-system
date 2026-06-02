<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Medicine Management System</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        @yield('styles')
    </head>
    <body>

    <div class="d-flex">

        <div class="sidebar text-white p-4">

            <h4 class="system-title">
                Medicine Management System
            </h4>

            <hr class="sidebar-divider">

            <ul class="nav flex-column">

                <li class="nav-item">
                    <a href="/dashboard" class="nav-link text-white">
                        Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/medicines" class="nav-link text-white">
                        Medicines
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/profile" class="nav-link text-white">
                        Profile
                    </a>
                </li>

            </ul>

            <div class="mt-auto logout-section">

                <form action="/logout" method="POST">
                    @csrf

                    <button type="submit" class="btn btn-danger w-100">
                        Logout
                    </button>

                </form>

            </div>

        </div>

        <div class="main-content p-4 flex-grow-1">

            @yield('content')

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @yield('scripts')

    </body>
</html>