<?php
require_once("class_mahasiswa.php");

$mahasiswa1 = new Mahasiswa("02011", "Faiz Fikri");
$mahasiswa1->thn_angkatan = 2012;
$mahasiswa1->prodi = "Teknik Informatika";
$mahasiswa1->ipk = 3.5;

$mahasiswa2 = new Mahasiswa("02012", "Alissa Khairunnisa");
$mahasiswa2->thn_angkatan = 2012;
$mahasiswa2->prodi = "Sistem Informasi";
$mahasiswa2->ipk = 3.2;

$mahasiswa3 = new Mahasiswa("01011", "Rosalie Naurah");
$mahasiswa3->thn_angkatan = 2010;
$mahasiswa3->prodi = "Manajemen";
$mahasiswa3->ipk = 2.8;

$mahasiswa4 = new Mahasiswa("01012", "Defghi Muhammad");
$mahasiswa4->thn_angkatan = 2010;
$mahasiswa4->prodi = "Akuntansi";
$mahasiswa4->ipk = 3.2;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tables - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="my-4">Daftar Mahasiswa</h1>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            DataTable Mahasiswa
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Prodi</th>
                                        <th>Thn Angkatan</th>
                                        <th>IPK</th>
                                        <th>Predikat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $mahasiswas = [$mahasiswa1, $mahasiswa2, $mahasiswa3, $mahasiswa4];
                                    $counter = 1;
                                    foreach ($mahasiswas as $mahasiswa) {
                                    ?>
                                        <tr>
                                            <td><?php echo $counter++; ?></td>
                                            <td><?php echo $mahasiswa->nim; ?></td>
                                            <td><?php echo $mahasiswa->nama; ?></td>
                                            <td><?php echo $mahasiswa->prodi; ?></td>
                                            <td><?php echo $mahasiswa->thn_angkatan; ?></td>
                                            <td><?php echo $mahasiswa->ipk; ?></td>
                                            <td><?php echo $mahasiswa->predikat_ipk(); ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>