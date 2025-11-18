

<?php
$caste = '';
$faste = '';

// Datan vastaanotto ja tarkastetaan onko syötetty numeroita - ja . sallitaan myös!
if (isset($_GET['painike'])) {
   if (preg_match("/^[0-9\.\-]+$/", $caste = $_GET['celsius'])){
      $faste = 9 / 5 *$caste +32;
	  // Tulostetaan vastaus ja pyöristetään round käskyllä 
		echo(round($faste, 2))." Farenheit astetta"."<br>\n";   
	  }
    else {
	   echo "Virheellinen sivu-parametrin arvo!","<br>";
	  }
}
?>
<br><a href="lomakeC2.html">Anna uudet tiedot</a>
