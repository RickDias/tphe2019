<?php

$smarty = new Smarty;
$smarty->template_dir = 'themes/default';
$smarty->config_dir = 'themes/default';
$smarty->cache_dir = 'cache';

$smarty->display('index.php');
