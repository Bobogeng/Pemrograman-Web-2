<?php
require_once $root . 'dbkoneksi.php';

$kodeErr = $namaErr = $tmp_lahirErr = $tgl_lahirErr = $genderErr = $emailErr = $alamatErr = $kelurahan_idErr = '';
$kode = $nama = $tmp_lahir = $tgl_lahir = $gender = $email = $alamat = $kelurahan_id = '';

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM pasien WHERE id='$id'";
    $query = $dbh->query($sql);
    $pasien = $query->fetch();

    if (!$pasien) {
        header("Location: {$root}data-pasien.php");
        exit();
    }
} else {
    header("Location: {$root}data-pasien.php");
    exit();
}


$sql = "SELECT * FROM kelurahan";
$query = $dbh->query($sql);
$kelurahan = $query->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['kode'])) {
        $kodeErr = 'Kode tidak boleh kosong!';
    } else {
        $kode = test_input($_POST['kode']);
    }
    if (empty($_POST['nama'])) {
        $namaErr = 'Nama tidak boleh kosong!';
    } else {
        $nama = test_input($_POST['nama']);
    }
    if (empty($_POST['tmp_lahir'])) {
        $tmp_lahirErr = 'Tempat Lahir tidak boleh kosong!';
    } else {
        $tmp_lahir = test_input($_POST['tmp_lahir']);
    }
    if (empty($_POST['tgl_lahir'])) {
        $tgl_lahirErr = 'Tanggal Lahir tidak boleh kosong!';
    } else {
        $tgl_lahir = test_input($_POST['tgl_lahir']);
        $tgl_lahir = date("Y-m-d", strtotime($tgl_lahir));
    }
    if (empty($_POST['gender'])) {
        $genderErr = 'Gender tidak boleh kosong!';
    } else {
        $gender = test_input($_POST['gender']);
    }
    if (empty($_POST['email'])) {
        $emailErr = 'Email tidak boleh kosong!';
    } else {
        $email = test_input($_POST['email']);
    }
    if (empty($_POST['alamat'])) {
        $alamatErr = 'Alamat tidak boleh kosong!';
    } else {
        $alamat = test_input($_POST['alamat']);
    }
    if (empty($_POST['kelurahan_id'])) {
        $kelurahan_idErr = 'Kelurahan tidak boleh kosong!';
    } else {
        $kelurahan_id = test_input($_POST['kelurahan_id']);
    }

    if ($kode) {
        $sql = "SELECT * FROM pasien WHERE id='$id'";
        $query = $dbh->query($sql);
        $data = $query->fetchObject();
        if ($data->kode !== $kode) {
            $sql = "SELECT * FROM pasien WHERE kode='$kode'";
            $query = $dbh->query($sql);
            $data = $query->fetchObject();
            if ($data) {
                if ($data->kode === $kode) {
                    $kodeErr = 'Kode sudah dipakai';
                }
            }
        }
    }

    if (!$kodeErr && !$namaErr && !$tmp_lahirErr && !$tgl_lahirErr && !$genderErr && !$emailErr && !$alamatErr && !$kelurahan_idErr) {
        $sql = "UPDATE pasien SET kode = ?, nama = ?, tmp_lahir = ?, tgl_lahir = ?, gender = ?, email = ?, alamat = ?, kelurahan_id = ? WHERE id = ?";
        $dbh->prepare($sql)->execute([$kode, $nama, $tmp_lahir, $tgl_lahir, $gender, $email, $alamat, $kelurahan_id, $id]);
        header("Location: {$root}data-pasien.php");
        exit();
    }
}
