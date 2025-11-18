<?php
require 'db.php';

$nimi = $_POST['nimi'];
$paiva = $_POST['paiva'];
$aika = $_POST['aika'];

$stmt = $conn->prepare("SELECT COUNT(*) FROM varaukset WHERE paiva = ? AND aika = ?");
$stmt->bind_param("ss", $paiva, $aika);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();

if ($count > 0) {
    echo "Aika on jo varattu. <a href='varaa.php'>Yritä uudelleen</a>";
} else {
    $stmt = $conn->prepare("INSERT INTO varaukset (nimi, paiva, aika) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nimi, $paiva, $aika);
    $stmt->execute();
    $stmt->close();
    echo "Varaus tallennettu! <a href='index.php'>Etusivulle</a>";
}

$conn->close();
?>