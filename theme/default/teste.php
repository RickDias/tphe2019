<?php

$smarty = new Smarty;
$smarty->template_dir = 'theme/default/paginas/';
$smarty->config_dir = 'theme/default/';
$smarty->cache_dir = 'cache';

$parametroGet = Tools::getValue('get');

// var_dump($parametroGet);

$chama_modulo_teste = new TesteController();

$tpl = $chama_modulo_teste->testeInit();

// $smarty->display('teste.tpl');
