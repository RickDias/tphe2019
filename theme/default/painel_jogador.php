<?php
// include 'menu.tpl';
$smarty = new Smarty;
$smarty->template_dir = 'theme/default/paginas';
$smarty->config_dir = 'themes/default';
$smarty->caching = false;
// $smarty->assign('menu_lateral', include "lateral_jogador.php");

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


$smarty->display('painel_jogador.tpl');

?>
