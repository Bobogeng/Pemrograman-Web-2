<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: 404.php");
    exit();
}

include_once 'header.php';
include_once 'sidebar.php';

$praktikum = 'Praktikum 1';
$title = 'Array Buah';
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
                        <li class="breadcrumb-item"><a href="#"><?= $praktikum ?></a></li>
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

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php
                            $ar_buah = ["Pepaya", "Mangga", "Pisang", "Jambu"];

                            // Cetak buah index ke-2
                            echo $ar_buah[2];

                            // Cetak jumlah buah
                            echo '</br>Jumlah Buah : ' . count($ar_buah);

                            // Cetak seluruh buah
                            echo '<ol>';
                            foreach ($ar_buah as $buah) {
                                echo '<li>' . $buah . '</li>';
                            }
                            echo '</ol>';

                            // Tambahkan buah
                            $ar_buah[] = "Durian";
                            array_push($ar_buah, "Apel", "Salak");
                            print_r($ar_buah);
                            echo '</br>';

                            // Hapus buah index ke-1
                            unset($ar_buah[1]);
                            print_r($ar_buah);
                            echo '</br>';

                            // Ubah index ke-2 menjadi Manggis
                            $ar_buah[2] = "Manggis";
                            print_r($ar_buah);

                            // Cetak seluruh buah dengan index-nya
                            echo '<ul>';
                            foreach ($ar_buah as $k => $v) {
                                echo "<li>Buah index - $k adalah $v";
                            }
                            echo '</ul>';
                            ?>
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