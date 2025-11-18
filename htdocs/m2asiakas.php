<?php 
$dbh = mysqli_connect('localhost', 'root', ''); 
// connect to MySQL server 

if (!$dbh)    
    die("Unable to connect to MySQL: " . mysqli_connect_error()); 
// if connection failed output error message 

if (!mysqli_select_db($dbh, 'varaus'))     
    die("Unable to select database: " . mysqli_error($dbh)); 
// if selection fails output error message 

$sql_stmt = "UPDATE `asiakkaat` SET `sukunimi` = 'Virtanen', `osoite` = 'Ankkalinna 1' WHERE `id` = 2;";
// SQL update query
$result = mysqli_query($dbh, $sql_stmt); 
// execute SQL statement 

if (!$result)     
    die("Updating record failed: " . mysqli_error($dbh)); 
// output error message if query execution failed 

echo "ID number 2 has been successfully updated"; 

mysqli_close($dbh); // close the database connection 
?>
