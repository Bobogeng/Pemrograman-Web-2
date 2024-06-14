<?php
function tambah(...$angka) {
    $hasil = 0;
    foreach ($angka as $value) {
        $hasil += $value;
    }
    echo $hasil;
}

tambah(1, 1, 1, 1, 1, 1, 1); // Mencetak 4