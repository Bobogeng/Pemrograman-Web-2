<?php
session_start();

require_once 'dbkoneksi.php';

$nameErr = $usernameErr = $passwordErr = $konfPasswordErr = $authenticationErr = '';
$name = $username = $password = $konfPassword = '';

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['name'])) {
        $nameErr = 'Nama tidak boleh kosong!';
    } else {
        $name = test_input($_POST['name']);
    }
    if (empty($_POST['username'])) {
        $usernameErr = 'Username tidak boleh kosong!';
    } else {
        $username = test_input($_POST['username']);
    }
    if (empty($_POST['password'])) {
        $passwordErr = 'Password tidak boleh kosong!';
    } else {
        $password = md5(test_input($_POST['password']));
    }
    if (empty($_POST['konfirmasi-password'])) {
        $konfPasswordErr = 'Konfirmasi Password tidak boleh kosong!';
    } else if ($password !== $konfPassword) {
        $konfPassword = 'Konfirmasi Password harus sesuai';
    }

    $authenticated = false;

    if (!$nameErr && !$usernameErr && !$passwordErr && !$konfPasswordErr) {
        $sql = "SELECT * FROM user WHERE username='$username'";
        $query = $dbh->query($sql);
        $user = $query->fetchObject();

        if ($user->username === $username) {
            $authenticationErr = 'Username sudah dipakai';
        }

        if (!$authenticationErr) {
            $sql = "INSERT INTO user (username, name, password) VALUE (?,?,?)";
            $dbh->prepare($sql)->execute([$username, $name, $password]);
            $authenticated = true;
        }
    }

    if ($authenticated) {
        header("location: login.php");
    } else if (!$authenticationErr) {
        $authenticationErr = 'Pastikan form sudah diisi dengan benar!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Puskesmas | Register</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <!-- /.register-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <p class="h1"><b>Puskesmas</b></p>
            </div>
            <div class="card-body">
                <p class="register-box-msg">Silahkan register user baru</p>

                <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <div class="mb-4">
                        <div class="input-group">
                            <input name="name" type="text" class="form-control" placeholder="Nama">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user-alt"></span>
                                </div>
                            </div>
                        </div>
                        <span class="text-red"><?= $nameErr ?></span>
                    </div>
                    <div class="mb-4">
                        <div class="input-group">
                            <input name="username" type="text" class="form-control" placeholder="Username">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user-alt"></span>
                                </div>
                            </div>
                        </div>
                        <span class="text-red"><?= $usernameErr ?></span>
                    </div>
                    <div class="mb-4">
                        <div class="input-group">
                            <input name="password" type="password" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <span class="text-red"><?= $passwordErr ?></span>
                    </div>
                    <div class="mb-4">
                        <div class="input-group">
                            <input name="konfirmasi-password" type="password" class="form-control" placeholder="Konfirmasi Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <span class="text-red"><?= $konfPasswordErr ?></span>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </form>

                <p class="mb-0 mt-1 text-center">
                    <a href="login.php" class="text-center">Login ke akun yang ada</a>
                </p>

                <span class="d-block text-red text-center mt-1"><?= $authenticationErr ?></span>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
</body>

</html>