<?php

	session_start();
    //echo $_SESSION['UsuarioNome'].' ('.$_SESSION['UsuarioID'].')'.', bem vindo à página do Professor! <br/>';
    include('functions.php');
    include('../config/config.php');

    $classe_VO = include_VO2('turma');
    $classe_DAO = include_DAO2('turma');

    include($classe_VO);
    include($classe_DAO);

	$link = conecta_db();

	$turmaVO = new turmaVO();

	$turmaVO->setNome($_POST['nome_turma']);
	$turmaVO->setSigla($_POST['sigla_turma']);
	$turmaVO->setAno($_POST['ano_turma']);
	$turmaVO->setSemestre($_POST['semestre_turma']);
	$turmaVO->setId_disciplina($_POST['disciplina']);
	$turmaVO->setId_usuario($_SESSION['UsuarioID']);

	$turmaDAO = new turmaDAO();

	//set mysql/false autocomit false
	//inicia transacao

	$turmaDAO->insert($turmaVO, $link);

	printf('Registro inserido com sucesso.');

	//commita

	desconecta_db($link);
?>


<html lang="pt-br">
    </br></br><a href="../admin-dev/index_base.php" class="alert-link">Voltar para a tela administrativa</a>
</html>
