<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styleadmin.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm sticky-top">
        <div class="container-fluid">
            <!-- Toggle Sidebar -->
            <button class="btn btn-outline-light me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarAdmin" aria-controls="sidebarAdmin">
                <i class="bi bi-list"></i>
            </button>

            <!-- Brand -->
            <a class="navbar-brand" href="{{ route('admin.dashboard.index') }}">
                <i class="bi bi-speedometer2 me-2"></i>Admin Panel
            </a>

            <!-- Right Navbar -->
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle me-1"></i>{{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-person-lines-fill me-1"></i>Profil</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-key me-1"></i>Ganti Password</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a href="{{ route('logout') }}" class="dropdown-item"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right me-1"></i>Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="GET" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="offcanvas offcanvas-start bg-light" tabindex="-1" id="sidebarAdmin" aria-labelledby="sidebarAdminLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarAdminLabel">Menu Admin</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
            <ul class="list-group list-group-flush">
                <a href="{{ route('content.admin.users') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-person-gear me-2"></i>Pengguna
                </a>
                <a href="{{ route('content.admin.siswa') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-person-lines-fill me-2"></i>Siswa
                </a>
                <a href="{{ route('content.admin.kelas') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-easel2 me-2"></i>Kelas
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <i class="bi bi-calendar-check me-2"></i>Absensi
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <i class="bi bi-bar-chart-line me-2"></i>Laporan
                </a>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container my-4">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
