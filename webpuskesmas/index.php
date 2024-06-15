<?php
session_start();

if (!isset($_SESSION['username']) && !isset($_SESSION['name']) && !isset($_SESSION['role'])) {
    header("Location: login.php");
    exit();
};

require_once 'crud/user/delete.php';
require_once 'crud/user/edit.php';
include_once 'header.php';
include_once 'sidebar.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= ucfirst($_SESSION['role']) ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?= ucfirst($_SESSION['role']) ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-4">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <h3 class="profile-username text-center text-xl"><?= $_SESSION['name'] ?></h3>

                            <p class="text-muted text-center text-lg"><?= $_SESSION['username'] ?></p>

                            <button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#ubah">
                                Ubah Akun
                            </button>
                            <?php if ($_SESSION['role'] === 'user') { ?>
                                <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#hapus">
                                    Hapus Akun
                                </button>
                            <?php } ?>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <div class="modal fade" id="ubah">
            <form action="" method="post">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div>
                                <h4 class="modal-title">Ubah Akun</h4>
                                <span class="text-red"><?= $editError ?></span>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username Anda" value="<?= $user['username'] ?>">
                                <span class="text-red"><?= $usernameErr ?></span>
                            </div>
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama Anda" value="<?= $user['name'] ?>">
                                <span class="text-red"><?= $nameErr ?></span>
                            </div>
                            <?php if ($_SESSION['role'] === 'admin') { ?>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="form-control select2" style="width: 100%;" name="role">
                                        <option selected="selected">admin</option>
                                        <option>user</option>
                                    </select>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-warning" name="edit">Ubah</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </form>
        </div>
        <div class="modal fade" id="hapus">
            <form action="" method="post">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Hapus Akun</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus akun anda?</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger" name="hapus" value="<?= $_SESSION['username'] ?>">Hapus</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include_once 'footer.php';
?>