<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        die('Täytyy antaa käyttäjänimi ja salasana.');
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password_hash) VALUES (:username, :hash)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([':username' => $username, ':hash' => $hash]);
        echo "Rekisteröinti onnistui!<br>";
        echo "Tallennettu hash: <code>" . htmlspecialchars($hash) . "</code><br>";
        echo "Voit nyt kirjautua sisään.";
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            echo "Käyttäjänimi on jo olemassa.";
        } else {
            echo "Tietokantavirhe: " . htmlspecialchars($e->getMessage());
        }
    }
} else {
    echo "Lähetä lomake POST-menetelmällä.";
}
?>