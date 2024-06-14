<?php
$a = false;
$b = true;

var_dump((bool) $a && $b); // bool(true)
var_dump((bool) $a || $b); // bool(true)
var_dump((bool) !$a); // bool(false)
var_dump((bool) $a xor $b); // bool(false)