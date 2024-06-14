<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<?php
if (isset($_POST['submit'])) {
    $customer = $_POST['customer'];
    $produk = $_POST['produk'];
    $jumlah = $_POST['jumlah'];
    $ar_produk = [
        'TV' => 4200000,
        'KULKAS' => 3100000,
        'MESIN CUCI' => 3800000
    ];

    $produk_value = isset($ar_produk[$produk]) ? $ar_produk[$produk] : "Tidak ditemukan";
    $total_belanja = number_format($produk_value * $jumlah, 0, ',', '.');
}
?>

<form action="form_belanja.php" method="post">
    <div class="form-group row">
        <label for="customer" class="col-4 col-form-label">Customer</label>
        <div class="col-8">
            <input id="customer" name="customer" placeholder="Nama Customer" type="text" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-4">Pilih Produk</label>
        <div class="col-8">
            <div class="custom-control custom-radio custom-control-inline">
                <input name="produk" id="produk_0" type="radio" class="custom-control-input" value="TV">
                <label for="produk_0" class="custom-control-label">TV</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input name="produk" id="produk_1" type="radio" class="custom-control-input" value="KULKAS">
                <label for="produk_1" class="custom-control-label">KULKAS</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input name="produk" id="produk_2" type="radio" class="custom-control-input" value="MESIN CUCI">
                <label for="produk_2" class="custom-control-label">MESIN CUCI</label>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="jumlah" class="col-4 col-form-label">Jumlah</label>
        <div class="col-8">
            <input id="jumlah" name="jumlah" placeholder="Jumlah" type="text" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <div class="offset-4 col-8">
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
<hr>
<?php
if (isset($_POST['submit'])) {
    echo "Nama Customer : $customer</br>";
    echo "Produk Pilihan : $produk</br>";
    echo "Jumlah Beli : $jumlah</br>";
    echo "Total Belanja : $total_belanja</br>";
}
?>