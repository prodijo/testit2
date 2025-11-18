 <?php include("top.inc"); ?>
<br><img src="images/tekstilogo.gif" width="406" height="62" alt=""><br><br>
<table border="0" cellpadding="2" cellspacing="0" width="400">
<tr>
	<td height="16" class="orange" valign="middle" align="center">Uuden kohteen lisääminen</td>
</tr>
<tr>
	<td height="40" class="gray" align="left">
	<form method="post" action="tallennettu.php">
	<table border="0" cellpadding="8" cellspacing="0">
	<tr>
		<td class="gray"><input type="hidden" name="id" size=50 maxlength=255>
		Nimi:<br> <input type=text name="nimi" size=50 maxlength=150><br>
		E-mail:<br> <input type=text name="sposti" size=50 maxlength=100><br>
		Tavara:<br> <textarea name="tavara" cols=50 rows=5></textarea><P>
		<input type=submit name="toiminto" value="Tallenna">		
		</td>
	</tr>
	</table>
		</form>
 </tr>
</td>
</table>
<?php include("bottom.inc"); ?>	