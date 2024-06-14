<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["nama"];
    $email = $_POST["email"];
}
?>

<body>
    <!-- http://localhost:3000/04-form-validation/02-form-hacked.php/%22%3E%3Cscript%3Ealert('hacked')%3C/script%3E -->
    <!-- <form method="post" action="form_hacked.php"><script>alert("hacked")</script> -->
    <form method="post" action="<?= $_SERVER["PHP_SELF"]; ?>">
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
    echo "Nama: $name<br>";
    echo "Email: $email";
}
?>

</html>