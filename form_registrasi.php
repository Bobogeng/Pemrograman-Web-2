<?php
require_once "opsi_registrasi.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="margin: 24px;">
    <form action="proses_registrasi.php" method="post">
        <div class="form-group row">
            <label for="nim" class="col-4 col-form-label">NIM</label>
            <div class="col-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-address-card"></i>
                        </div>
                    </div>
                    <input id="nim" name="nim" placeholder="Masukkan NIM Anda" type="text" class="form-control" required="required">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="nama" class="col-4 col-form-label">Nama Lengkap</label>
            <div class="col-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-address-book"></i>
                        </div>
                    </div>
                    <input id="nama" name="nama" placeholder="Masukkan Nama Anda" type="text" class="form-control" required="required">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4">Jenis Kelamin</label>
            <div class="col-8">
                <div class="custom-control custom-radio custom-control-inline">
                    <input name="jenis_kelamin" id="jenis_kelamin_0" type="radio" required="required" class="custom-control-input" value="L">
                    <label for="jenis_kelamin_0" class="custom-control-label">Laki-laki</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input name="jenis_kelamin" id="jenis_kelamin_1" type="radio" required="required" class="custom-control-input" value="P">
                    <label for="jenis_kelamin_1" class="custom-control-label">Perempuan</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="prodi" class="col-4 col-form-label">Program Studi</label>
            <div class="col-8">
                <select id="prodi" name="prodi" class="custom-select" required="required">
                    <?php foreach ($ar_prodi as $k => $v) {
                        echo "<option value=$k>$v</option>";
                    } ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4">Skill Web &amp; Programming</label>
            <div class="col-8">
                <?php
                $i = 0;
                foreach ($ar_skill as $k => $v) {
                    ++$i;
                ?>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="skill[]" id="skill_<?= $i ?>" type="checkbox" class="custom-control-input" value="<?= $k ?>">
                        <label for="skill_<?= $i ?>" class="custom-control-label"><?= $k ?></label>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="domisili" class="col-4 col-form-label">Tempat Domisili</label>
            <div class="col-8">
                <select id="domisili" name="domisili" class="custom-select" required="required">
                    <?php foreach ($ar_domisili as $value) {
                        echo "<option value=$v>$value</option>";
                    } ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-4 col-form-label">Email</label>
            <div class="col-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-envelope"></i>
                        </div>
                    </div>
                    <input id="email" name="email" placeholder="Masukkan Email Anda" type="text" class="form-control" required="required">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</body>

</html>