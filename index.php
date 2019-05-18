<?php
echo "gerson";
session_start();
global $smarty, $context;
// autoload do Composer
require 'vendor/autoload.php';
// require 'includes.php';
// $configuration = new Configuration(__DIR__);
$index = new IndexController();
?>
