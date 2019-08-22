<?php
// include 'menu.tpl';
$smarty = new Smarty;
$smarty->template_dir = 'theme/default/paginas';
$smarty->config_dir = 'themes/default';
$smarty->caching = false;
// $smarty->assign('cessao', false);

// session_start();
// if($_SESSION){
//   $user_id = $_SESSION["UsuarioID"];
//
//   $smarty->assign(array(
//     'id_usuario' => $user_id,
//     'cessao' => true,
//   ));
//
// }


$smarty->display('lateral_jogador.tpl');

?>
