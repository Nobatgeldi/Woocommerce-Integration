<?php
/**
 * Created by PhpStorm.
 * User: nobat
 * Date: 5/6/2018
 * Time: 01:45
 */
include ("source/client.php");

$client = new ggClient();

try
{
    $result = $client->getProducts(0,1,'A',true);
    print_r($result);
}
catch(Exception $e)
{
    echo $e->getMessage()." access";
    echo "</br>";
}