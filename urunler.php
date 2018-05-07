<?php

/**
 * Created by PhpStorm.
 * User: nobat
 * Date: 4/29/2018
 * Time: 15:19
 */

if(isset($_SESSION["product"]))
{
    for ($x = 0; $x < sizeof($_SESSION["product"]); $x++)
    {
        $productID = $_SESSION["product"][$x]->productId;
        /** Collect sub data of each product**/
        $productData = $_SESSION["product"][$x]->product;
        $categoryCode = $productData->categoryCode;
        $storeCategoryId=$productData->storeCategoryId;
        $title=$productData->title;
        /** get photo data of product**/
        $photos = $productData->photos;

        $pageTemplate=$productData->pageTemplate;
        $description=$productData->description;
        $catalogId=$productData->catalogId;
        $catalogDetail=$productData->catalogDetail;
        $format=$productData->format;
        $buyNowPrice=$productData->buyNowPrice;
        $listingDays=$productData->listingDays;
        $productCount=$productData->productCount;
        /** cargo details**/
        $cargoDetail=$productData->cargoDetail;
        $city=$cargoDetail->city;
        $shippingPayment=$cargoDetail->shippingPayment;
        $shippingWhere=$cargoDetail->shippingWhere;
        ?>
        <tr>
            <td><?php echo $productID;?></td>
            <td><?php echo $categoryCode;?></td>
            <td><?php echo $title?></td>
            <td><?php echo $pageTemplate?></td>
            <td><?php echo $format?></td>
            <td><?php echo $buyNowPrice?></td>
            <td><?php echo $productCount?></td>
        </tr>
        <?php
    }
    for ($x = 0; $x < sizeof($_SESSION["product2"]); $x++)
    {
        $productID = $_SESSION["product2"][$x]->productId;
        /** Collect sub data of each product**/
        $productData = $_SESSION["product2"][$x]->product;
        $categoryCode = $productData->categoryCode;
        $storeCategoryId=$productData->storeCategoryId;
        $title=$productData->title;
        /** get photo data of product**/
        $photos = $productData->photos;

        $pageTemplate=$productData->pageTemplate;
        $description=$productData->description;
        $catalogId=$productData->catalogId;
        $catalogDetail=$productData->catalogDetail;
        $format=$productData->format;
        $buyNowPrice=$productData->buyNowPrice;
        $listingDays=$productData->listingDays;
        $productCount=$productData->productCount;
        /** cargo details**/
        $cargoDetail=$productData->cargoDetail;
        $city=$cargoDetail->city;
        $shippingPayment=$cargoDetail->shippingPayment;
        $shippingWhere=$cargoDetail->shippingWhere;
        ?>
        <tr>
            <td><?php echo $productID;?></td>
            <td><?php echo $categoryCode;?></td>
            <td><?php echo $title?></td>
            <td><?php echo $pageTemplate?></td>
            <td><?php echo $format?></td>
            <td><?php echo $buyNowPrice?></td>
            <td><?php echo $productCount?></td>
        </tr>
        <?php
    }
}
else
{
    ?>
    <tr>

        <td><?php echo "Buttona tıklarayak gücelle"?></td>

    </tr>
    <?php
}

?>