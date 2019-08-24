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
$con = conecta_db();

$classe_VO = include_VO('admensagem');
$classe_DAO = include_DAO('admensagem');

include($classe_VO);
include($classe_DAO);

$classe_VO = include_VO('usuario');
$classe_DAO = include_DAO('usuario');

include($classe_VO);
include($classe_DAO);

$admensagemDAO = new admensagemDAO();
$avisos = $admensagemDAO->getAll($con);
// var_dump($avisos);exit;
if(count($avisos)>0){
  $usuarioDAO = new usuarioDAO();
  foreach($avisos as $key=>$aviso){
    $usuario[] = $usuarioDAO->getLikeUsuario($con,$aviso->getId_usuario());
    $smarty->assign('usuario', $usuario);
  }
  $smarty->assign('avisos', $avisos);
}


$smarty->display('painel_jogador.tpl');

?>
