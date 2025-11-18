
<?php
$to = "testi@localhost";
$subject = "Testiviesti Mercuryltä";
$message = "Tämä on testiviesti Mercury Mail Serveriltä.";
$headers = "From: jorma@localhost";

if (mail($to, $subject, $message, $headers)) {
    echo "Viesti lähetetty!";
} else {
    echo "Lähetys epäonnistui.";
}
?>
