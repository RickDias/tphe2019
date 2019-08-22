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
$classe_VO = include_VO2('admensagem');
$classe_DAO = include_DAO2('admensagem');

include($classe_VO);
include($classe_DAO);

$classe_VO = include_VO2('usuario');
$classe_DAO = include_DAO2('usuario');

include($classe_VO);
include($classe_DAO);

$admensagemDAO = new admensagemDAO();
$avisos = $admensagemDAO->getAll($con);
// var_dump($avisos);exit;
if(count($avisos)>0){
  $usuarioDAO = new usuarioDAO();
  foreach($avisos as $key=>$aviso){
    $usuario[] = $usuarioDAO->getLikeUsuario($con,$aviso->getId_usuario());
    $smarty->assign('usuario', $usuario);
  }
  $smarty->assign('avisos', $avisos);
}

  $smarty->assign(array(
    'resultados' => $resultados,
    'sessao' => $_SESSION
  ));


$smarty->display('index.tpl');
