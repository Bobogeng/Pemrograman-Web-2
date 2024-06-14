<?php
$i = 1;
while ($i <= 10) {
    /**
     * Mencetak 1 pada iterasi pertama
     * karena merupakan Post-increment, dan
     * akan ditambahkan nilainya pada iterasi kedua
     */
    echo $i++;
};

echo "<br>Tidak Mencetak Karena Nilai Kembalian False di Iterasi Pertama:";

$i = 0;
while ($i > 0) {
    /**
     * Tidak mencetak sama sekali
     * karena kondisinya bernilai false
     */
    echo $i;
};
