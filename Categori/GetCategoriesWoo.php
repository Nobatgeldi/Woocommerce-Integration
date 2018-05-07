<?php
/**
 * Created by PhpStorm.
 * User: nobat
 * Date: 5/6/2018
 * Time: 00:18
 */
require '../vendor/autoload.php';
use Automattic\WooCommerce\Client;

$config_array = parse_ini_file("../Entegrasyon/Gitti/source/config.ini");
$consumerKey    =$config_array['consumerKey'];
$consumerSecret =$config_array['consumerSecret'];
$store_url      =$config_array['store_url'];

$woocommerce = new Client(
    $store_url,
    $consumerKey,
    $consumerSecret,
    [
        'wp_api' => true,
        'version' => 'wc/v2',
    ]
);

print_r($woocommerce->get('products/categories/'));