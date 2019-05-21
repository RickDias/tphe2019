<?php

if(Tools::getValue('form_login') == 1){
  $email = Tools::getValue('email');
  $senha =  Tools::getValue('senha');
  // var_dump($email);
  // var_dump($senha);

  $cessao = testalogin($email,$senha);

  // var_dump($login);


  if($cessao){
    // include 'admin-dev/index.php';
    // header("Location: admin-dev/index.php");
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
