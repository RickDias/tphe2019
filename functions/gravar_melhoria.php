<?php
session_start();

include('functions.php');
include('../config/config.php');

$classe_VO = include_VO2('melhorias');
$classe_DAO = include_DAO2('melhorias');

include($classe_VO);
include($classe_DAO);

	$link = conecta_db();

	$melhoriasVO = new melhoriasVO();

	$melhoriasVO->setDescricao($_POST['txtarquiz']);
	$melhoriasVO->setEmail($_POST['email']);
	$melhoriasVO->setId_usuario($_SESSION['UsuarioID']);

	$melhoriasDAO = new melhoriasDAO();

	//set mysql/false autocomit false
	//inicia transacao

	$melhoriasDAO->insert($melhoriasVO, $link);

	printf('Registro inserido com sucesso.');

	//commita

	desconecta_db($link);
?>
<html lang="pt-br">
    </br></br><a href="../admin-dev/index_base.php" class="alert-link">Voltar para a tela administrativa</a>
</html>
