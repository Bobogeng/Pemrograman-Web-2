<?php

/**
 * Deprecated pada PHP 7.2. dan di hapus pada PHP 8.0.
 * karena akan mengembalikan nilai NULL
 * bukan membuat variable menjadi undefined
 *  */

$foo = 'bar'; // $foo adalah integer 10
unset($foo); // Menghancurkan sebuah variabel menjadi undefined

echo $foo; // Mencetak warning
echo $bar; // Mencetak warning
var_dump($foo); // Mencetak warning dengan NULL value
var_dump($bar); // Mencetak warning dengan NULL value
