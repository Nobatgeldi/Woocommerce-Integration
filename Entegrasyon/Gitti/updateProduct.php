<?php
/**
 * Created by PhpStorm.
 * User: nobat
 * Date: 5/3/2018
 * Time: 02:34
 */

include ("source/client.php");
$client = new ggClient();
$xml ='<product>
          
    <categoryCode>2tc</categoryCode>
          
    <storeCategoryId></storeCategoryId>
          
    <title>Aymurat Deneme Product</title>
          
    <subtitle></subtitle>
          
    <specs>
                 
        <spec name="Renk" value="Gri - Siyah" type="Combo" required="true"/>
                 
        <spec name="Durum" value="Sıfır" type="Combo" required="true"/>
                 
        <spec name="Marka" value="Einhell" type="Combo" required="true"/>
                      
    </specs>
          
    <photos>
                 
        <photo photoId="0">
                        
            <url>https://mcdn01.gittigidiyor.net/34798/tn50/347980248_tn50_0.jpg</url>
                        
            <base64></base64>
                     
        </photo>
              
    </photos>
          
    <pageTemplate>1</pageTemplate>
          
    <description>Einhell Duvara Monte Otomatik Hortum Makarası</description>
          
    <startDate></startDate>
          
    <catalogId></catalogId>
          
    <catalogDetail></catalogDetail>
          
    <catalogFilter></catalogFilter>
          
    <format>S</format>
          
    <startPrice></startPrice>
          
    <buyNowPrice>240</buyNowPrice>
          
    <netEarning></netEarning>
          
    <listingDays>30</listingDays>
          
    <productCount>1</productCount>
          
    <cargoDetail>
                 
        <city>34</city>
                 
        <cargoCompanies>
                        
            <cargoCompany>mng</cargoCompany>
                     
        </cargoCompanies>
                 
        <shippingPayment>S</shippingPayment>
                 
        <cargoDescription></cargoDescription>
                 
        <shippingWhere>country</shippingWhere>
        
        <cargoCompanyDetail>
        
            <cargoCompanyDetail name="mng" value="MNG Kargo" />
            
        </cargoCompanyDetail>
              
    </cargoDetail>
          
    <affiliateOption>false</affiliateOption>
          
    <boldOption>false</boldOption>
          
    <catalogOption>false</catalogOption>
          
    <vitrineOption>false</vitrineOption>
       
</product>';

/*try
{
    $result = $client->getProduct(347980248);
    var_dump($result);
}
catch(Exception $e)
{
    echo "Error: ".$e->getMessage();
    echo "</br>";
}
/*$productDetail=$result->productDetail;
var_dump($productDetail->productId);*/

/*try
{
    $result = $client->updateProduct('',348023192, $xml, false, false, false);
    var_dump($result);
}
catch(Exception $e)
{
    echo "Error: ".$e->getMessage();
    echo "</br>";
}*/

$products = array(
    'item'=>'348023192'
);

$itemIdList = array(
);
try
{
    $result = $client->relistProducts($products,$itemIdList);
    var_dump($result);
}
catch(Exception $e)
{
    echo "Error: ".$e->getMessage();
    echo "</br>";
}