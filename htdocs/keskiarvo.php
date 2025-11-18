<?php
// Aliohjelma keskiarvon laskemiseen
function laskeKeskiarvo($arvosanat) {
    $summa = array_sum($arvosanat);
    $maara = count($arvosanat);
    return $maara > 0 ? round($summa / $maara, 2) : 0;
}

// Aliohjelma arvosanojen tulostamiseen
function tulostaArvosanat($arvosanat) {
    return implode(", ", $arvosanat);
}

// Opiskelijat taulukossa
$opiskelijat = [
    "Anna" => [5, 4, 3, 5],
    "Mikko" => [2, 3, 4],
    "Liisa" => [5, 5, 5, 5],
    "Jorma" => [3, 4, 4, 3]
];

// Tulostetaan tiedot
echo "<h2>Opiskelijoiden arvosanat ja keskiarvot</h2>";
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Nimi</th><th>Arvosanat</th><th>Keskiarvo</th></tr>";

foreach ($opiskelijat as $nimi => $arvosanat) {
    $keskiarvo = laskeKeskiarvo($arvosanat);
    $arvosanatStr = tulostaArvosanat($arvosanat);
    echo "<tr><td>$nimi</td><td>$arvosanatStr</td><td>$keskiarvo</td></tr>";
}

echo "</table>";
?>