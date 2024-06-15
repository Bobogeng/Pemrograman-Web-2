<?php
require_once $root . 'dbkoneksi.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM pasien WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);

    header("Location: {$root}data-pasien.php");
    exit();
} else {
    header("Location: {$root}data-pasien.php");
    exit();
}
