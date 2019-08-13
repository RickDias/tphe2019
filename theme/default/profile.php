<?php

$smarty = new Smarty;
$smarty->template_dir = 'theme/default/paginas/';
$smarty->config_dir = 'theme/default/';

$classe_VO = include_VO('usuario');
$classe_DAO = include_DAO('usuario');

require $classe_VO;
require $classe_DAO;


  // $usuarioVO = new usuarioVO();
  $usuarioDAO = new usuarioDAO();
  $con = conecta_db();
  $usuario = $usuarioDAO->getLikeUsuario($con,$_SESSION['UsuarioID']);
  $base_facebook = "https://facebook.com/profile.php?id=";
  $img_perfil = 'admin-dev/img/'.$_SESSION['ImgPerfil'].'.jpg';
  $img_capa = 'admin-dev/img/'.$_SESSION['ImgCapa'].'.jpg';




  $smarty->assign(array(
      'usuario' => $usuario,
      'base_facebook' => $base_facebook,
      'img_perfil' => $img_perfil,
      'img_capa' => $img_capa
  ));

  $smarty->display('profile.tpl');
