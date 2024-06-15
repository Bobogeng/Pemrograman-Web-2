<?php
session_start();

if (!isset($_SESSION['username']) && !isset($_SESSION['name']) && !isset($_SESSION['role'])) {
    header("Location: login.php");
    exit();
};

if ($_SESSION['role'] === 'user') {
    header("Location: index.php");
    exit();
}

include_once 'header.php';
include_once 'sidebar.php';
require_once 'dbkoneksi.php';

$home = 'Home';
$title = 'Data Kelurahan';

$sql = "SELECT * FROM kelurahan";
$query = $dbh->query($sql);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php"><?= $home ?></a></li>
                        <li class="breadcrumb-item active"><?= $title ?></li>
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
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title"><?= $title ?></h3>
                                <a type="button" class="btn btn-primary btn-sm" href="kelurahan/add.php">Tambah</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nomor = 1;
                                    foreach ($query as $row) {
                                    ?>
                                        <tr>
                                            <td class="col-1"><?= $nomor++ ?></td>
                                            <td><?= $row['nama'] ?></td>
                                            <td class="col-2">
                                                <a type="button" class="btn btn-warning btn-sm" href="kelurahan/edit.php?id=<?= $row['id'] ?>">Ubah</a>
                                                <a type="button" class="btn btn-danger btn-sm" href="kelurahan/delete.php?id=<?= $row['id'] ?>">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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
include_once 'footer.php';
?>