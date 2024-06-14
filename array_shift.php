<?php
$tims = ["erwin", "heru", "ali", "zaki"];

array_shift($tims);
foreach ($tims as $person) {
  echo $person . '</br>';
}
