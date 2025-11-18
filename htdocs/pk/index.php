<?php

// Tämä on etusivu, jolla listataan päiväkirjamerkintöjä.

require("funktioita.php");

// Hankitaan yhteys tietokantaan.
$yhteys = yhdista_tietokantaan();

// Montako päiväkirjamerkinnän otsikkoa näytetään kerrallaan?
define("TULOKSIA_SIVULLA", 10);

// Lasketaan mitkä tulokset halutaan näyttää tällä kertaa.
$sivunumero = 0;
if(isset($_GET["sivu"]) && ctype_digit($_GET["sivu"]))
  $sivunumero = $_GET["sivu"];

$limit = intval(TULOKSIA_SIVULLA);
$offset = intval($sivunumero * TULOKSIA_SIVULLA);

// Haetaan päiväkirjamerkintöjen otsikot.
$sql = "select sql_calc_found_rows id, luotu, otsikko from 
  merkinta order by luotu desc limit $limit offset $offset";
$tulos = mysqli_query($yhteys,$sql);
if(!$tulos) exit("Tietokantahaku epäonnistui: ".mysqli_error());

// Lasketaan montako sivullista tuloksia on yhteensä.
$sql = "select found_rows() as riveja";
$rivitulos = mysqli_query($yhteys,$sql);
if(!$rivitulos) exit("Tietokantahaku epäonnistui: ".mysqli_error());

$riveja = mysqli_fetch_assoc($rivitulos);
// Pyöristetään ylös ceil-funktiolla.
$sivuja = ceil($riveja["riveja"] / TULOKSIA_SIVULLA);

// Tulostetaan HTML-koodin alkuosa.
html_alku("Päiväkirjani");

echo "<p><a href=\"kirjoita.php\">Lisää uusi merkintä</a></p>\n";

// Tulostetaan ennen otsikoita sivunumerot, jos tarpeen.
if($sivuja > 1)
{
  echo "<div id=\"sivut\">\n";
  for($sivu = 0; $sivu < $sivuja; ++$sivu)
  {
    if($sivunumero == $sivu)
      echo $sivu + 1, " ";
    else
      echo "<a href=\"index.php?sivu=", $sivu, "\">",
        $sivu + 1, "</a> ";
  }
  echo "</div>\n";
}

// Nyt on otsikoiden vuoro.
echo "<div id=\"otsikot\">\n";
while($rivi = mysqli_fetch_assoc($tulos))
{
  echo "<div>";
  echo "<div class=\"paivays\">";
  echo muotoile_paivays($rivi["luotu"]);
  echo "</div>";
  echo "<a href=\"lue.php?id=", $rivi["id"], "\">";
  echo $rivi["otsikko"];
  echo "</a>";
  echo "</div>\n";
}
echo "</div>\n";

// Lopetetaan sivun HTML-koodi
html_loppu();

?>
