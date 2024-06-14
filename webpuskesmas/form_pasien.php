<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: 404.php");
    exit();
}

include_once 'header.php';
include_once 'sidebar.php';
require_once 'dbkoneksi.php';

$home = 'Home';
$title = 'Tambah Pasien';

if ($_SERVER("REQUEST_METHOD") == "POST") {
    $_kode = $_POST['kode'];
    $_nama = $_POST['nama'];
    $_tmp_lahir = $_POST['tmp_lahir'];
    $_tgl_lahir = $_POST['tgl_lahir'];
    $_gender = $_POST['gender'];
    $_email = $_POST['email'];
    $_alamat = $_POST['alamat'];
    $_kelurahan = $_POST['kelurahan'];

    $data = [$_kode, $_nama, $_tmp_lahir, $_tgl_lahir, $_gender, $_email, $_alamat, $_kelurahan];
    $_proses = $_POST['proses'];
    if ($_proses == "Simpan") {
        $sql = "INSERT INTO pasien(kode, nama, tmp_lahir, tgl_lahir, gender, email, alamat, kelurahan_id)
VALUES(?, ?, ?, ?, ?, ?, ?)";
        $stmt = $dbh->prepare($sql);
        $stmt->execute($data);
    }
    header('Location: data_pasien.php');
}

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
                        <li class="breadcrumb-item"><a href="#"><?= $home ?></a></li>
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
                            <h3 class="card-title"><?= $title ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="data_pasien" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="data_pasien_info">
                                <thead>
                                    <tr>
                                        <th class="sorting" tabindex="0" aria-controls="data_pasien" rowspan="1" colspan="1" aria-sort="ascending">No</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_pasien" rowspan="1" colspan="1">Kode</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_pasien" rowspan="1" colspan="1">Nama Pasien</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_pasien" rowspan="1" colspan="1">Alamat</th>
                                        <th class="sorting" tabindex="0" aria-controls="data_pasien" rowspan="1" colspan="1">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form>
                                        <div class="form-group row">
                                            <label for="kode" class="col-4 col-form-label">Kode</label>
                                            <div class="col-8">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-address-card"></i>
                                                        </div>
                                                    </div>
                                                    <input id="kode" name="kode" placeholder="Masukkan Kode" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col-4 col-form-label">Nama Lengkap</label>
                                            <div class="col-8">
                                                <input id="nama" name="nama" placeholder="Masukkan Nama Lengkap Anda" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tmp_lahir" class="col-4 col-form-label">Tempat Lahir</label>
                                            <div class="col-8">
                                                <input id="tmp_lahir" name="tmp_lahir" placeholder="Masukkan Tempat Lahir Anda" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tgl_lahir" class="col-4 col-form-label">Tanggal Lahir</label>
                                            <div class="col-8">
                                                <input id="tgl_lahir" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir Anda" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-4">Jenis Kelamin</label>
                                            <div class="col-8">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input name="gender" id="gender_0" type="radio" class="custom-control-input" value="L">
                                                    <label for="gender_0" class="custom-control-label">Laki-laki</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input name="gender" id="gender_1" type="radio" class="custom-control-input" value="P">
                                                    <label for="gender_1" class="custom-control-label">Perempuan</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-4 col-form-label">Email</label>
                                            <div class="col-8">
                                                <input id="email" name="email" placeholder="Masukkan Email Anda" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="alamat" class="col-4 col-form-label">Alamat</label>
                                            <div class="col-8">
                                                <textarea id="alamat" name="alamat" cols="40" rows="5" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="kelurahan" class="col-4 col-form-label">Kelurahan</label>
                                            <div class="col-8">
                                                <select id="kelurahan" name="kelurahan" class="custom-select"></select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-4 col-8">
                                                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
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