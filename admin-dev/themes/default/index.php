<?php

$smarty = new Smarty;
$smarty->template_dir = 'themes/default/template';
$smarty->config_dir = 'themes/default';
$smarty->caching = false;


// Tenta se conectar ao servidor MySQL
$con = conecta_db();

//criando a query de consulta à tabela
$sql = "SELECT q.`ID_QUIZ`, q.`ID_USUARIO`, q.`DESCRICAO`,
              date_format(q.`DT_INICIO`, '%d-%m-%Y') AS 'DT_INICIO',
              date_format(q.`DT_FIM`, '%d-%m-%Y') AS 'DT_FIM', `PUBLICACAO` ,
              t.`SIGLA`, t.`ID_TURMA`, u.`NOME`
              FROM `quiz` q,`turma_quiz`tq, `turma` t, `usuario` u
              WHERE q.`ID_QUIZ` = tq.`ID_QUIZ`
              AND tq.`ID_TURMA` = t.`ID_TURMA`
              AND u.`ID_USUARIO` = ".$_SESSION['UsuarioID']."
              AND q.`ID_USUARIO` = ".$_SESSION['UsuarioID'];

$resultados = mysqli_query($con, $sql) or die(mysqli_error($con)); //caso haja um erro na consulta
// $resultados = mysqli_fetch_assoc($query);
// var_dump($sql);
  //percorrendo os registros da consulta.
// $resultados = $query->num_rows;
  $smarty->assign(array(
    'resultados' => $resultados,
    'sessao' => $_SESSION
  ));


$smarty->display('index.tpl');
