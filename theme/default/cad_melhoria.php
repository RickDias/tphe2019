<?php

$smarty = new Smarty;
$smarty->template_dir = 'theme/default/paginas/';
$smarty->config_dir = 'theme/default/';
$smarty->cache_dir = 'cache';
$link = conecta_db();

$id_usuario = $_SESSION["UsuarioID"];
$user_email = $_SESSION['UsuarioEmail'];
$smarty->assign("id_user", $id_usuario);
$smarty->assign("user_email", $user_email);


// if($id_ususario == 3){
  $sql_m = "SELECT m.`DESCRICAO`
  FROM `melhorias` m
  WHERE m.`ID_MELHORIA` > 0";

  $resultado_m = mysqli_query($link, $sql_m) or die(mysqli_error($link));

  if($resultado_m->num_rows > 0){
    while ( $rm = mysqli_fetch_array( $resultado_m) ) {
      $melhoria[] = $rm;
    }
    $smarty->assign("melhoria", $melhoria);
  }
// }


$salva_melhoria = Tools::getValue("salva_melhoria");

if($salva_melhoria  == 1){
  $classe_VO = include_VO('melhorias');
  $classe_DAO = include_DAO('melhorias');
  include($classe_VO);
  include($classe_DAO);

  $melhoriasVO = new melhoriasVO();

  $melhoriasVO->setDescricao(Tools::getValue("txtarquiz"));
  $melhoriasVO->setEmail(Tools::getValue("email"));
  $melhoriasVO->setId_usuario($_SESSION['UsuarioID']);

  $melhoriasDAO = new melhoriasDAO();

  $salva_melhorias = $melhoriasDAO->insert($melhoriasVO, $link);
if($salva_melhorias){
  $smarty->assign('alert', "Melhoria registrada com sucesso, obrigado!");
}else{
  $smarty->assign('alertE', "Erro ao inserir, entre em contato com o professor!");
}

}

$smarty->display('cad_melhoria.tpl');
