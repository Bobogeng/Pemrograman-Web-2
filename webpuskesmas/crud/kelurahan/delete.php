<?php
require_once $root . 'dbkoneksi.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM kelurahan WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);

    header("Location: {$root}kelurahan.php");
    exit();
} else {
    header("Location: {$root}kelurahan.php");
    exit();
}
