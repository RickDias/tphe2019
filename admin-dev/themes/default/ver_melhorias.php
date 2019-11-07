<?php

$smarty = new Smarty;
$smarty->template_dir = 'themes/default/template/';
$smarty->config_dir = 'theme/default/';
$smarty->cache_dir = 'cache';

// Tenta se conectar ao servidor MySQL
$con = conecta_db();

$sql = mysqli_query($con, "SELECT `ID_MELHORIA`, `DESCRICAO`, `DT_SOLICITACAO`, `DT_ATUALIZACAO`, `SITUACAO`, `ID_USUARIO`
  FROM `melhorias`
  WHERE `ID_USUARIO` = ".$_SESSION['UsuarioID']) or die(
    mysqli_error($con) //caso haja um erro na consulta
  );
$resultados = $sql->num_rows;

$smarty->assign(array(
  'resultados' =>$resultados,
));
//criando a query de consulta à tabela
// $sql = mysqli_query($con, "SELECT `disciplina`.`ID_DISCIPLINA`, `disciplina`.`NOME` as 'disciplina' FROM `disciplina`");

while($aux = mysqli_fetch_assoc($sql)) {
  $smarty->assign(array(
    'aux' => $aux,
  ));
}
$smarty->display('ver_melhorias.tpl');
