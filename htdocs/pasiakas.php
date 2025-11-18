
<?php 
$dbh = mysqli_connect('localhost', 'root', ''); 
// connect to MySQL server

if (!$dbh)     
    die("Unable to connect to MySQL: " . mysqli_connect_error()); 
// if connection failed output error message
if (!mysqli_select_db($dbh, 'varaus'))     
    die("Unable to select database: " . mysqli_error($dbh)); 
// if selection fails output error message
$id = 2; // Venus's ID in the database
$sql_stmt = "DELETE FROM `asiakkaat` WHERE `id` = $id"; 
// SQL Delete query

$result = mysqli_query($dbh, $sql_stmt); 
// execute SQL statement
if (!$result)     
    die("Deleting record failed: " . mysqli_error($dbh));
// output error message if query execution failed

echo "ID number $id has been successfully deleted"; 

mysqli_close($dbh); // close the database connection 
?>