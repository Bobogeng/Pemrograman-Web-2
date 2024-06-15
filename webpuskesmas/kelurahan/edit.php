<?php
$root = "../";

session_start();

if (!isset($_SESSION['username']) && !isset($_SESSION['name']) && !isset($_SESSION['role'])) {
    header("Location: {$root}login.php");
    exit();
};

if ($_SESSION['role'] === 'user') {
    header("Location: {$root}index.php");
    exit();
}

require_once "../crud/kelurahan/edit.php";
include_once "../header.php";
include_once "../sidebar.php";

$home = 'Home';
$title = 'Data Kelurahan';
$crud = 'Edit Kelurahan';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $crud ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= $root ?>index.php"><?= $home ?></a></li>
                        <li class="breadcrumb-item"><a href="<?= $root ?>kelurahan.php"><?= $title ?></a></li>
                        <li class="breadcrumb-item active"><?= $crud ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><?= $crud ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Anda" value="<?= $kelurahan['nama']  ?>">
                                    <span class="text-red"><?= $namaErr ?></span>
                                </div>
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include_once "../footer.php"
?>