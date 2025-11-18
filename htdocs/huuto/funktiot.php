<?php
/*

    Tiedosto: funktiot.php
    Sisältää: Kaikille sovelluksille ja sivuille yhteisiä
              aputoimintoja.

*/

function AvaaTietokanta($osoite = "127.0.0.1", $tietokanta = "huuto")
{
    $yhteys = new mysqli($osoite, "opiskelija", "opiskelija", $tietokanta);

    if ($yhteys->connect_error) {
        exit("Yhteys tietokantaan epäonnistui: " . $yhteys->connect_error);
    } else {
        return $yhteys;
    }
}
