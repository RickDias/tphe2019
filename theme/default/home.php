<?php

$smarty = new Smarty;
$smarty->template_dir = 'theme/default/paginas/';
$smarty->config_dir = 'theme/default/';
$smarty->cache_dir = 'cache';

  // $con = conecta_db();
  // $base_facebook = 'https://facebook.com/profile.php?id=';


  // $smarty->assign(array(
  //     'usuarios' => $todos_usuarios,
  //     'tipo' => $tipo,
  //     'base_facebook' => $base_facebook
  //
  // ));

  $smarty->display('home.tpl');
