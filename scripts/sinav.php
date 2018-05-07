<?php

session_start();
header('Content-Type: text/html; charset=utf-8');
include("../../scripts/connection _student.php");

$ID = $_SESSION["ID"];
$sinav = $_POST["sinav_id"];
$puan = $_POST["puan"];
$zaman = $_POST["sinav_tarihi"];
$yapan_kurulus = $_POST["kurulus_ad"];
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO exam_info (ID, sinav, puan, zaman, yapan_kurulus) 
        VALUES ('$ID', '$sinav', '$puan', '$zaman', '$yapan_kurulus')";

if ($conn->query($sql) === TRUE) {
    //exam
    $sql = "SELECT * FROM `exam_info` WHERE ID='$ID'";
    $result=mysqli_query($conn,$sql);
    if (!empty($result->num_rows))
    {
        $say=0;
        $results=array();
        unset($_SESSION["exam_info"]);
        while($line = mysqli_fetch_array($result,MYSQLI_NUM))
        {
            $results[$say] = $line;
            $_SESSION["exam_info"][$say]=$results;
            $say++;
        }
        for ($x = 0; $x < sizeof($_SESSION["exam_info"]); $x++)
        {
            $session_array = $_SESSION["exam_info"][$x];
            for ($j = 0; $j < sizeof($session_array[$x]); $j++)
            {
                echo $session_array[$x][$j]."<br>";
            }
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    else
    {
        $results= array();
        $results[0]="No content";
        $_SESSION["exam_info"][0] =$results;
    }
} else {
    echo "no update";
}

?>