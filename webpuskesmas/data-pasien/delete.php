<?php
$root = "../";

session_start();

require_once "../crud/data-pasien/delete.php";

if (!isset($_SESSION['username']) && !isset($_SESSION['name']) && !isset($_SESSION['role'])) {
    header("Location: {$root}login.php");
    exit();
};

if ($_SESSION['role'] === 'user') {
    header("Location: {$root}index.php");
    exit();
}
