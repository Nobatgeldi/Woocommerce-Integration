<?php
/**
 * Created by PhpStorm.
 * User: nobat
 * Date: 5/3/2018
 * Time: 23:19
 */
require_once( '../../REST-API/lib/woocommerce-api.php' );

class Image {
    public $id;
    public $src;
    public $title;

    public function __construct ( $id, $src, $title ) {
        $this->id = $id;
        $this->src = $src;
        $this->title = $title;
    }
}

class Attribute {
    public $name;
    public $slug;
    public $position;
    public $visible;
    public $variation;
    public $options; //array

    public function __construct ( $name, $slug, $position, $visible, $variation, $options ) {
        $this->name = $name;
        $this->slug = $slug;
        $this->position = $position;
        $this->visible = $visible;
        $this->variation = $variation;
        $this->options = $options;
    }
}

$consumerKey='ck_eba3c4adbf3175420ed47dd9f13563586c6b978e';
$consumerSecret='cs_af23d50f5be11a0d20b0eec39e459ff7c96eaab7';
$store_url='http://rss.covisart.com';

/**
 $productID;
 $storeCategoryId;
 $title;
 $description
 $pageTemplate;
 $catalogId
 $catalogDetail
 $format
 $url
 $buyNowPrice
 $listingDays
 $productCount
 $city
 $shippingPayment
 $shippingWhere **/

$att_options= array(); $att_options[]=$productID;
$attribute = new Attribute('GittigidiyorID','GittigidiyorID',0,false,'',$att_options);
$attributes[] = $attribute;


$photo = new Image ( '123456', ''.$url, 'Deneme Resem' );
$images[]=$photo;

print_r($images);

$parametr= array(
    'title'=>$title,
    'id'=>$productID,
    'sku'=>$productID,
    'price'=>$buyNowPrice,
    'managing_stock'=>true,
    'in_stock'=>true,
    'purchaseable'=>'1',
    'description'=>$description,
    'images'=>$images,
    'featured_src'=>$url,
    'stock_quantity'=>50,
    'regular_price'=>$buyNowPrice,
    'attributes'=>'',

);
$options = array(
    'debug'           => false,
    'return_as_array' => false,
    'validate_url'    => false,
    'timeout'         => 30,
    'ssl_verify'      => false,
);

try {

    $client = new WC_API_Client( $store_url, $consumerKey, $consumerSecret, $options );
    // products
    //$product = $client->products->get_by_sku( '854613298' );
    //$result = $client->products->update( $product_id, array( 'title' => 'Yet another test product' ) );
    $result = $client->products->create( $parametr);
    print_r($result);
} catch ( WC_API_Client_Exception $e ) {

    echo $e->getMessage() . PHP_EOL;
    echo $e->getCode() . PHP_EOL;

    if ( $e instanceof WC_API_Client_HTTP_Exception ) {

        print_r( $e->get_request() );
        print_r( $e->get_response() );
    }
}
