<?php
/**
 * Created by PhpStorm.
 * User: nobat
 * Date: 5/5/2018
 * Time: 20:00
 */

/** image array generate
$image =array();
$images =array();
$image_id=0;

if(is_array($photo))
{
    foreach ($photo as $phot)
    {
        $url= $phot->url;
        $image['src']=$url;
        $image['position']=$image_id;
        $images[]=$image;
        $image_id++;
    }
}
else
{
    $url= $photo->url;
    $image['src']=$url;
    $image['position']=$image_id;
    $images[]=$image;
    $image_id++;
}**/

/** insert data for product **/
$data = [
    'name' => $title,
    'sku'=>$productID.'',
    'type' => 'simple',
    'managing_stock'=>true,
    'in_stock'=>true,
    'stock_quantity'=>$productCount.'',
    'featured_src'=>$url,
    'purchaseable'=>true,
    'regular_price' => $buyNowPrice.'',
    'description' => $description.'',
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
//print_r($data);
print_r($woocommerce->post('products', $data));


