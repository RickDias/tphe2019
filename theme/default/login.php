<?php
if($_SESSION){
  ?>
  <script language="JavaScript">
  window.location="index.php?pag=painel_jogador";
  </script>
  <?php
}

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

    // $_SESSION['logged_in'] = true; //set you've logged in
    // $_SESSION['last_activity'] = time(); //your last activity was now, having logged in.
    // $_SESSION['expire_time'] = 20;//3*60*60; //expire time in seconds: three hours (you must change this)

    // $_SESSION['DescPerfil'] = $resultado['desc'];
    // include 'admin-dev/index.php';
    if($resultado['ID_TIPO_USUARIO'] == 3){
      header("Location: index.php?pag=painel_jogador");
    }else{
      header("Location: admin-dev/index_base.php");
    }
  }else{
    echo 'usuario ou senha incorreto!';
  }
}else{
  $smarty = new Smarty;
  $smarty->template_dir = 'theme/default/paginas/';
  $smarty->config_dir = 'theme/default/';
  $smarty->cache_dir = 'cache';

  if(Tools::getValue("cad_ok") == 1){
    $smarty->assign("txt_cad", "Cadastro realizado, agora faça seu Login!");
  }

  $smarty->display('login.tpl');
}
