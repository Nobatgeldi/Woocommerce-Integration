<?php
/**
 * Created by PhpStorm.
 * User: nobat
 * Date: 5/6/2018
 * Time: 22:36
 */

/** Database connection**/

$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "datatest";
// Create connection
$conn = new mysqli($servername, $username, $pass, $dbname);

$conn->set_charset("utf8");

// Check connection
if ($conn->connect_error)
{
die("Connection failed: " . $conn->connect_error);
}