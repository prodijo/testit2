<?php include("top.inc"); ?>
<br><img src="images/tekstilogo.gif" width="406" height="62" alt=""><br><br>
<table border="0" cellpadding="2" cellspacing="0" width="400">
<tr>
	<td height="16" class="orange" valign="middle" align="center">Sanahaun tulos</td>
</tr>
<tr>
	<td height="40" class="gray" align="left"><br>
	<?php
	require "./funktiot.php";
	$yhteys = AvaaTietokanta();

	if (isset($_POST['hakusanat']))
	{
		$hakusanat = '%' . $_POST['hakusanat'] . '%';
		$sql = "SELECT nimi, sposti, tavara FROM huuto WHERE tavara LIKE ?";
		$stmt = $yhteys->prepare($sql);
		$stmt->bind_param("s", $hakusanat);
		$stmt->execute();
		$result = $stmt->get_result();

		if (!$result) {
		   print "Haku epäonnistui!";
		} else {
		  while ($tuote = $result->fetch_assoc()) {
			print "<b>Kohde:</b> " . $tuote['tavara'];
			print "<br><b>Myyjä:</b> " . $tuote['nimi'];
			print "<br><b>E-mail:</b> " . $tuote['sposti'];
			print "<br><br>";
		  }
		}
	}
	else {
		exit("Istunto on vanhentunut");
	}
	?>
	
</td>
</tr>
</table>

<a href="hakulomake.php">Tee uusi haku</a>
<?php include("bottom.inc"); ?>
