<?php

$smarty = new Smarty;
$smarty->template_dir = 'theme/default/paginas/';
$smarty->config_dir = 'theme/default/';
$smarty->cache_dir = 'cache';

$classe_VO = include_VO('usuario');
$classe_DAO = include_DAO('usuario');

require $classe_VO;
require $classe_DAO;


  // $usuarioVO = new usuarioVO();
  $usuarioDAO = new usuarioDAO();
  $con = conecta_db();
  $todos_usuarios[0] = $usuarioDAO->getLikeUsuario($con,3);
  $todos_usuarios[1] = $usuarioDAO->getLikeUsuario($con,5);
  $base_facebook = 'https://facebook.com/profile.php?id=';

  foreach($todos_usuarios as $usuario){
    if($usuario[0]->id_tipo_usuario==1){
      $tipo[] ='Administrador';
    }elseif($usuario->id_tipo_usuario==2){
      $tipo[] ='Professor';
    }else{
      $tipo[] ='Aluno';
    }
  }
  $smarty->assign(array(
      'usuarios' => $todos_usuarios,
      'tipo' => $tipo,
      'base_facebook' => $base_facebook

  ));

  $smarty->display('sobre.tpl');
