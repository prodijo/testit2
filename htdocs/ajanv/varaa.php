<!DOCTYPE html>
<html>
<head>
    <title>Varaa aika</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Varaa uusi aika</h2>
    <form action="tallenna.php" method="post">
        Nimi: <input type="text" name="nimi" required><br>
        Päivämäärä: <input type="date" name="paiva" required><br>
        Kellonaika: <input type="time" name="aika" required><br>
        <input type="submit" value="Varaa">
    </form>
    <a href="index.php">Etusivulle</a>
</body>
</html>