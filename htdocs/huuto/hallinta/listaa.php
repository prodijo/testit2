<?php include("top.inc"); ?>

<br>
<img src="images/tekstilogo.gif" width="" cellpadding="2" cellspacing="0">
<tr>
    <td height="16" class="orange" valign="middle" align="center">
        Kaikki huutokaupan kohteet
    </td>
</tr>
<tr>
    <td height="40" class="gray" align="left">
        <br>
        <ul>
        <?php
        require "../funktiot.php";
        $yhteys = AvaaTietokanta();

        $kysely = mysqli_query($yhteys, "SELECT id, nimi, sposti, tavara FROM huuto ORDER BY tavara");

        if (!$kysely) {
            echo "<li>Haku epäonnistui!</li>";
        } else {
            while ($kentta = mysqli_fetch_row($kysely)) {
                echo "<li><b>" . htmlspecialchars($kentta[3]) . "</b> - <a href=\"yllapitolomake.php?id=" . urlencode($kentta[0]) . "\">[Muuta tietoja]</a></li>";
            }
        }
        ?>
        </ul>
        <p><a hrefhpTakaisin ylläpidon etusivulle</a></p>
    </td>
</tr>
</table>

<?php include("bottom.inc"); ?>
