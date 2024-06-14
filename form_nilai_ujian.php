<?php
require_once 'class_nilaimahasiswa.php';

$nim = $matakuliah = $nilai = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST['nim'];
    $matakuliah = $_POST['matakuliah'];
    $nilai = $_POST['nilai'];

    $nilaiMahasiswa = new NilaiMahasiswa($matakuliah, $nilai, $nim);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Nilai Ujian</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <div>
            <div>
                <div class="mb-4">
                    <h3>Form Nilai Ujian</h3>
                    <hr>
                </div>
                <div class="row justify-content-center">
                    <form class="col-md-6" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="form-group row">
                            <label for="nim" class="col-4 col-form-label">NIM</label>
                            <div class="col-8">
                                <input id="nim" name="nim" placeholder="Masukkan NIM Anda" type="text" class="form-control" required="required">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4 col-form-label" for="matakuliah">Pilih Mata Kuliah</label>
                            <div class="col-8">
                                <select id="matakuliah" name="matakuliah" class="custom-select" required="required">
                                    <option value="Pemrograman Web 2">Pemrograman Web 2</option>
                                    <option value="Data Warehouse">Data Warehouse</option>
                                    <option value="Manajamen Proyek">Manajamen Proyek</option>
                                    <option value="Statistika">Statistika</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nilai" class="col-4 col-form-label">Nilai</label>
                            <div class="col-8">
                                <input id="nilai" name="nilai" placeholder="Masukkan Nilai Anda" type="text" class="form-control" required="required">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-4 col-8">
                                <button name="simpan" type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
                <hr>
                <?php if (isset($nilaiMahasiswa)) : ?>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="alert alert-success" role="alert">
                                <strong>NIM :</strong> <?php echo $nilaiMahasiswa->nim; ?><br>
                                <strong>Nama Mata Kuliah :</strong> <?php echo $nilaiMahasiswa->matakuliah; ?><br>
                                <strong>Nilai :</strong> <?php echo $nilaiMahasiswa->nilai; ?><br>
                                <strong>Hasil :</strong> <?php echo $nilaiMahasiswa->hasil(); ?><br>
                                <strong>Grade :</strong> <?php echo $nilaiMahasiswa->grade(); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>

</html>