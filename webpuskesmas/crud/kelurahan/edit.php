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

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM kelurahan WHERE id='$id'";
    $query = $dbh->query($sql);
    $kelurahan = $query->fetch();

    if (!$kelurahan) {
        header("Location: {$root}kelurahan.php");
        exit();
    }
} else {
    header("Location: {$root}kelurahan.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['nama'])) {
        $namaErr = 'Nama tidak boleh kosong!';
    } else {
        $nama = test_input($_POST['nama']);
    }

    if ($nama) {
        $sql = "SELECT * FROM kelurahan WHERE id='$id'";
        $query = $dbh->query($sql);
        $data = $query->fetchObject();
        if ($data->nama !== $nama) {
            $sql = "SELECT * FROM kelurahan WHERE nama='$nama'";
            $query = $dbh->query($sql);
            $data = $query->fetchObject();
            if ($data) {
                if ($data->nama === $nama) {
                    $namaErr = 'Nama sudah dipakai';
                }
            }
        }
    }

    if (!$namaErr) {
        $sql = "UPDATE kelurahan SET nama = ? WHERE id = ?";
        $dbh->prepare($sql)->execute([$nama, $id]);
        header("Location: {$root}kelurahan.php");
        exit();
    }
}
