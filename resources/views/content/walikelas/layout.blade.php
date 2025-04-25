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

    <!-- Sidebar Wali Kelas -->
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-primary" style="width: 250px; height: 100vh; position: fixed;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-5 fw-bold">Wali Kelas</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('walikelas.dashboard.index') }}" class="nav-link text-white">
                    <i class="bi bi-speedometer2 me-2"></i>Dashboard
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <i class="bi bi-person-lines-fill me-2"></i>Data Siswa
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <i class="bi bi-calendar-check me-2"></i>Absensi
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <i class="bi bi-bar-chart-line me-2"></i>Laporan
                </a>
            </li>
        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong>{{ Auth::user()->name }}</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser">
                <li><a class="dropdown-item" href="#">Profil</a></li>
                <li><a class="dropdown-item" href="#">Ganti Password</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="GET" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container-fluid" style="margin-left: 250px; padding-left: 15px; padding-right: 15px; overflow-x: hidden; max-width: calc(100% - 250px);">
        @yield('content')
    </div>



    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
