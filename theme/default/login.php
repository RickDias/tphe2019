<?php

if(Tools::getValue('form_login') == 1){
  $email = Tools::getValue('email');
  $senha =  Tools::getValue('senha');
  // var_dump($email);
  // var_dump($senha);

  $resultado = testalogin($email,$senha);

  if($resultado != false){
    if (!isset($_SESSION)) session_start();

    $_SESSION['UsuarioID'] = $resultado['ID_USUARIO'];
    $_SESSION['UsuarioNome'] = $resultado['NOME'];
    $_SESSION['UsuarioEmail'] = $resultado['EMAIL'];
    $_SESSION['UsuarioNivel'] = $resultado['ID_TIPO_USUARIO'];
    $_SESSION['IdFacebook'] = $resultado['id_facebook'];
    $_SESSION['Theme'] = $resultado['theme'];
    $_SESSION['ImgPerfil'] = $resultado['img_perfil'];
    $_SESSION['ImgCapa'] = $resultado['img_capa'];
    $_SESSION['DescPerfil'] = $resultado['desc'];
    // include 'admin-dev/index.php';
    header("Location: index.php?pag=painel_jogador");
  }else{
    echo 'usuario ou senha incorreto!';
  }
}else{
  $smarty = new Smarty;
  $smarty->template_dir = 'theme/default/paginas/';
  $smarty->config_dir = 'theme/default/';
  $smarty->cache_dir = 'cache';

  $smarty->display('login.tpl');
}
