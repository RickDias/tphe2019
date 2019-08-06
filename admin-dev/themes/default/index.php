<?php

$smarty = new Smarty;
$smarty->template_dir = 'themes/default/template';
$smarty->config_dir = 'themes/default';
$smarty->caching = false;


// Tenta se conectar ao servidor MySQL
$cx = mysqli_connect("localhost", "root", "");
//$cx = mysqli_connect("192.168.4.3", "karlise", "270346");

// Tenta se conectar a um banco de dados MySQL
$db = mysqli_select_db($cx, "tphe");
//$db = mysqli_select_db($cx, "karlise");

//criando a query de consulta à tabela
$sql = mysqli_query($cx, "SELECT `quiz`.`ID_QUIZ`, `quiz`.`ID_USUARIO`, `quiz`.`DESCRICAO`,
              date_format(`quiz`.`DT_INICIO`, '%d-%m-%Y') AS 'DT_INICIO',
              date_format(`quiz`.`DT_FIM`, '%d-%m-%Y') AS 'DT_FIM', `PUBLICACAO` ,
              `turma`.`SIGLA`, `turma`.`ID_TURMA`
              FROM `quiz`,`turma_quiz`, `turma`
              WHERE `quiz`.`ID_QUIZ` = `turma_quiz`.`ID_QUIZ`
              AND `turma_quiz`.`ID_TURMA` = `turma`.`ID_TURMA`
              AND `quiz`.`ID_USUARIO` = ".$_SESSION['UsuarioID']) or die(
              mysqli_error($cx) //caso haja um erro na consulta
              );
var_dump($sql);
var_dump($cx);
while($arr = mysqli_fetch_assoc($sql)) {
  //percorrendo os registros da consulta.
  $smarty->assign(array(
    'arr' => $arr,
    'nome_usuario' => "teste"
  ));
}


$smarty->display('index.tpl');
