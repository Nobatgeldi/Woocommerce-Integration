<?php
/**
 * Created by PhpStorm.
 * User: nobat
 * Date: 5/6/2018
 * Time: 22:58
 */

/** Woo product **/
require '../vendor/autoload.php';

use Automattic\WooCommerce\Client;

$config_array   = parse_ini_file("../Entegrasyon/Gitti/source/config.ini");
$consumerKey    =$config_array['consumerKey'];
$consumerSecret =$config_array['consumerSecret'];
$store_url      =$config_array['store_url'];
$woocommerce = new Client( $store_url, $consumerKey, $consumerSecret, [
    'wp_api' => true,
    'version' => 'wc/v2',
]);

$data = [
    'name' => 'Premium Quality',
    'type' => 'simple',
    'status' => 'publish',
    'sku'=>'123456789',
    'regular_price' => '21.99',
    'sale_price'=>'15',
    'managing_stock'=>1,
    'in_stock'=>true,
    'stock_quantity'=>10,
    'price' => '334.95',
    'purchaseable'=>true,
    'description' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.',
    'short_description' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.',
    'categories' => [
        [
            'id' => 9
        ],
        [
            'id' => 14
        ]
    ],
    'images' => [
        [
            'src' => 'http://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2013/06/T_2_front.jpg',
            'position' => 0
        ],
        [
            'src' => 'http://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2013/06/T_2_back.jpg',
            'position' => 1
        ]
    ]
];
print_r($data);
print_r($woocommerce->post('products', $data));