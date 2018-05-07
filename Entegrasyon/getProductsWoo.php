<?php

require_once( '../REST-API/lib/woocommerce-api.php' );

$consumerKey='ck_eba3c4adbf3175420ed47dd9f13563586c6b978e';
$consumerSecret='cs_af23d50f5be11a0d20b0eec39e459ff7c96eaab7';
$store_url='http://rss.covisart.com';

$options = array(
    'debug'           => false,
    'return_as_array' => false,
    'validate_url'    => true,
    'timeout'         => 30,
    'ssl_verify'      => false,
);

try {

    $client = new WC_API_Client( $store_url, $consumerKey, $consumerSecret, $options );

    // products
    /*$product= $client->products->get();
    var_dump($product);*/
    $product = $client->products->get_by_sku( '347890120' );
    //$product = $client->products->get( 248 );
    //print_r( $client->products->get() );
    //print_r( $client->products->get( 254 ) );
    //print_r( $client->products->get( $variation_id ) );
    $product=$product->product;
    print_r($product);
    /*$attributes = $product->attributes;
    $attributes=$attributes[0];
    echo $attributes->name."\n";
    $value=$attributes->options;
    echo $value[0];*/
    //print_r( $client->products->create( array( 'title' => 'Test Product', 'type' => 'simple', 'regular_price' => '9.99', 'description' => 'test' ) ) );
    //print_r( $client->products->update( $product_id, array( 'title' => 'Yet another test product' ) ) );

} catch ( WC_API_Client_Exception $e ) {

    echo $e->getMessage() . PHP_EOL;
    echo $e->getCode() . PHP_EOL;

    if ( $e instanceof WC_API_Client_HTTP_Exception ) {

        print_r( $e->get_request() );
        print_r( $e->get_response() );
    }
}
