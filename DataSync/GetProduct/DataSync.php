<?php
/**
 * Created by PhpStorm.
 * User: nobat
 * Date: 5/3/2018
 * Time: 23:09
 */

/** Database connection*
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
}**/

/** Gittigidiyor product **/
include ("../../Entegrasyon/Gitti/source/client.php");
$client = new ggClient();

/** Woo product **/
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

$offset=0;
while (true) {
    try {
        $result = $client->getProducts($offset, 100, 'A', true);
        //var_dump($result);
    } catch (Exception $e) {
        echo $e->getMessage() . " access";
        echo "</br>";
    }
    if (($result->ackCode) == "success") {
        if ($result->productCount > 0) {

            $products = $result->products;
            $product = $products->product;

            for ($x = 0; $x < sizeof($product); $x++) {
                $productID = $product[$x]->productId;
                //$itemID = $product[$x]->itemId;
                /** Collect sub data of each product**/
                $productData = $product[$x]->product;
                $categoryCode = $productData->categoryCode;
                $storeCategoryId = $productData->storeCategoryId;
                $title = $productData->title;
                /** get photo data of product**/
                $photos = $productData->photos;
                $photo = $photos->photo;
                $pageTemplate = $productData->pageTemplate;
                $description = $productData->description;
                /*$catalogId = $productData->catalogId;
                print_r($catalogId);
                $catalogDetail = $productData->catalogDetail;
                print_r($catalogDetail);*/
                $format = $productData->format;
                $buyNowPrice = $productData->buyNowPrice;
                $listingDays = $productData->listingDays;
                $productCount = $productData->productCount;

                /** cargo details**/
                $cargoDetail = $productData->cargoDetail;
                $city = $cargoDetail->city;
                $shippingPayment = $cargoDetail->shippingPayment;
                $shippingWhere = $cargoDetail->shippingWhere;

                /** get category id**/
                /*$sql = "SELECT `Term ID` FROM Category WHERE slug='$categoryCode'";
                $result = $conn->query($sql);
                if (!mysqli_query($conn,$sql)) {echo("Error description: " . mysqli_error($conn));}
                if ($result->num_rows > 0)
                {
                    $row = $result->fetch_assoc();
                    $category_id= $row["Term ID"];
                }*/
                //include("WoocomAdd.php");

                //region Woocom Add
                $data = [
                    'name' => $title,
                    'sku'=>'',
                    'type' => 'simple',
                    'managing_stock'=>true,
                    'in_stock'=>true,
                    /*stock_quantity'=>$productCount.'',
                    'featured_src'=>'',
                    'purchaseable'=>true,
                    'regular_price' => $buyNowPrice.'',
                    'description' => $description.'',*/
                    'short_description' => '',

                    'attributes' => array
                    (
                        array
                        (
                            'id' => '1', // parameter for custom attributes
                            'visible' => false, // default: false
                            'options' => array
                            (
                                $productID.''
                            )
                        ),
                        array
                        (
                            'id' => '2', // parameter for custom attributes
                            'visible' => false, // default: false
                            'options' => array
                            (
                                $productID.''
                            )
                        )
                    ),
                    'categories' => [
                        [
                            'id' => '12'
                        ]
                    ]
                    //'images' =>$images*/

                ];
                print_r($woocommerce->post('products', $data));
                //endregion
            }

            $offset=$offset+100;
        }
        else
            {
                echo "Hiç bir ürün bulunamadı";
                break;
            }
    } else {
        echo $result->ackCode;
        break;
    }
}

