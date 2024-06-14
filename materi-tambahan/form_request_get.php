<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="form_request_get.php" method="get">
    <label for="nama">Masukkan nama Anda:</label>
    <input name="nama" id="nama" type="text" />
    <label for="umur">Masukkan umur Anda:</label>
    <input name="umur" id="umur" type="number" />
    <button type="submit">Submit</button>
  </form>
  <p>
    <?php if (isset($_GET['nama'])) { ?>
      Halo <?php echo htmlspecialchars($_GET['nama']); ?>.
      Kamu berumur <?php echo (int)$_GET['umur']; ?> tahun.
    <?php } ?>
  </p>
</body>

</html>