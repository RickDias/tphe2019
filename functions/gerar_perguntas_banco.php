<?php

session_start();

include('functions.php');
include('../config/config.php');

// $classe_VO = include_VO2('quiz');
// $classe_DAO = include_DAO2('quiz');

// include($classe_VO);
// include($classe_DAO);


	echo "ID_QUIZ: ".$_POST['sel_quiz']."<br/>";
	echo "ID_TURMA: ".$_POST['sel_turma']."<br/>";
	echo "ID_CATEGORIA: ".$_POST['sel_categoria']."<br/><br/>";

	// DENTRE AS PERGUNTAS CADASTRADAS PELO USUÁRIO, E FILTRADAS PELA CATEGORIA SELECIONADA, A
	// FUNÇÃO DEVE ESCOLHER ALEATORIAMENTE 10 PERGUNTAS
	// E INSERIR AS RELAÇÕES ENTRE AS TABELAS QUIZ E PERGUNTAS_QUIZ
  $link = conecta_db();

	// Tenta se conectar ao servidor MySQL

	//criando a query de consulta à tabela
	$query  = "SELECT `ID_PERGUNTA`, `DESCRICAO`, `PONTUACAO`, `ID_DISCIPLINA`, `ID_CATEGORIA`, `ID_USUARIO` ";
	$query .= " FROM `pergunta` WHERE `ID_USUARIO` = ".$_SESSION['UsuarioID'];
	$query .= " AND `ID_CATEGORIA` = ".$_POST['sel_categoria'];
	$query .= " AND `ID_DISCIPLINA`= 1"; //inicialmente, teremos somente Educação Física
	$query .= " ORDER BY RAND() LIMIT 10";
	//echo $query;
	$sql = mysqli_query($link, $query) or die(mysqli_error($link)); //caso haja um erro na consulta


  $classe_VO = include_VO2('pergunta_quiz');
  $classe_DAO = include_DAO2('pergunta_quiz');
	require_once $classe_VO;
	require_once $classe_DAO;


	$pergunta_quizVO = new pergunta_quizVO();

	while($aux = mysqli_fetch_assoc($sql)) {
		//percorrendo os registros da consulta.
		echo '<br/>ID_PERGUNTA: '.$aux['ID_PERGUNTA'].' - DESCRICAO: '.$aux['DESCRICAO'].'<BR/>';

		$pergunta_quizVO->setId_pergunta($aux['ID_PERGUNTA']);
		$pergunta_quizVO->setId_quiz($_POST['sel_quiz']);
		$pergunta_quizVO->setId_turma($_POST['sel_turma']);

		$pergunta_quizDAO = new pergunta_quizDAO();
		$pergunta_quizDAO->insert($pergunta_quizVO, $link);

	}

	// DE ACORDO COM A TURMA SELECIONADA, INSERIR A RELAÇÃO ENTRE TURMA E TURMA_QUIZ
  $classe_VO = include_VO2('turma_quiz');
  $classe_DAO = include_DAO2('turma_quiz');
  require_once $classe_VO;
  require_once $classe_DAO;

	$turma_quizVO = new turma_quizVO();

	$turma_quizVO->setId_quiz($_POST['sel_quiz']);
	$turma_quizVO->setId_turma($_POST['sel_turma']);

	$turma_quizDAO = new turma_quizDAO();
	echo "Turma: ".$_POST['sel_turma']." e Quiz: ".$_POST['sel_quiz']."<br/>";

	if($turma_quizDAO->insert($turma_quizVO, $link)){
    printf('Registro inserido com sucesso.');
  }

	desconecta_db($link);

?>

<html lang="pt-br">
    </br></br><a href="../admin-dev/index_base.php" class="alert-link">Voltar para a tela administrativa</a>
</html>
