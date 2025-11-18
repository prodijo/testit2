
<?php
require "../funktiot.php";
$yhteys = AvaaTietokanta();

// Tarkistetaan, onko id-parametri annettu
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Muutetaan turvallisesti kokonaisluvuksi
} else {
    // Uudelleenohjaus syöttösivulle
    header("Location: http://" . $_SERVER["HTTP_HOST"]
        . dirname($_SERVER["PHP_SELF"]) . "/index.php");
    exit;
}

// Valmistellaan SQL-lause
$stmt = mysqli_prepare($yhteys, "SELECT id, nimi, sposti, tavara FROM huuto WHERE id = ?");
if (!$stmt) {
    echo "Valmistelu epäonnistui: " . mysqli_error($yhteys);
    exit;
}

// Sidotaan parametri ja suoritetaan
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

// Haetaan tulokset
mysqli_stmt_bind_result($stmt, $id, $nimi, $sposti, $tavara);
mysqli_stmt_fetch($stmt);

// Suljetaan lauseke
mysqli_stmt_close($stmt);
?>

<?php include("top.inc"); ?>
<br><img src="images/tekstilogo.gif" width="406" height="adding="2" cellspacing="0" width="400">
<tr>
    <td height="16" class="orange" valign="middle" align="center">Huutokaupan ylläpitolomake</td>
</tr>
<tr>
    <td height="40" class="gray" align="left"><br>
 <form method="post" action="paivitettylpadding="8" cellspacing="0">
    <tr>
        <td class="gray">
          <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>"><br> 
          Nimi:<br> <input type="text" name="nimi" size="50" maxlength="150" value="<?php echo htmlspecialchars($nimi); ?>"><br>
          Email:<br> <input type="text" name="sposti" size="50" maxlength="100" value="<?php echo htmlspecialchars($sposti); ?>"><br>
          Tavara:<br> <textarea name="tavara" cols="50" rows="5"><?php echo htmlspecialchars($tavara); ?></textarea>
          <br><br>
          <input type="submit" name="toiminto" value="Tallenna">
            <input type="submit" name="toiminto" value="Poista">
          </td>
      </tr>
      </table>
 </form>
 </td>
</tr>
</table>
<?php include("bottom.inc"); ?>
