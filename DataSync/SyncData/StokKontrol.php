<?php
/**
 * Created by PhpStorm.
 * User: nobat
 * Date: 5/6/2018
 * Time: 22:31
 */

//region Gittigidiyor product
include ("../../Entegrasyon/Gitti/source/client.php");
$client = new ggClient();
//endregion

//region Woo product
require '../../vendor/autoload.php';
use Automattic\WooCommerce\Client;
$config_array   = parse_ini_file("../../Entegrasyon/Gitti/source/config.ini");
$consumerKey    =$config_array['consumerKey'];
$consumerSecret =$config_array['consumerSecret'];
$store_url      =$config_array['store_url'];
$woocommerce = new Client( $store_url, $consumerKey, $consumerSecret, [
    'wp_api' => true,
    'version' => 'wc/v2',
]);
//endregion

/** Database Connection**/
include ("../connection.php");

$offset=0;
//region Get Product data from Gittigidiyor
/** get product id**/
$sql = "SELECT * FROM na_posts WHERE post_type='product'";
$res = $conn->query($sql);
if (!mysqli_query($conn,$sql)) {echo("Error description: " . mysqli_error($conn));}
$count = 0;
if ($res->num_rows > 0)
{
    while($line = mysqli_fetch_array($res,MYSQLI_NUM))
    {
        echo "***************************************************************************\n";
        echo "Element:".$count."\n";
        $count++;
        $ID=$line[0];
        echo "Site Bilgiler: ".$ID." ".$line[5]."\n";
        //region Woocommerce Stok
        $woo_product=$woocommerce->get('products/'.$ID);
        /** Woo Stok**/
        $woo_stok = $woo_product->stock_quantity;

        echo "Woo Stok: ".$woo_stok;
        echo  "\n";
        $breach=$woo_product->attributes;
        //endregion

        echo "Gittigidiyor ID:";
        $GittigidiyorID = $breach[0]->options[0];
        echo $GittigidiyorID;
        echo  "\n";


        //region Gittigidiyor
        try
        {
            $result = $client->getProduct($GittigidiyorID.'', '');
            //var_dump($result);
        }
        catch (Exception $e)
        {
            echo $e->getMessage() . " access";
            echo "</br>";
        }
        if (($result->ackCode) == "success")
        {
            echo "Gitti Title:";
            echo $result->productDetail->product->title;
            echo "\n";
            echo "Gitti Stok:";
            echo $result->productDetail->product->productCount;
            echo "\n";
        }
        else {
            echo $result->ackCode;
            break;
        }
        //endregion
    }
}