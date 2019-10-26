<html lang="pt-br">
<head>
<link href="../theme/default/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background:#eee">
	<center>
<?php
session_start();

include('functions.php');
include('../config/config.php');

	// echo "ID_QUIZ: ".$_POST['sel_quiz']."<br/>";
	// echo "ID_TURMA: ".$_POST['sel_turma']."<br/>";
	// echo "ID_CATEGORIA: ".$_POST['sel_categoria']."<br/><br/>";

  $link = conecta_db();

	//criando a query de consulta à tabela
	$query  = "SELECT `ID_PERGUNTA`, `DESCRICAO`, `PONTUACAO`, `ID_DISCIPLINA`, `ID_CATEGORIA`, `ID_USUARIO` ";
	$query .= " FROM `pergunta` WHERE `ID_CATEGORIA` = ".$_POST['sel_categoria'];
	$query .= " AND `ID_DISCIPLINA`= 1"; //inicialmente, teremos somente Educação Física
	$query .= " ORDER BY RAND() LIMIT 10";

	$sql = mysqli_query($link, $query) or die(mysqli_error($link)); //caso haja um erro na consulta

  $classe_VO = include_VO2('pergunta_quiz');
  $classe_DAO = include_DAO2('pergunta_quiz');
	require_once $classe_VO;
	require_once $classe_DAO;


	$pergunta_quizVO = new pergunta_quizVO();

	if($sql){
	while($aux = mysqli_fetch_assoc($sql)) {
		//percorrendo os registros da consulta.
		echo '<br/><div class="alert alert-warning" role="alert" style="margin:10px">ID_PERGUNTA: '.$aux['ID_PERGUNTA'].' - DESCRICAO: '.$aux['DESCRICAO'].'</div><BR/>';

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
	echo "<h4>Turma: ".$_POST['sel_turma']." e Quiz: ".$_POST['sel_quiz']."</h4><br/>";

	if($turma_quizDAO->insert($turma_quizVO, $link)){
    printf('<div class="alert alert-success" role="alert" style="margin:10px">Registro inserido com sucesso.</div>');
  }

}else{
	echo '<div class="alert alert-danger" role="alert" style="margin:10px">A consulta não retornou nenhum resultado!</div>';
}

	desconecta_db($link);

?>
	<div class="container-fluid">
  	<div class="row">
  		<div class="col-md-12">
			</br></br><a href="../admin-dev/index_base.php" class="alert-link">Voltar para a tela administrativa</a>
			</div>
		</div>
	</div>
</center>
</body>
</html>
