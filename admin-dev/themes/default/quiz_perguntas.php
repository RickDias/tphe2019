<?php

$smarty = new Smarty;
$smarty->template_dir = 'themes/default/template';
$smarty->config_dir = 'themes/default';
$smarty->caching = false;


// Tenta se conectar ao servidor MySQL
$con = conecta_db();

//criando a query de consulta à tabela
$query  = "SELECT distinct(`pergunta`.`ID_PERGUNTA`), `pergunta`.`DESCRICAO` as 'TEXTO', `categoria`.`DESCRICAO` ";
$query .= " FROM `pergunta`, `pergunta_quiz`,`categoria` ";
$query .= " WHERE `pergunta`.`ID_PERGUNTA` = `pergunta_quiz`.`ID_PERGUNTA` ";
$query .= " AND `pergunta`.`ID_CATEGORIA` = `categoria`.`ID_CATEGORIA`";
$query .= " AND `pergunta_quiz`.`ID_PERGUNTA` in (SELECT `ID_PERGUNTA` FROM `pergunta_quiz` where `ID_QUIZ`=".$_POST['id-quiz'];
$query .= " and `ID_TURMA`=".$_POST['id-turma'].")";

$resultados = mysqli_query($con, $query) or die(mysqli_error($con)); //caso haja um erro na consulta

while($auxResp = mysqli_fetch_assoc($resultados)) {
  $queryResp  = "SELECT `ID_RESPOSTA`, `RESPOSTA`, `TIPO`, `ID_PERGUNTA`";
  $queryResp .= " FROM `resposta` WHERE `ID_PERGUNTA`=".$auxResp['ID_PERGUNTA'];
  $sqlResp = mysqli_query($con, $queryResp) or die(mysqli_error($con)); //caso haja um erro na consulta
}

  $smarty->assign(array(
    'resultados' => $resultados,
    'respostas' => $sqlResp
  ));


$smarty->display('quiz_perguntas.tpl');
