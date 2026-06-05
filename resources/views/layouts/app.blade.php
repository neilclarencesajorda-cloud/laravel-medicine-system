<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Medicine Management System</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        @yield('styles')
    </head>
    <body>

    <!-- Mobile Navbar -->
    <nav class="navbar navbar-dark d-md-none px-3" style="background:#31487A; position:sticky; top:0; z-index:999;">
        <a class="navbar-brand d-flex align-items-center gap-2" href="/dashboard">
            <img src="{{ asset('images/logo.jpg') }}" style="width:35px; height:35px; object-fit:cover; border-radius:50%;">
            <span style="font-size:14px;">Medicine System</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mobileSidebar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mobileSidebar">
            <ul class="navbar-nav mt-2 pb-2">
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link text-white"><i class="bi bi-house-door"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="/medicines" class="nav-link text-white"><i class="bi bi-capsule"></i> Medicines</a>
                </li>
                <li class="nav-item">
                    <a href="/profile" class="nav-link text-white"><i class="bi bi-person"></i> Profile</a>
                </li>
                <li class="nav-item mt-2 mb-2">
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <div class="d-flex" style="min-height:100vh;">

        <!-- Desktop Sidebar -->
        <div class="sidebar text-white p-4 d-none d-md-flex flex-column" style="width:220px; min-width:220px;">

            <div class="text-center mb-3">
                <img src="{{ asset('images/logo.jpg') }}"
                    alt="Logo"
                    style="width:80px; height:80px; object-fit:cover; border-radius:50%;">
            </div>

            <h4 class="system-title text-center">Butika</h4>

            <hr class="sidebar-divider">

            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link text-white">
                        <i class="bi bi-house-door me-2"></i>Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/medicines" class="nav-link text-white">
                        <i class="bi bi-capsule me-2"></i>Medicines
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/profile" class="nav-link text-white">
                        <i class="bi bi-person me-2"></i>Profile
                    </a>
                </li>
            </ul>

            <div class="mt-auto logout-section">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">
                        <i class="bi bi-box-arrow-right me-2"></i>Logout
                    </button>
                </form>
            </div>

        </div>

        <!-- Main Content -->
        <div class="flex-grow-1 p-3" style="min-width:0; overflow-x:auto;">
            @yield('content')
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @yield('scripts')

    </body>
</html>