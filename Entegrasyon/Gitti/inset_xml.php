<?php
/**
 * Created by PhpStorm.
 * User: nobat
 * Date: 5/3/2018
 * Time: 01:54
 */
if (file_exists('insert.xml'))
{
    $result = simplexml_load_file('insert.xml');
    //var_dump($result);
} else {
    exit('exam.xml açılamadı.');
}
var_dump($result->photos) ;