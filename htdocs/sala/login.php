<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        die('Täytyy antaa käyttäjänimi ja salasana.');
    }

    $sql = "SELECT id, password_hash FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':username' => $username]);
    $user = $stmt->fetch();

    if (!$user) {
        echo "Virheellinen käyttäjänimi tai salasana.";
        exit;
    }

    $storedHash = $user['password_hash'];

    if (password_verify($password, $storedHash)) {
        echo "Kirjautuminen onnistui! Tervetuloa, " . htmlspecialchars($username) . ".";
        if (password_needs_rehash($storedHash, PASSWORD_DEFAULT)) {
            $newHash = password_hash($password, PASSWORD_DEFAULT);
            $update = $pdo->prepare("UPDATE users SET password_hash = :h WHERE id = :id");
            $update->execute([':h' => $newHash, ':id' => $user['id']]);
        }
    } else {
        echo "Virheellinen käyttäjänimi tai salasana.";
    }
} else {
    echo "Lähetä lomake POST-menetelmällä.";
}
?>