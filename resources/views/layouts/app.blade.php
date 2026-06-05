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

    <!-- Mobile Navbar (hidden on desktop via CSS) -->
    <nav id="mobileNav" style="background:#31487A; padding:10px 15px; display:none; align-items:center; justify-content:space-between;">
        <a href="/dashboard" style="display:flex; align-items:center; gap:10px; text-decoration:none;">
            <img src="{{ asset('images/logo.jpg') }}" style="width:35px; height:35px; object-fit:cover; border-radius:50%;">
            <span style="color:white; font-size:14px;">Medicine System</span>
        </a>
        <button onclick="toggleMenu()" style="background:transparent; border:1px solid rgba(255,255,255,0.5); color:white; padding:5px 10px; border-radius:5px; cursor:pointer;">
            ☰
        </button>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobileMenu" style="display:none; background:#31487A; padding:15px;">
        <a href="/dashboard" style="display:block; color:white; padding:10px; text-decoration:none;"><i class="bi bi-house-door me-2"></i>Dashboard</a>
        <a href="/medicines" style="display:block; color:white; padding:10px; text-decoration:none;"><i class="bi bi-capsule me-2"></i>Medicines</a>
        <a href="/users" style="display:block; color:white; padding:10px; text-decoration:none;"><i class="bi bi-people me-2"></i>Users</a>
        <a href="/profile" style="display:block; color:white; padding:10px; text-decoration:none;"><i class="bi bi-person me-2"></i>Profile</a>
        
        <form action="/logout" method="POST" style="padding:10px;">
            @csrf
            <button type="submit" class="btn btn-danger w-100">
                <i class="bi bi-box-arrow-right me-2"></i>Logout
            </button>
        </form>
    </div>

    <!-- Main Layout -->
    <div style="display:flex; min-height:100vh;">

        <!-- Desktop Sidebar -->
        <div id="desktopSidebar" class="text-white p-4" style="width:220px; min-width:220px; background:#31487A; display:flex; flex-direction:column; flex-shrink:0;">

            <div class="text-center mb-3">
                <img src="{{ asset('images/logo.jpg') }}"
                    alt="Logo"
                    style="width:80px; height:80px; object-fit:cover; border-radius:50%;">
            </div>

            <h4 class="system-title text-center">Butika</h4>

            <hr style="border-color:rgba(255,255,255,0.6);">

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
                    <a href="/users" class="nav-link text-white">
                        <i class="bi bi-people me-2"></i>Users
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/profile" class="nav-link text-white">
                        <i class="bi bi-person me-2"></i>Profile
                    </a>
                </li>
            </ul>

            <div class="mt-auto">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">
                        <i class="bi bi-box-arrow-right me-2"></i>Logout
                    </button>
                </form>
            </div>

        </div>

        <!-- Main Content -->
        <div id="mainContent" style="flex:1; padding:30px; overflow-x:auto; min-width:0; background:#F4F6F9;">
            @yield('content')
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    function toggleMenu() {
        const menu = document.getElementById('mobileMenu');
        menu.style.display = menu.style.display === 'none' ? 'block' : 'none';
    }

    function handleResize() {
        const sidebar = document.getElementById('desktopSidebar');
        const mobileNav = document.getElementById('mobileNav');
        const mobileMenu = document.getElementById('mobileMenu');
        const mainContent = document.getElementById('mainContent');

        if (window.innerWidth <= 767) {
            sidebar.style.display = 'none';
            mobileNav.style.display = 'flex';
            mainContent.style.padding = '15px';
        } else {
            sidebar.style.display = 'flex';
            mobileNav.style.display = 'none';
            mobileMenu.style.display = 'none';
            mainContent.style.padding = '30px';
        }
    }

    window.addEventListener('resize', handleResize);
    handleResize();
    </script>

    @yield('scripts')

    </body>
</html>