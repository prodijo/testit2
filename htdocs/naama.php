<?php
$naama = imagecreate(20, 20);

$tausta = imagecolorallocate($naama, 255, 255, 255);
$musta = imagecolorallocate($naama, 0, 0, 0);
$kelta = imagecolorallocate($naama, 255, 255, 0);
imagecolortransparent($naama, $tausta);

// naaman piirtäminen
imagefilledellipse($naama, 10, 10, 18, 18, $kelta);
imageellipse($naama, 10, 10, 18, 18, $musta);
imageellipse($naama, 7, 7, 2, 2, $musta);
imageellipse($naama, 13, 7, 2, 2, $musta);
imagearc($naama, 10, 11, 9, 9, 25, 155, $musta);

$kuva = imagecreate(300, 200);
$tausta = imagecolorallocate($kuva, 255, 255, 255);

// 500 satunnaista naamaa
for ($i = 0; $i < 500; $i++) {
    $x = rand(0, 280);
    $y = rand(0, 180);
    imagecopy($kuva, $naama, $x, $y, 0, 0, 20, 20);
}

header("Content-Type: image/png");
imagepng($kuva);
?>
