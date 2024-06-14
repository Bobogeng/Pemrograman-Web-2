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
