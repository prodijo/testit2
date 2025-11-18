<?php
include("top.inc");
?>
<br><img src="images/tekstilogo.gif" width="406" height="62" alt=""><br><br>
<table border="0" cellpadding="2" cellspacing="0" width="400">
<tr>
    <td height="16" class="orange" valign="middle" align="center">Huutokaupan ylläpito</td>
</tr>
<tr>
    <td height="40" class="gray" align="left"><br>
<?php
/* funktiot.phtml sisältää apukomennot mm. tietokantayhteyden avaamiseen jne */
require "../funktiot.php";

        try {
            // Kutsutaan tietokantayhteyden avaavaa funktiota
            $yhteys = AvaaTietokanta();

            // Selvitetään montako tuotetta kannassa on tällä hetkellä
            $result = mysqli_query($yhteys, "SELECT COUNT(*) FROM huuto");

             if (!$result) {
        throw new Exception("Kysely epäonnistui. " . mysqli_error($yhteys));
    }

    $row = mysqli_fetch_row($result);
    print "Tietokannassa on tällä hetkellä <b>" . $row[0] . "</b> tuotetta<p>";

    echo '&nbsp;<a href="listaa.php">Listaa kaikki tallennetut kohteet</a> (muutos/poisto)<br>';
    echo '&nbsp;<a href="tallenna.php">Tallenna uusi kohde</a><br><br>';
} catch (Exception $e) {
    echo "Virhe: " . $e->getMessage();
}

?>
    </td>
</tr>
</table>
<?php include("bottom.inc"); ?>

