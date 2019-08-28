<?php


// include 'menu.tpl';
$smarty = new Smarty;
$smarty->assign('cessao', false);

session_start();
if($_SESSION){
  $user_id = $_SESSION["UsuarioID"];

  $smarty->assign(array(
    'id_usuario' => $user_id,
    'cessao' => true,
  ));

}



$smarty->display('menu.tpl');

?>
