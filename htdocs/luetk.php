<?php 
$dbh = mysqli_connect('localhost', 'root', '');
// connect to MySQL server
if (!$dbh) {
 die("Unable to connect to MySQL: " . mysqli_connect_error());
} 
// if connection failed output error message
if (!mysqli_select_db($dbh, 'my_personal_contacts')) {
 die("Unable to select database: " . mysqli_error($dbh));
}
// if selection fails output error message
$sql_stmt = "SELECT * FROM my_contacts"; 
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
 echo 'Full Names: ' . $row['full_names'] . '<br>'; 
 echo 'Gender: ' . $row['gender'] . '<br>'; 
 echo 'Contact No: ' . $row['contact_no'] . '<br>'; 
 echo 'Email: ' . $row['email'] . '<br>'; 
 echo 'City: ' . $row['city'] . '<br>'; 
 echo 'Country: ' . $row['country'] . '<br><br>'; 
 } 
} else {
 echo "No contacts found.";
}
mysqli_close($dbh); // close the database connection 
?>