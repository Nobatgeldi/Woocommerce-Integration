<?php
    /**
     * Created by PhpStorm.
     * User: nobat
     * Date: 4/23/2018
     * Time: 02:06
     */
    include "n11.class.php";
    $n11Params =
    [
        'appKey' => 'API_BILGILERINIZDEN_DOLDURUN',
        'appSecret' => 'API_BILGILERINIZDEN_DOLDURUN'
    ];
    $n11 = new N11($n11Params);
    $productList = $n11->GetProductList(5, 0);
    foreach($content->products->product as $product) {
        echo $product->title;
    }
?>