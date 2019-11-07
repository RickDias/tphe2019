<?php

session_start();

include('functions.php');
include('../config/config.php');

$idpergunta = $_POST['idpergunta'];
$txtrespcerta = $_POST['txtrespcerta'];
$txtresperr1 = $_POST['txtresperr1'];
$txtresperr2 = $_POST['txtresperr2'];
$txtresperr3 = $_POST['txtresperr3'];

$classe_VO = include_VO2('resposta');
$classe_DAO = include_DAO2('resposta');

include($classe_VO);
include($classe_DAO);

	$link = conecta_db();

  $respostaVO= new respostaVO();

  $respostaVO->setResposta($_POST['txtrespcerta']);
  $respostaVO->setTipo('V');
  $respostaVO->setId_pergunta($_POST['idpergunta']);

  $respostaDAO = new respostaDAO();
  $respostaDAO->insert($respostaVO, $link);

  $respostaVO= new respostaVO();

  $respostaVO->setResposta($_POST['txtresperr1']);
  $respostaVO->setTipo('F');
  $respostaVO->setId_pergunta($_POST['idpergunta']);

  $respostaDAO = new respostaDAO();
  $respostaDAO->insert($respostaVO, $link);

  $respostaVO= new respostaVO();

  $respostaVO->setResposta($_POST['txtresperr2']);
  $respostaVO->setTipo('F');
  $respostaVO->setId_pergunta($_POST['idpergunta']);

  $respostaDAO = new respostaDAO();
  $respostaDAO->insert($respostaVO, $link);

  $respostaVO= new respostaVO();

  $respostaVO->setResposta($_POST['txtresperr3']);
  $respostaVO->setTipo('F');
  $respostaVO->setId_pergunta($_POST['idpergunta']);

  $respostaDAO = new respostaDAO();
  $respostaDAO->insert($respostaVO, $link);
  printf('Registros inseridos com sucesso. ');

	//commita

	desconecta_db($link);


header("Location: admin-dev/index.php");

?>
