<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="form_request_request.php" method="post">
    <label for="nama">Masukkan nama Anda:</label>
    <input name="nama" id="nama" type="text" />
    <label for="umur">Masukkan umur Anda:</label>
    <input name="umur" id="umur" type="number" />
    <button type="submit">Submit</button>
  </form>
  <p>
    <?php if (isset($_REQUEST['nama'])) { ?>
      Halo <?php echo htmlspecialchars($_REQUEST['nama']); ?>.
      Kamu berumur <?php echo (int)$_REQUEST['umur']; ?> tahun.
    <?php } ?>
  </p>
</body>

</html>