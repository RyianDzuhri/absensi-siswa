<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Dashboard'); ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/styleadmin.css')); ?>">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(route('admin.dashboard.index')); ?>"><i class="bi bi-house-door me-2"></i>Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="<?php echo e(route('users.index')); ?>" class="nav-link"><i class="bi bi-person-gear me-2"></i>Pengguna</a></li>
                    <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-person-lines-fill me-2"></i>Siswa</a></li>
                    <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-house-door me-2"></i>Kelas</a></li>
                    <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-calendar-check me-2"></i>Absensi</a></li>
                    <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-bar-chart-line me-2"></i>Laporan</a></li>
                    <li class="nav-item"><a href="<?php echo e(route('logout')); ?>" class="nav-link"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container my-4">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\absensi-siswa\resources\views/content/admin/layout.blade.php ENDPATH**/ ?>