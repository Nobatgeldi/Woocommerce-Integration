<?php
/**
 * Created by PhpStorm.
 * User: nobat
 * Date: 5/6/2018
 * Time: 20:10
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


/**Gittigidiyor**/
include ("../Entegrasyon/Gitti/source/client.php");
$config_array = parse_ini_file("../Entegrasyon/Gitti/source/config.ini");
$client = new ggClient();


/** Woo product **/
require '../vendor/autoload.php';
use Automattic\WooCommerce\Client;
$config_array = parse_ini_file("../Entegrasyon/Gitti/source/config.ini");
$consumerKey    =$config_array['consumerKey'];
$consumerSecret =$config_array['consumerSecret'];
$store_url      =$config_array['store_url'];
$woocommerce = new Client( $store_url, $consumerKey, $consumerSecret, [
    'wp_api' => true,
    'version' => 'wc/v2',
]);


$offset=0;
try
{
    $result = $client->getProducts($offset,10,'A',true);
    if ($result->productCount >0)
    {
        if(($result->ackCode)=="success")
        {
            $products = $result->products;
            $product = $products->product;
            foreach ($product as $prodc)
            {
                $productData = $prodc->product;
                $categoryCode = $productData->categoryCode;
                /** get category id**/
                $sql = "SELECT * FROM na_terms WHERE slug='$categoryCode'";
                $res = $conn->query($sql);
                if (!mysqli_query($conn,$sql)) {echo("Error description: " . mysqli_error($conn));}
                if ($res->num_rows > 0)
                {
                    $row = $res->fetch_assoc();
                    echo $row["Term ID"]."||".$row["name"];
                }
                else
                {
                    $title = $productData->title;
                    /** get product id**/
                    $sql = "SELECT * FROM na_posts WHERE post_title='$title'";
                    $res = $conn->query($sql);
                    if (!mysqli_query($conn,$sql)) {echo("Error description: " . mysqli_error($conn));}
                    if ($res->num_rows > 0)
                    {
                        $row = $res->fetch_assoc();
                        echo "******************************************************\n";
                        echo $row["ID"]." ".$row["post_title"];
                        $woo_product=$woocommerce->get('products/'.$row["ID"]);
                        print_r($woo_product->categories);
                        echo  "\n";
                    }
                }
            }
        }
        $offset=$offset+100;
    }
    else
    {
        echo "No product";
        //break;
    }
}
catch(Exception $e)
{
    echo $e->getMessage()." access";
    echo "</br>";
}
/*while(true)
{

}*/
