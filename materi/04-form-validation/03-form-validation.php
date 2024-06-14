<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
$nama = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = test_input($_POST["nama"]); // Menggunakan fungsi test_input()
    $email = test_input($_POST["email"]); // Menggunakan fungsi test_input()
}
?>

<body>
    <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nama">Masukkan nama Anda:</label>
        <input name="nama" id="nama" type="text" />
        <label for="email">Masukkan email Anda:</label>
        <input name="email" id="email" type="email" />
        <button name="submit" type="submit">Submit</button>
    </form>
</body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<br>";
    echo "Nama: $nama<br>";
    echo "Email: $email";
}
?>

</html>