<?php
/**
 * Created by PhpStorm.
 * User: nobat
 * Date: 5/3/2018
 * Time: 00:37
 */

if(isset($_SESSION["store_product"]))
{
    for ($x = 0; $x < sizeof($_SESSION["store_product"]); $x++)
    {
        $session_array = $_SESSION["store_product"][$x];
        ?><tr><?php
        for ($j = 0; $j < sizeof($session_array[$x]); $j++)
        {
            ?><td><?php  echo $session_array[$x][$j]; ?></td><?php
        }
        ?> </tr><?php
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