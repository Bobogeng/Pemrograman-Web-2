<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<?php
// Fungsi test sebuah variabel input
function test_input($data) {
    $data = trim($data); // Menghapus whitespace
    $data = stripslashes($data); // Menghapus “\”
    $data = htmlspecialchars($data);
    return $data;
}

// Definisi variabel kosong setiap website di refresh
$namaErr = $emailErr = "";
$nama = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nama"])) { // Cek variabel post nama kosong
        $namaErr = "Nama wajib diisi"; // Variabel error diisi
    } else { // Apabila variabel tidak kosong, maka
        $nama = test_input($_POST["nama"]); // Menggunakan fungsi test_input()
    }
    if (empty($_POST["email"])) { // Cek variabel post email kosong
        $emailErr = "Email wajib diisi"; // Variabel error diisi
    } else { // Apabila variabel tidak kosong, maka
        $email = test_input($_POST["email"]); // Menggunakan fungsi test_input()
    }
}
?>

<body>
    <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nama">Masukkan nama Anda:</label>
        <input name="nama" id="nama" type="text" />
        <span class="error">* <?= $namaErr; ?></span> <!-- * Nama wajib diisi -->
        <br><br>
        <label for="email">Masukkan email Anda:</label>
        <input name="email" id="email" type="email" />
        <span class="error">* <?= $emailErr; ?></span> <!-- * Email wajib diisi -->
        <br><br>
        <button name="submit" type="submit">Submit</button>
    </form>
</body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($namaErr) && empty($emailErr)) {
    echo "<br>";
    echo "Nama: $nama<br>";
    echo "Email: $email";
}
?>

</html>