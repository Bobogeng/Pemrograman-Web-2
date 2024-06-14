<?php
for ($i = 1; $i <= 10; $i++) {
    if ($i === 1) {  // Apabila $i === 1 maka jalankan blok kode
        echo $i . "\n"; // Cetak 1
        continue; // Skip perulangan ke iterasi selanjutnya 
    }
    if ($i === 2) { // Apabila $i === 2 maka jalankan blok kode
        echo $i; // Cetak 2
        break; // Memberhentikan perulangan pada iterasi ini
    }
    echo $i; // Tidak akan di cetak apabila $i bernilai 1 & 2
}
