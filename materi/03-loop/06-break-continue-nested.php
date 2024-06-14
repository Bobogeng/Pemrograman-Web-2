<?php
for ($i = 1; $i <= 3; $i++) {
    echo "Iterasi loop luar: $i\n";
    for ($j = 1; $j <= 3; $j++) {
        echo "Iterasi loop dalam: $j\n";
        if ($j === 1) {
            echo "Melewati iterasi loop dalam $j\n";
            continue; // Lanjut ke iterasi berikutnya dalam loop dalam
        }
        if ($i === 2 && $j === 2) {
            echo "Menghentikan kedua loop pada iterasi $i-$j\n";
            break 2; // Menghentikan kedua loop secara bersamaan
        }
    }
}
