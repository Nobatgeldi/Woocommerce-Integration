
<?php
$servername = "localhost";
$username = "nobat";
$pass = "8jeQ@qkcJ8C0tTxAB#";
$dbname = "wp_test";
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