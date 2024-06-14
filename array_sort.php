<?php
$ar_buah = ["p" => "Pepaya", "a" => "Apel", "m" => "Mangga", "j" => "Jambu"];

echo '<ol>';
foreach ($ar_buah as $k => $v) {
  echo "<li>$k - $v";
}
echo '</ol>';

echo 'asort($ar_buah)';
asort($ar_buah);

echo '<ol>';
foreach ($ar_buah as $k => $v) {
  echo "<li>$k - $v";
}
echo '</ol>';

ksort($ar_buah);

echo 'ksort($ar_buah)';
echo '<ol>';
foreach ($ar_buah as $k => $v) {
  echo "<li>$k - $v";
}
echo '</ol>';

arsort($ar_buah);

echo 'arsort($ar_buah)';
echo '<ol>';
foreach ($ar_buah as $k => $v) {
  echo "<li>$k - $v";
}
echo '</ol>';

krsort($ar_buah);

echo 'krsort($ar_buah)';
echo '<ol>';
foreach ($ar_buah as $k => $v) {
  echo "<li>$k - $v";
}
echo '</ol>';

$ar_buah2 = ["Pepaya", "Apel", "Manggu", "Jambu"];

sort($ar_buah2);

echo 'sort($ar_buah2)';
echo '<ol>';
foreach ($ar_buah2 as $k => $v) {
  echo "<li>$k - $v";
}
echo '</ol>';

rsort($ar_buah2);

echo 'rsort($ar_buah2)';
echo '<ol>';
foreach ($ar_buah2 as $k => $v) {
  echo "<li>$k - $v";
}
echo '</ol>';
