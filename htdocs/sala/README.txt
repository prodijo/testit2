PHP & MySQL Salasanojen Hashaus - Esimerkki

1) Luo tietokantataulu (MySQL):
--------------------------------
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) UNIQUE NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

2) Muokkaa db.php tiedostossa
   $db, $user, $pass vastaamaan omaa ympäristöäsi.

3) Lataa kaikki tiedostot palvelimelle esim. XAMPP/htdocs hakemistoon.

4) Käytä selaimella:
   http://localhost/register_form.html
   http://localhost/login_form.html
