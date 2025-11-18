<?php
$kuva = imagecreate(200, 200);

$tausta = imagecolorallocate($kuva, 255, 255, 255);
$musta = imagecolorallocate($kuva, 0, 0, 0);

// kellotaulun reunat ja keskipiste
imageellipse($kuva, 100, 100, 160, 160, $musta);
imageellipse($kuva, 100, 100, 170, 170, $musta);
imageellipse($kuva, 100, 100, 10, 10, $musta);

$pii = 3.14159;

// kellotaulun numerot
for ($tunti = 1; $tunti <= 12; $tunti++) {
    $kulma = ($tunti / 12) * 2 * $pii - $pii / 2;
    $x = floor(100 + cos($kulma) * 75 - 1);
    $y = floor(100 + sin($kulma) * 75 - 3);
    imagestring($kuva, 1, $x, $y, $tunti, $musta);
}

// minuuttiviisari
$minuutti = date("i");
$kulma = ($minuutti / 60) * 2 * $pii - $pii / 2;
$loppux = floor(100 + cos($kulma) * 65);
$loppuy = floor(100 + sin($kulma) * 65);
imageline($kuva, 100, 100, $loppux, $loppuy, $musta);

// tuntiviisari
$tunti = date("H") + $minuutti / 60;
$kulma = ($tunti / 12) * 2 * $pii - $pii / 2;
$loppux = floor(100 + cos($kulma) * 35);
$loppuy = floor(100 + sin($kulma) * 35);
imageline($kuva, 100, 100, $loppux, $loppuy, $musta);

header("Content-Type: image/png");
imagepng($kuva);
?>