<?php
session_start();

include('functions.php');
include('../config/config.php');

$classe_VO = include_VO2('quiz');
$classe_DAO = include_DAO2('quiz');

include($classe_VO);
include($classe_DAO);

	$link = conecta_db();

	$quizVO = new quizVO();

	$quizVO->setDescricao($_POST['txtarquiz']);
	$quizVO->setDt_inicio($_POST['data_in']);
	$quizVO->setDt_fim($_POST['data_fi']);
	$quizVO->setPublicacao($_POST['optionsRadios']);
	$quizVO->setId_usuario($_SESSION['UsuarioID']);


	$quizDAO = new quizDAO();

	//set mysql/false autocomit false
	//inicia transacao

	if($quizDAO->insert($quizVO, $link)){
    printf('Registro inserido com sucesso.');
  }
	//commita
	desconecta_db($link);
?>


<html lang="pt-br">
</br></br><a href="../admin-dev/index_base.php" class="alert-link">Voltar para a tela administrativa</a>
</html>
