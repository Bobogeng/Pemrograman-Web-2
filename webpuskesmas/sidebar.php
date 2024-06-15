<?php
if (!isset($root)) {
    $root = "";
}

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: {$root}login.php");
    exit();
}
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= $root ?>index.php" class="brand-link">
        <img src="<?= $root ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Puskesmas</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= $root ?>dist/img/avatar4.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $_SESSION['name'] ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= $root ?>index.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?= ucfirst($_SESSION['role']) ?></p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php if ($_SESSION['role'] === 'admin') { ?>
                    <li class="nav-header">Data Puskesmas</li>
                    <li class="nav-item">
                        <a href="<?= $root ?>data-pasien.php" class="nav-link">
                            <i class="fas fa-user nav-icon"></i>
                            <p>Data Pasien</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $root ?>kelurahan.php" class="nav-link">
                            <i class="fas fa-landmark nav-icon"></i>
                            <p>Kelurahan</p>
                        </a>
                    </li>
                <?php } ?>
                <li class="nav-header">Autentikasi</li>
                <li class="nav-item">
                    <a href="?logout" class="nav-link">
                        <i class="fas fa-door-closed nav-icon"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>