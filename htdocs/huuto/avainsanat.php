<?php include("top.inc"); ?>
<br><img src="images/tekstilogo.gif" width="406" height="62" alt=""><br><br>
<table border="0" cellpadding="2" cellspacing="0" width="400">
<tr>
<td height="16" class="orange" valign="middle" align="center">Huutokaupan kohteet</td>
</tr>
<tr>
	<td height="40" class="gray" align="left"><br>
<?php
require "./funktiot.php";
$yhteys = AvaaTietokanta();

if (!$kysely = $yhteys->query("SELECT DISTINCT nimi, sposti, tavara FROM huuto ORDER BY tavara"))
{
    print "Tuotteiden selaus epäonnistui!";
}
else
{
    while ($tuote = $kysely->fetch_assoc())
    {
        print "<b>Kohde:</b> " . $tuote['tavara'];
        print "<br><b>Myyjä:</b> " . $tuote['nimi'];
        print "<br><b>E-mail:</b> " . $tuote['sposti'];
        print "<br><br>";
    }
    $kysely->free_result(); // Free the result set
}
$yhteys->close(); // Close the database connection
?>
</td>
</tr>
</table>

<?php include("bottom.inc"); ?>
