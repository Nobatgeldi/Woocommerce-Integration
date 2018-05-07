<?php
/**
 * Created by PhpStorm.
 * User: nobat
 * Date: 5/3/2018
 * Time: 02:06
 */
include ("source/client.php");
$client = new ggClient();
$xml ='<product>
          
    <categoryCode>2tc</categoryCode>
          
    <storeCategoryId></storeCategoryId>
          
    <title>Aymurat Deneme ürün</title>
          
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
                        
            <cargoCompany>aras</cargoCompany>
                     
        </cargoCompanies>
                 
        <shippingPayment>B</shippingPayment>
                 
        <cargoDescription></cargoDescription>
                 
        <shippingWhere>country</shippingWhere>
              
    </cargoDetail>
          
    <affiliateOption>false</affiliateOption>
          
    <boldOption>false</boldOption>
          
    <catalogOption>false</catalogOption>
          
    <vitrineOption>false</vitrineOption>
       
</product>';
try
{
    $result = $client->insertProducts(null,$xml,false,false);
    var_dump($result);
}
catch(Exception $e)
{
    echo "Error: ".$e->getMessage();
    echo "</br>";
}