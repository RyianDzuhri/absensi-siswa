

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Dashboard Container -->
    <div class="row d-flex justify-content-center">
        <!-- Statistik 1: Jumlah Pengguna -->
        <div class="col-md-3 mb-4">
            <div class="card card-custom bg-primary text-white">
                <div class="card-header card-header-custom">
                    <i class="bi bi-person-circle me-2"></i> Pengguna
                </div>
                <div class="card-body card-body-custom text-center">
                    <?php echo e($totalUsers); ?>

                </div>
                <div class="card-footer card-footer-custom">
                    Total pengguna terdaftar
                </div>
            </div>
        </div>

        <!-- Statistik 2: Jumlah Siswa -->
        <div class="col-md-3 mb-4">
            <div class="card card-custom bg-success text-white">
                <div class="card-header card-header-custom">
                    <i class="bi bi-person-lines-fill me-2"></i> Siswa
                </div>
                <div class="card-body card-body-custom text-center">
                    200
                </div>
                <div class="card-footer card-footer-custom">
                    Total siswa yang terdaftar
                </div>
            </div>
        </div>

        <!-- Statistik 3: Jumlah Kelas -->
        <div class="col-md-3 mb-4">
            <div class="card card-custom bg-info text-white">
                <div class="card-header card-header-custom">
                    <i class="bi bi-house-door me-2"></i> Kelas
                </div>
                <div class="card-body card-body-custom text-center">
                    10
                </div>
                <div class="card-footer card-footer-custom">
                    Total kelas yang ada
                </div>
            </div>
        </div>    

        <!-- Ringkasan Kehadiran & Ketidakhadiran Mingguan (2 grafik sejajar) -->
        <div class="container text-center mt-5">
            <h4 class="fw-bold mb-4"><i class="bi bi-bar-chart-line me-2"></i> Ringkasan Kehadiran dan Ketidakhadiran</h4>
            <div class="row justify-content-center">
                <!-- Grafik Kehadiran -->
                <div class="col-md-6 mb-4">
                    <div class="chart-container" style="height: 350px;">
                        <canvas id="presentChart"></canvas>
                    </div>
                </div>
                <!-- Grafik Ketidakhadiran -->
                <div class="col-md-6 mb-4">
                    <div class="chart-container" style="height: 350px;">
                        <canvas id="absentChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('js/present.js')); ?>"></script>
    <script src="<?php echo e(asset('js/absent.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('content.admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\absensi-siswa\resources\views/content/admin/dashboard.blade.php ENDPATH**/ ?>