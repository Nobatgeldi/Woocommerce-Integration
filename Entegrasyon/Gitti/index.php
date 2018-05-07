<?php
/**
 * Created by PhpStorm.
 * User: nobat
 * Date: 4/28/2018
 * Time: 22:00
 */
session_start();
include ("source/client.php");

$client = new ggClient();

try
{
    $result = $client->getProducts(0,2,'A',true);
    var_dump($result);
}
catch(Exception $e)
{
    echo $e->getMessage()." access";
    echo "</br>";
}
/*
try
{
    $result2 = $client->getProducts(100,100,'A',true);
}
catch(Exception $e)
{
    echo $e->getMessage()." access";
    echo "</br>";
}

echo $result->ackCode."\n";
echo $result2->ackCode."\n";

$products = $result->products;
$product = $products->product;

$products2 = $result2->products;
$product2 = $products2->product;

if(($result->ackCode)=="success")
{
    $_SESSION["product"]=$product;
    $_SESSION["product2"]=$product2;
    //print_r($product);
    print '<script>history.back(-1);</script>';
    exit;
    //include ("loop_data.php");
}
else{ echo "Row is out of range";}*/
