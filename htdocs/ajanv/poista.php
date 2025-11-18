<?php
require 'db.php';

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM varaukset WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

$conn->close();
header("Location: varaukset.php");
?>