<?php
include_once 'functions/functions.php';
include_once 'config/config.php';

$controller = glob('controller/*.php');
$classes = glob('classes/*.php');
$smarty = glob('vendor/smarty/smarty/libs/*.php');


require_once('modules/teste/controllers/TesteController.php');

require_once('classes/configuration/Configuration.php');




foreach ($controller as $file) {
    require_once($file);
  }
foreach ($classes as $file2) {
    require_once($file2);
}
foreach ($smarty as $file3) {
    require_once($file3);
}
