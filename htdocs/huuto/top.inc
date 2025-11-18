<html>

<head>

<title>tuskan.huuto.net</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-language" content="fi" />
<link rel="stylesheet" href="tyyli.css">

<script language="javascript" type="text/javascript">

//kuvien aktivointi
if (document.images)

{
 img1on = new Image();
 img1on.src = "images/sanahaku.gif";
 img2on = new Image();
 img2on.src = "images/kohteet.gif";
 img3on = new Image();
 img3on.src = "images/yllapito.gif";
 img4on = new Image();
 img4on.src = "images/etusivu.gif";
 
//kuvien deaktivoiti
 img1off = new Image();
 img1off.src = "images/sanahaku_.gif";
 img2off = new Image();
 img2off.src = "images/kohteet_.gif";
 img3off = new Image();
 img3off.src = "images/yllapito_.gif";
 img4off = new Image();
 img4off.src = "images/etusivu_.gif";
 
 //funktio
 function imgOn(imgName) {
 if(document.images) {
 document[imgName].src = eval(imgName + "on.src");
 		}
 }
 function imgOff(imgName) {
 if(document.images) {
 document[imgName].src = eval(imgName + "off.src");
 		}
 }
 }

</script>

</head>

<body>
<table border="0" cellpaddin="0" cellspacing="0" width="100%" height="100%">
<tr>
	<td align="center" valign="middle"><table class="border" border="0" cellpaddin="0" cellspacing="0">
		<tr>
			<td class="vasen" width="168" height="480" valign="top" align="center"><br><img 
			src="images/logo.gif" width="136" height="112" alt=""><br><br>
			<table align="right" border="0" cellpadding="2" cellspacing="0">
			<tr>
				<td><a onMouseOver="imgOn('img4')" onMouseOut="imgOff('img4')" href="index.php"><img name="img4" src="images/etusivu_.gif" width="120" height="20" alt="" 
				border="0"></a></td><td width="1"></td>
			</tr>
			<tr>
				<td><a onMouseOver="imgOn('img1')" onMouseOut="imgOff('img1')" href="hakulomake.php"><img name="img1" src="images/sanahaku_.gif" width="120" height="20" alt="" 
				border="0"></a></td><td width="1"></td>
			</tr>
			<tr>
				<td><a onMouseOver="imgOn('img2')" onMouseOut="imgOff('img2')" href="avainsanat.php"><img name="img2" src="images/kohteet_.gif" width="120" height="20" alt="" 
				border="0"></a></td><td width="1"></td>
			</tr>
			<tr>
				<td><a onMouseOver="imgOn('img3')" onMouseOut="imgOff('img3')" href="hallinta/index.php"><img name="img3" src="images/yllapito_.gif" width="120" height="20" alt="" 
				border="0"></a></td><td width="1"></td>
			</tr>
			</table></td>
			<td width="472" valign="top" align="center">