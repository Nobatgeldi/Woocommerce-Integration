<?php
/**
 * Created by PhpStorm.
 * User: nobat
 * Date: 4/30/2018
 * Time: 22:45
 */
//sizeof($product)
for ($x = 0; $x < sizeof($product); $x++) {
    /** Collect data from each product**/
    $ID = $product[$x]->productId;
    echo $ID;
    echo "</br>";
    /** Collect sub data of each product**/
    $productData = $product[$x]->product;
    $categoryCode = $productData->categoryCode;

    echo ($categoryCode) . "-categoryCode\n";
    echo "</br>";
    echo $productData->storeCategoryId . "-storeCategoryId\n";
    echo "</br>";
    echo $productData->title . "-title\n";
    echo "</br>";
    foreach ($productData->specs as $specs) {
        foreach ($specs as $spec) {
            //var_dump($spec);
        }
    }

    /** Error on this field(no subtitle)**/
    //echo $productData->subtitle . "-subtitle\n";

    /** get photo data of product**/
    $photos = $productData->photos;
    foreach ($photos as $photo) {
        if (property_exists($photo, "url"))
        {
            echo $photo->url. "-url\n";
            echo $photo->photoId. "-photoId\n";
        }
        else
        {
            foreach ($photo as $parts)
            {
                echo $parts->url . "-url\n";echo "</br>";
                echo $parts->photoId . "-photoId\n";echo "</br>";
            }
        }
    }

    echo $productData->pageTemplate . "-pageTemplate\n";echo "</br>";
    
    echo $productData->description . "-description\n";echo "</br>";
    
    echo $productData->catalogId . "-catalogId\n";echo "</br>";
    
    echo $productData->catalogDetail . "-catalogDetail\n";echo "</br>";
    
    echo $productData->format . "-format\n";echo "</br>";
    
    //echo $productData->startPrice . "-startPrice\n";
    
    echo $productData->buyNowPrice . "-buyNowPrice\n";echo "</br>";
    
    echo $productData->listingDays . "-listingDays\n";echo "</br>";
    
    echo $productData->productCount . "-productCount\n";echo "</br>";

    /** cargo details**/
    $cargoDetail=$productData->cargoDetail;
    echo $cargoDetail->city . "-city\n";echo "</br>";
    /** Cargo Companies **/
    foreach ($cargoDetail->cargoCompanies as $cargoCompanies)
    {
        echo $cargoCompanies. "-cargoCompany\n";echo "</br>";
    }
    /** Shipping Payment **/
    echo $cargoDetail->shippingPayment . "-shippingPayment\n";echo "</br>";
    echo $cargoDetail->shippingWhere . "-shippingWhere\n";echo "</br>";
    /** Cargo Companies Details **/
    $cargoCompanyDetails=$cargoDetail->cargoCompanyDetails;echo "</br>";
    foreach ($cargoCompanyDetails as $cargoCompanyDetail)
    {
        echo "Cargo Company Detail Short Name: ".$cargoCompanyDetail->name. "\n";echo "</br>";
        echo "Cargo Company Detail Name: ".$cargoCompanyDetail->value. "\n";echo "</br>";
    }
    /** end of cargo details**/

    echo $productData->affiliateOption . "-affiliateOption\n";echo "</br>";
    
    echo $productData->boldOption . "-boldOption\n";echo "</br>";
    
    echo $productData->catalogOption . "-catalogOption\n";echo "</br>";
    
    echo $productData->vitrineOption . "-vitrineOption\n";echo "</br>";
    
    echo "-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-\n";echo "</br>";
}