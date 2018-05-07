<?php
/**
 * Created by PhpStorm.
 * User: nobat
 * Date: 4/23/2018
 * Time: 14:13
 */
session_start();
for ($x = 0; $x < sizeof($_SESSION["product"]); $x++)
{
    echo $x;
    echo "---------------------------------------------------------------------------------------------------";
    $session_array = $_SESSION["product"][$x];
    for ($j = 0; $j < sizeof($session_array[$x]); $j++)
    {
        echo $session_array[$x][$j]."<br>";
        //echo $j;
    }
    echo "<br>";
}
?>