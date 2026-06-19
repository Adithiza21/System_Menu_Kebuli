<?php
session_start();
require_once("config/koneksi.php");

if(!isset($_SESSION['id_user'])) {
    header("location:login.php");
    exit;
}

$role = $_SESSION['role'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restoran Kebuli</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index.php" class="nav-link">Home</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="index.php" class="brand-link">
            <img src="dist/img/logo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Resto Kebuli</span>
        </a>

        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="dist/img/user.png" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?php echo $_SESSION['nama']; ?></a>
                    <small><?php echo ucfirst($role); ?></small>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    
                    <!-- Dashboard -->
                    <li class="nav-item">
                        <a href="index.php" class="nav-link <?php echo !isset($_GET['page']) ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <?php if ($role == 'admin') : ?>
                    <!-- Master Data -->
                    <li class="nav-item <?php echo (isset($_GET['page']) && in_array($_GET['page'], ['users','meja','menu','promo','bahan_baku','resep'])) ? 'menu-open' : ''; ?>">
                        <a href="#" class="nav-link <?php echo (isset($_GET['page']) && in_array($_GET['page'], ['users','meja','menu','promo','bahan_baku','resep'])) ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-database"></i>
                            <p>Master Data <i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="index.php?page=users" class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'users') ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Users</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?page=meja" class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'meja') ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Meja</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?page=menu" class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'menu') ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Menu</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?page=promo" class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'promo') ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Promo</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?page=bahan_baku" class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'bahan_baku') ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Bahan Baku</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?page=resep" class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'resep') ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Resep</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Transaksi -->
                    <li class="nav-item <?php echo (isset($_GET['page']) && in_array($_GET['page'], ['pesanan','pengeluaran'])) ? 'menu-open' : ''; ?>">
                        <a href="#" class="nav-link <?php echo (isset($_GET['page']) && in_array($_GET['page'], ['pesanan','pengeluaran'])) ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-chart-line"></i>
                            <p>Transaksi <i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="index.php?page=pesanan" class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'pesanan') ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pesanan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?page=pengeluaran" class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'pengeluaran') ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pengeluaran</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <?php if ($role == 'kasir') : ?>
                    <!-- Kasir Menu -->
                    <li class="nav-item <?php echo (isset($_GET['page']) && in_array($_GET['page'], ['pesanan','meja'])) ? 'menu-open' : ''; ?>">
                        <a href="#" class="nav-link <?php echo (isset($_GET['page']) && in_array($_GET['page'], ['pesanan','meja'])) ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-cash-register"></i>
                            <p>Kasir <i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="index.php?page=pesanan" class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'pesanan') ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pesanan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?page=meja" class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'meja') ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Meja</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <!-- Logout -->
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">
                            <?php 
                                if(isset($_GET['page'])) {
                                    $page_title = $_GET['page'];
                                    echo ucfirst(str_replace('_', ' ', $page_title));
                                } else {
                                    echo "Dashboard";
                                }
                            ?>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">
                                <?php 
                                    if(isset($_GET['page'])) {
                                        echo ucfirst(str_replace('_', ' ', $_GET['page']));
                                    } else {
                                        echo "Dashboard";
                                    }
                                ?>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                            if (isset($_GET['page'])) {
                                $page = $_GET['page'];
                            } else {
                                $page = "";
                            }
                            if ($page == "") {
                                include "page/dashboard.php";
                            } elseif (!file_exists("page/$page.php")) {
                                echo '<div class="alert alert-danger">File Halaman Tidak Ditemukan: page/' . $page . '.php</div>';
                            } else {
                                include "page/$page.php";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="main-footer">
        <div class="float-right d-none d-sm-inline">
            Restoran Kebuli
        </div>
        <strong>Copyright &copy; 2024 <a href="#">Resto Kebuli</a>.</strong> All rights reserved.
    </footer>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>