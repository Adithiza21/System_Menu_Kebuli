<?php
session_start();
include "config/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Restoran Kebuli</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="index.php"><b>Restoran</b>Kebuli</a>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Silakan login untuk memulai</p>

            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
                    </div>
                </div>
            </form>

            <div class="mt-3 text-center">
                <small class="text-muted">
                    <i class="fas fa-info-circle"></i> Demo Akun:<br>
                    Admin: admin / 12345<br>
                    Kasir: kasir / 12345<br>
                    Pelanggan: pelanggan1 / 12345
                </small>
            </div>
        </div>
    </div>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>

<?php
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo '<script>alert("Username dan Password tidak boleh kosong!");</script>';
    } else {
        // LANGSUNG BANDINGKAN PASSWORD (tanpa hash)
        $query = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND is_active = 1");
        $user = mysqli_fetch_array($query);
        
        if ($user) {
            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['role'] = $user['role'];
            
            mysqli_query($koneksi, "UPDATE users SET last_login = NOW() WHERE id_user = '{$user['id_user']}'");
            
            header("location:index.php");
            exit;
        } else {
            echo '<div class="alert alert-danger alert-dismissible" style="position:fixed;top:20px;right:20px;z-index:9999;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i> Login Gagal!</h5>
                    Username atau Password salah!
                  </div>';
        }
    }
}
?>