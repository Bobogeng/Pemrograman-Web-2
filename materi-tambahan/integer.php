<?php
$a = 1234; // Bilangan Desimal
echo $a . '</br>'; // 1234

$a = 0123; // Bilangan Oktal (Setara sampai 83 desimal)
echo $a . '</br>'; // 83

$a = 0o123; // Bilangan Oktal (PHP 8.1.0)
echo $a . '</br>'; // 83

$a = 0x1A; // Bilangan Heksadesimal (Setara sampai 26 desimal)
echo $a . '</br>'; // 26

$a = 0b11111111; // Bilangan Biner (Setara sampai 255 desimal)
echo $a; // 255