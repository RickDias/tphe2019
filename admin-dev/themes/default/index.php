<?php

$smarty = new Smarty;
$smarty->template_dir = 'themes/default/template';
$smarty->config_dir = 'themes/default';
$smarty->cache_dir = 'cache';

$smarty->display('index.tpl');
