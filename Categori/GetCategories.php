<?php
/**
 * Created by PhpStorm.
 * User: nobat
 * Date: 5/5/2018
 * Time: 23:57
 */

/**
'http://dev.gittigidiyor.com:8080/listingapi/ws/CategoryService?wsdl'
'http://dev.gittigidiyor.com:8080/listingapi/ws/CatalogService?wsdl'
 **/

include ("../Entegrasyon/Gitti/source/client.php");
include ("../scripts/connection.php");
$client = new ggClient();

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

for ($count=100; $count<9000; $count++)
{
    try
    {
        $result = $client->getCategories($count,100,false, false);
        //$result = $client->searchCatalog('cbdc','Einhell BG-EM 1030',0, 100);
        //print_r($result);
    }
    catch(Exception $e)
    {
        echo $e->getMessage()." access";
        echo "</br>";
    }

    //echo $result->ackCode."\n";
    $categories=$result->categories;

    if(($result->ackCode)=="success")
    {
        foreach ($categories as $category)
        {
            foreach ($category as $data)
            {
                /*$sql = "INSERT INTO Category (id, slug, type) VALUES ('$email', '$password', $Type)";
                $result = $conn->query($sql);*/
                $data = [
                    'name' => $data->categoryName,
                    'slug'=>$data->categoryCode
                ];

                print_r($woocommerce->post('products/categories', $data));
            }
        }
    }
    else
        {
            break;
        }
    $count=$count+99;
}
