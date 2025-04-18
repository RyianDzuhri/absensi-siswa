<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Login Page</title>

    <style>
        body {
            background-color: #f7f7f7;
        }
        .login-container {
            margin-top: 100px;
        }
        .login-card {
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-check-label {
            font-size: 14px;
        }
        body {
            font-family: var(--font-sans);
        }

    </style>
</head>

<script>
  function togglePassword() {
    const passwordInput = document.getElementById('passwordInput');
    const toggleIcon = document.getElementById('toggleIcon');

    const isPassword = passwordInput.getAttribute('type') === 'password';
    passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
    toggleIcon.classList.toggle('bi-eye');
    toggleIcon.classList.toggle('bi-eye-slash');
  }
</script>


<body>
    <div class="container login-container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card login-card">
                    <h4 class="text-center mb-4">Login</h4>
                    <form action="<?php echo e(route('auth.verify')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                          <label for="passwordInput" class="form-label">Password</label>
                          <div class="input-group">
                            <input type="password" class="form-control" id="passwordInput" name="password" required>
                            <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()" id="toggleBtn">
                              <i class="bi bi-eye" id="toggleIcon"></i>
                            </button>
                          </div>
                        </div>                        
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\absensi-siswa\resources\views/auth/login.blade.php ENDPATH**/ ?>