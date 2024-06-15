<?php
require_once $root . 'dbkoneksi.php';

$namaErr = '';
$nama = '';

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['nama'])) {
        $namaErr = 'Nama tidak boleh kosong!';
    } else {
        $nama = test_input($_POST['nama']);
    }

    if ($nama) {
        $sql = "SELECT * FROM kelurahan WHERE nama='$nama'";
        $query = $dbh->query($sql);
        $kelurahan = $query->fetchObject();
        if ($kelurahan) {
            if ($kelurahan->nama === $nama) {
                $namaErr = 'Nama sudah dipakai';
            }
        }
    }

    if (!$namaErr) {
        $sql = "INSERT INTO kelurahan (nama) VALUE (?)";
        $dbh->prepare($sql)->execute([$nama]);
        header("Location: {$root}kelurahan.php");
        exit();
    }
}
