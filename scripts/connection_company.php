
<?php
$servername = "localhost";
$username = "teknokent";
$pass = "z2YIgEdIZZqJWvOc";
$dbname = "teknokent_company";
//$dbname = "Teknokent_Portal";
//
// Create connection
$conn = new mysqli($servername, $username, $pass, $dbname);
$conn->set_charset("utf8");
// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 

//$conn->close();

?>