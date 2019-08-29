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

	$cod_turma=hash('ripemd160',rand(0,20));

	$turmaVO = new turmaVO();

	$turmaVO->setNome($_POST['nome_turma']);
	$turmaVO->setSigla($_POST['sigla_turma']);
	$turmaVO->setAno($_POST['ano_turma']);
	$turmaVO->setSemestre($_POST['semestre_turma']);
	$turmaVO->setId_disciplina($_POST['disciplina']);
	$turmaVO->setId_usuario($_SESSION['UsuarioID']);
	$turmaVO->setCodigo_turma($cod_turma);

	$turmaDAO = new turmaDAO();
	//set mysql/false autocomit false
	//inicia transacao
	$turmaDAO->insert($turmaVO, $link);
	//commita
	desconecta_db($link);

?>

<html lang="pt-br">
<head>
	<link href="../theme/default/paginas/css/main.css" rel="stylesheet" type="text/css">
</head>
<div class="container_aviso">
	<br>Este será o código da turma, sera utilizado para o cadastro dos alunos:
	<div class="cod_turma">
		<?php echo $cod_turma; ?>
	</div>
<button class="botao_aviso"><a href="../admin-dev/index_base.php" class="alert-link">Concluir</a></button>
</div>

</html>
