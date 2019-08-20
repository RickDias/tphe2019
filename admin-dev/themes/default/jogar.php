<?php

$smarty = new Smarty;
$smarty->template_dir = 'themes/default/template/';
$smarty->config_dir = 'theme/default/';

$turma = $_POST['id-turma'];
$quiz = $_POST['id-quiz'];
$jogo = "";

// QRcode::png($turma.";".$quiz, "QR_code.png");

$con = conecta_db();

//SQL que consulta as perguntas geradas para um quiz
//Considerando o ID_QUIZ, e ID_TURMA

//criando a query de consulta à tabela
$query  = "SELECT distinct(`pergunta`.`ID_PERGUNTA`), `pergunta`.`DESCRICAO` as 'TEXTO', `categoria`.`DESCRICAO` ";
$query .= " FROM `pergunta`, `pergunta_quiz`,`categoria` ";
$query .= " WHERE `pergunta`.`ID_PERGUNTA` = `pergunta_quiz`.`ID_PERGUNTA` ";
$query .= " AND `pergunta`.`ID_CATEGORIA` = `categoria`.`ID_CATEGORIA`";
$query .= " AND `pergunta_quiz`.`ID_PERGUNTA` in (SELECT `ID_PERGUNTA` FROM `pergunta_quiz` where `ID_QUIZ`=".$_POST['id-quiz'];
$query .= " and `ID_TURMA`=".$_POST['id-turma'].")";

// echo $query;
$retorno = mysqli_query($con, $query) or die(mysqli_error($con)); //caso haja um erro na consulta

echo "ID_QUIZ: ".$_POST['id-quiz']." - TURMA: #".$_POST['id-turma']."</br>";

while($aux = mysqli_fetch_assoc($retorno)) {
  //percorrendo os registros da consulta.
echo ("Pergunta: ".$aux['TEXTO']);
  //criando a query de consulta à tabela
  $queryResp  = "SELECT `ID_RESPOSTA`, `RESPOSTA`, `TIPO`, `ID_PERGUNTA`";
  $queryResp .= " FROM `resposta` WHERE `ID_PERGUNTA`=".$aux['ID_PERGUNTA'];

  $sqlResp = mysqli_query($con, $queryResp) or die(mysqli_error($con)); //caso haja um erro na consulta


  while($auxResp = mysqli_fetch_assoc($sqlResp)) {
    //percorrendo os registros da consulta.
    if ($auxResp['TIPO'] == 'F') {
      echo "<div class='alert alert-danger'>";
      echo "<i class='fa fa-times-circle fa-1x'></i>  ";
    } else {
      echo "<div class='alert alert-success'>";
      echo "<i class='fa fa-check-circle fa-1x'></i>  ";};
    echo $auxResp['RESPOSTA'];
    echo "</div>";
  }
  // var_dump($sqlResp);

}

// $classe_VO = include_VO('usuario');
// $classe_DAO = include_DAO('usuario');

// require $classe_VO;
// require $classe_DAO;


  // $usuarioVO = new usuarioVO();
  // $usuarioDAO = new usuarioDAO();
  // $con = conecta_db();
  // $todos_usuarios = $usuarioDAO->getAll($con);

  $smarty->assign(array(
    'texto' => "texto final jogar.php"
  ));

  $smarty->display('jogar.tpl');
