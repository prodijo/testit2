<?php
require "../funktiot.php"; 
$yhteys = AvaaTietokanta();

$sivunotsikko = "";
$teksti = "";

// Jos id-numeroa ei saada, todetaan istunto vanhentuneeksi
if (isset($_POST['id'])) {
    $sql_lauseke = "INSERT INTO huuto (nimi, sposti, tavara)
                    VALUES ('" . mysqli_real_escape_string($yhteys, $_POST['nimi']) . "',
                            '" . mysqli_real_escape_string($yhteys, $_POST['sposti']) . "',
                            '" . mysqli_real_escape_string($yhteys, $_POST['tavara']) . "')";

    if (!$kysely = mysqli_query($yhteys, $sql_lauseke)) {
        $sivunotsikko = "Tallennus epäonnistui!";
        $teksti = "Virhe: " . mysqli_error($yhteys);
    } else {
        $sivunotsikko = "Kohteen tallennus onnistui";
        $teksti = "Kohteen tiedot on tallennettu tietokantaan.<p>";
        $teksti .= "Nimi: " . htmlspecialchars($_POST['nimi']) . "<br>";
        $teksti .= "E-mail: " . htmlspecialchars($_POST['sposti']) . "<br>";
        $teksti .= "Tavara: " . htmlspecialchars($_POST['tavara']) . "<p>";
    }
} else {
    // Uudelleenohjaus syöttösivulle
    header("Location: http://" . $_SERVER["HTTP_HOST"]
        . dirname($_SERVER["PHP_SELF"]) . "/index.php");
    exit;
}
?>

<?php include("top.inc"); ?>
<br>images/tekstilogo.gif<br><br>
<table border="0" cellpadding="2" cellspacing="0" width="400">
<tr>
    <td height="16" class="orange" valign="middle" align="center"><?php echo $sivunotsikko; ?></td>
</tr>
<tr>
    <td height="40" class="gray" align="left"><br>
    <?php echo $teksti; ?><br>
    <a href="indexsin ylläpitosivulle</a>
    </td>
</tr>
</table>
<?php include("bottom.inc"); ?>
