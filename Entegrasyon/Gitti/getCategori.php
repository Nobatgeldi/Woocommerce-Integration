<?php
/**
 * Created by PhpStorm.
 * User: nobat
 * Date: 5/3/2018
 * Time: 20:55
 */
include ("source/client.php");
$client = new ggClient();
try
{
    $result = $client->getCategories(0,100,true);
    print_r($result);
}
catch(Exception $e)
{
    echo "Error: ".$e->getMessage();
    echo "</br>";
}