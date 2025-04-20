    

    <?php $__env->startSection('title', 'User Control'); ?>

    <?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h2>Manajemen Pengguna</h2>

        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <!-- Tombol Tambah -->
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalTambah">Tambah Pengguna</button>

        <!-- Tabel -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e($user->role); ?></td>
                    <td>
                        <!-- Tombol Edit -->
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdit<?php echo e($user->id); ?>">Edit</button>

                        <!-- Form Hapus -->
                        <form action="<?php echo e(route('admin.users.destroy', $user->id)); ?>" method="POST" style="display:inline-block;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>

                <!-- Modal Edit -->
                <div class="modal fade" id="modalEdit<?php echo e($user->id); ?>" tabindex="-1">
                <div class="modal-dialog">
                    <form method="POST" action="<?php echo e(route('admin.users.update', $user->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title">Edit Pengguna</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama</label>
                                <input name="name" class="form-control" value="<?php echo e($user->name); ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" class="form-control" value="<?php echo e($user->email); ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Password <small>(Kosongkan jika tidak diubah)</small></label>
                                <input name="password" type="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Konfirmasi Password</label>
                                <input name="password_confirmation" type="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select name="role" class="form-control" required>
                                    <option value="Admin" <?php echo e(old('role', $user->role) == 'Admin' ? 'selected' : ''); ?>>Admin</option>
                                    <option value="Wali Kelas" <?php echo e(old('role', $user->role) == 'Wali Kelas' ? 'selected' : ''); ?>>Wali Kelas</option>
                                    <option value="Orang Tua" <?php echo e(old('role', $user->role) == 'Orang Tua' ? 'selected' : ''); ?>>Orang Tua</option>
                                </select>                                
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                    </form>
                </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="modalTambah" tabindex="-1">
        <div class="modal-dialog">
            <form method="POST" action="<?php echo e(route('admin.users.store')); ?>" id="formTambah">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Pengguna</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input name="name" class="form-control" required value="<?php echo e(old('name')); ?>">
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" class="form-control" required value="<?php echo e(old('email')); ?>">
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" type="password" class="form-control" required>
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Password</label>
                            <input name="password_confirmation" type="password" class="form-control" required>
                            <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select name="role" class="form-control" required>
                                <option value="">-- Pilih Role --</option>
                                <option value="Admin" <?php echo e(old('role') == 'Admin' ? 'selected' : ''); ?>>Admin</option>
                                <option value="Wali Kelas" <?php echo e(old('role') == 'Wali Kelas' ? 'selected' : ''); ?>>Wali Kelas</option>
                                <option value="Orang Tua" <?php echo e(old('role') == 'Orang Tua' ? 'selected' : ''); ?>>Orang Tua</option>
                            </select>
                            <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Buka modal jika ada error validasi -->
    <?php if($errors->any()): ?>
    <script>
        $(document).ready(function() {
            $('#modalTambah').modal('show');
        });
    </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('content.admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\absensi-siswa\resources\views/content/admin/users.blade.php ENDPATH**/ ?>