<?php
// include 'menu.tpl';
$smarty = new Smarty;
// session_start();

if($_SESSION){
  $smarty->assign('cessao', true);
  $user_id = $_SESSION["UsuarioID"];
  $smarty->assign(array(
    'id_usuario' => $user_id,
    'cessao' => true,
  ));
}else{
  $smarty->assign('cessao', false);
}



$smarty->display('menu.tpl');

?>
