<?php
require_once 'dbkoneksi.php';

if (isset($_POST['hapus']) && $_SESSION['role'] !== 'admin') {
    $username = $_SESSION['username'];
    $sql = "DELETE FROM user WHERE username='$username'";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}
