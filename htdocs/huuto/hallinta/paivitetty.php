
<?php
require "../funktiot.php"; 
$yhteys = AvaaTietokanta();

// Tarkistetaan, että tarvittavat tiedot on saatu
if (isset($_POST['id']) && isset($_POST['toiminto'])) {
    $id = intval($_POST['id']);
    $toiminto = $_POST['toiminto'];
} else {
    header("Location: index.php");
    exit;
}

if ($toiminto == "Tallenna") {
    $stmt = mysqli_prepare($yhteys, "UPDATE huuto SET nimi = ?, sposti = ?, tavara = ? WHERE id = ?");
    if (!$stmt) {
        $sivunotsikko = "Tietojen muuttaminen epäonnistui!";
        $teksti = "Virhe valmistelussa: " . mysqli_error($yhteys);
    } else {
        mysqli_stmt_bind_param($stmt, "sssi", $_POST['nimi'], $_POST['sposti'], $_POST['tavara'], $id);
        if (mysqli_stmt_execute($stmt)) {
            $sivunotsikko = "Kohteen tiedot päivitetty tietokantaan.";
            $teksti = "Päivitys onnistui.";
        } else {
            $sivunotsikko = "Tietojen muuttaminen epäonnistui!";
            $teksti = "Virhe suoritettaessa: " . mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    }

} elseif ($toiminto == "Poista") {
    $stmt = mysqli_prepare($yhteys, "DELETE FROM huuto WHERE id = ?");
    if (!$stmt) {
        $sivunotsikko = "Poisto epäonnistui!";
        $teksti = "Virhe valmistelussa: " . mysqli_error($yhteys);
    } else {
        mysqli_stmt_bind_param($stmt, "i", $id);
        if (mysqli_stmt_execute($stmt)) {
            $sivunotsikko = "Kohteen tiedot on poistettu tietokannasta.";
            $teksti = "Poisto onnistui.";
        } else {
            $sivunotsikko = "Poisto epäonnistui!";
            $teksti = "Virhe suoritettaessa: " . mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    }
}
?>

<?php include("top.inc"); ?>
<br>images/tekstilogo.gif<br><br>
<table border="0" cellpadding="2" cellspacing="0" width="400">
<tr>
    <td height="16" class="orange" valign="middle" align="center">Huutokaupan ylläpito</td>
</tr>
<tr>
    <td height="40" class="gray" align="left"><br>
        <?php echo htmlspecialchars($sivunotsikko); ?><br>
        <?php echo htmlspecialchars($teksti); ?>
        <p>
        index.phpTakaisin ylläpitosivulle</a>
    </td>
</tr>
</table>
<?php include("bottom.inc"); ?>
