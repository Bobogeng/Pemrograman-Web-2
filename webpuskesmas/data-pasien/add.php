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

require_once "../crud/data-pasien/add.php";
include_once "../header.php";
include_once "../sidebar.php";

$home = 'Home';
$title = 'Data Pasien';
$crud = 'Tambah Pasien';
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
                        <li class="breadcrumb-item"><a href="<?= $root ?>data-pasien.php"><?= $title ?></a></li>
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
                                    <label for="kode">Kode</label>
                                    <input type="text" class="form-control" id="kode" name="kode" placeholder="Masukkan kode Anda">
                                    <span class="text-red"><?= $kodeErr ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Anda">
                                    <span class="text-red"><?= $namaErr ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="tmp_lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" placeholder="Masukkan tempat lahir Anda">
                                    <span class="text-red"><?= $tmp_lahirErr ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input id="tgl_lahir" name="tgl_lahir" type="text" class="form-control datetimepicker-input" data-target="#reservationdate" />
                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    <span class="text-red"><?= $tgl_lahirErr ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="gender">
                                        Gender
                                    </label>
                                    <div class="icheck-primary">
                                        <input type="radio" id="laki" name="gender" value="L">
                                        <label for="laki">
                                            Laki-laki
                                        </label>
                                    </div>
                                    <div class="icheck-primary">
                                        <input type="radio" id="perempuan" name="gender" value="P">
                                        <label for="perempuan">
                                            Perempuan
                                        </label>
                                    </div>
                                    <span class="text-red"><?= $genderErr ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email Anda">
                                    <span class="text-red"><?= $emailErr ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea id="alamat" name="alamat" class="form-control" rows="3" placeholder="Masukkan alamat Anda"></textarea>
                                    <span class="text-red"><?= $alamatErr ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="kelurahan_id">Kelurahan</label>
                                    <select id="kelurahan_id" name="kelurahan_id" class="form-control select2" style="width: 100%;">
                                        <?php
                                        if ($kelurahan) {
                                            foreach ($kelurahan as $row) { ?>
                                                <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                                        <?php }
                                        } ?>
                                    </select>
                                    <span class="text-red"><?= $kelurahan_idErr ?></span>
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah</button>
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