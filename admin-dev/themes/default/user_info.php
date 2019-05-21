<?php

$smarty = new Smarty;
$smarty->template_dir = 'themes/default/template';
$smarty->config_dir = 'themes/default';
$smarty->cache_dir = 'cache';

$nome = $_SESSION['UsuarioNome'];

$smarty->assign(array(
    'nome_usuario' => $nome,
    // 'tipo' => $tipo,
    // 'base_facebook' => $base_facebook

));


$smarty->display('user_info.tpl');
