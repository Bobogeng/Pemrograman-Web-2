<?php
require_once "class_lingkaran.php";
echo "Nilai PHI " . Lingkaran::PHI;
$lingkaran1 = new Lingkaran(10);
$lingkaran2 = new Lingkaran(4);

echo "<br>Luas Lingkaran I " . $lingkaran1->getLuas();
echo "<br>Luas Lingkaran II " . $lingkaran2->getLuas();

echo "<br>Keliling Lingkaran I " . $lingkaran1->getKeliling();
echo "<br>Keliling Lingkaran II " . $lingkaran2->getKeliling();
