<?php
require 'db.php';

$result = $conn->query("SELECT * FROM varaukset ORDER BY paiva, aika");

echo "<h2>Varaukset</h2>";
echo "<table border='1'><tr><th>Nimi</th><th>Päivämäärä</th><th>Aika</th><th>Poista</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['nimi']}</td>
            <td>{$row['paiva']}</td>
            <td>{$row['aika']}</td>
            <td><a href='poista.php?id={$row['id']}'>Poista</a></td>
          </tr>";
}
echo "</table>";
echo "<a href='index.php'>Etusivulle</a>";

$conn->close();
?>