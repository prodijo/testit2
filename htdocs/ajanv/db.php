<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "ajanvaraus";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Yhteys epäonnistui: " . $conn->connect_error);
}
?>