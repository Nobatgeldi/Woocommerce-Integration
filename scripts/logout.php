<?php
/**
 * Created by PhpStorm.
 * User: nobat
 * Date: 12/31/2017
 * Time: 00:25
 */
session_destroy();
$url="../login/";
header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
?>