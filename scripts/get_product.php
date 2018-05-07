<?php

    session_start();

    header('Content-Type: text/html; charset=utf-8');
    include("connection.php");

    //get products data from database
    //$sql = "SELECT `post_title`,`post_date`,`post_name`,`guid`,`post_content` FROM `wpjo_posts` WHERE post_type='product' ORDER by ID DESC LIMIT 20 OFFSET 20";
    $sql = "SELECT p.id, mt.meta_value AS sku, m.meta_value AS stock, p.post_title AS title,pt.meta_value AS price, wt.meta_value AS weight, trm.name AS name, trm.slug AS slug, p.post_date FROM wpjo_posts p INNER JOIN wpjo_postmeta m ON (p.id = m.post_id) INNER JOIN wpjo_postmeta mt ON (p.id = mt.post_id) INNER JOIN wpjo_postmeta pt ON (p.id = pt.post_id) INNER JOIN wpjo_postmeta wt ON (p.id = wt.post_id) INNER JOIN wpjo_term_relationships trt ON (p.id = trt.object_id) INNER JOIN wpjo_term_taxonomy ttx ON (ttx.term_taxonomy_id = trt.term_taxonomy_id) INNER JOIN wpjo_terms trm ON (trm.term_id = trt.term_taxonomy_id) WHERE p.post_type = 'product' AND m.meta_key = '_stock' AND mt.meta_key = '_sku' AND pt.meta_key = '_price' AND wt.meta_key = '_weight' AND ttx.taxonomy = 'product_cat' ORDER BY p.id DESC LIMIT 100";
    $result=mysqli_query($conn,$sql);
    if (!mysqli_query($conn,$sql))
    {
        echo("Error description: " . mysqli_error($conn));
    }
    if (!empty($result->num_rows))
    {
        $say=0;
        $results=array();
        while($line = mysqli_fetch_array($result,MYSQLI_NUM))
        {
            $results[$say] = $line;
            $_SESSION["store_product"][$say]=$results;
            $say++;
        }
        print '<script>history.back(-1);</script>';
        /*for($i=0; $i<sizeof($results);$i++)
        {
            if($i<sizeof($results)/2)
            {

            }
            else
            {

            }
        }*/

        /*for ($x = 0; $x < sizeof($_SESSION["product"]); $x++)
        {
            echo $x;
            echo "---------------------------------------------------------------------------------------------------";
            $session_array = $_SESSION["product"][$x];
            for ($j = 0; $j < sizeof($session_array[$x]); $j++)
            {
                echo $session_array[$x][$j]."<br>";
                //echo $j;
            }
            echo "<br>";
        }*/
    }
    else
    {
        print '<script>alert("Error on select");history.back(-1);</script>';
        exit;
    }
    mysqli_free_result($result);
    $conn->close();
?>