<?php 
$dbh = mysqli_connect('localhost', 'root', '');
// connect to MySQL server
if (!$dbh) {
 die("Unable to connect to MySQL: " . mysqli_connect_error());
} 
// if connection failed output error message
if (!mysqli_select_db($dbh, 'varaus')) {
 die("Unable to select database: " . mysqli_error($dbh));
}
// if selection fails output error message
$sql_stmt = "SELECT * FROM asiakkaat"; 
// SQL select query
$result = mysqli_query($dbh, $sql_stmt);
// execute SQL statement
if (!$result) {
 die("Database access failed: " . mysqli_error($dbh));
}
// output error message if query execution failed
$rows = mysqli_num_rows($result); 
// get number of rows returned
if ($rows) { 
 while ($row = mysqli_fetch_array($result)) { 
 echo 'ID: ' . $row['id'] . '<br>'; 
 echo 'asiakasnumero: ' . $row['asiakasnumero'] . '<br>'; 
 echo 'sukunimi: ' . $row['sukunimi'] . '<br>';
 echo 'etunimi: ' . $row['etunimi'] . '<br>';  
 echo 'osoite: ' . $row['osoite'] . '<br><br>';
 } 
} else {
 echo "No contacts found.";
}
mysqli_close($dbh); // close the database connection 
?>