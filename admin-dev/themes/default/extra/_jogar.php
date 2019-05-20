<?php 
$turma = $_POST['id-turma'];
$quiz = $_POST['id-quiz'];
$jogo = "";
QRcode::png($turma.";".$quiz, "QR_code.png");  

echo "<div align='center'>";
?>

 
           <img src="QR_code.png" width=550 heigth=550>  

<?php
echo "</div>";
/*	//iniciando a conexão com o banco de dados
	$cx = mysqli_connect("localhost", "root", "");

	//selecionando o banco de dados
	$db = mysqli_select_db($cx, "tphe");

	//SQL que consulta as perguntas geradas para um quiz
	//Considerando o ID_QUIZ, e ID_TURMA
	
	//criando a query de consulta à tabela 
	$query  = "SELECT distinct(`pergunta`.`ID_PERGUNTA`), `pergunta`.`DESCRICAO` as 'TEXTO', `categoria`.`DESCRICAO` ";
	$query .= " FROM `pergunta`, `pergunta_quiz`,`categoria` ";
	$query .= " WHERE `pergunta`.`ID_PERGUNTA` = `pergunta_quiz`.`ID_PERGUNTA` ";
	$query .= " AND `pergunta`.`ID_CATEGORIA` = `categoria`.`ID_CATEGORIA`";
	$query .= " AND `pergunta_quiz`.`ID_PERGUNTA` in (SELECT `ID_PERGUNTA` FROM `pergunta_quiz` where `ID_QUIZ`=".$_POST['id-quiz'];
	$query .= " and `ID_TURMA`=".$_POST['id-turma'].")";
		
	//echo $query;
	$sql = mysqli_query($cx, $query) or die(mysqli_error($cx)); //caso haja um erro na consulta
	

	echo "ID_QUIZ: #".$_POST['id-quiz']." - TURMA: #".$_POST['id-turma']; 

	while($aux = mysqli_fetch_assoc($sql)) {
		//percorrendo os registros da consulta.									

		echo "ID_PERGUNTA: #".$aux['ID_PERGUNTA']; 
		echo $aux['TEXTO'];
																					
		//criando a query de consulta à tabela 
		$queryResp  = "SELECT `ID_RESPOSTA`, `RESPOSTA`, `TIPO`, `ID_PERGUNTA`";
		$queryResp .= " FROM `resposta` WHERE `ID_PERGUNTA`=".$aux['ID_PERGUNTA'];
		
		$sqlResp = mysqli_query($cx, $queryResp) or die(mysqli_error($cx)); //caso haja um erro na consulta
		
		
		while($auxResp = mysqli_fetch_assoc($sqlResp)) {
			//percorrendo os registros da consulta.									
			echo "<div class='alert alert-success'>";
			if ($auxResp['TIPO'] == 'F') {
				echo "<i class='fa fa-times-circle fa-1x'></i>  ";
			} else {	echo "<i class='fa fa-check-circle fa-1x'></i>  ";};
			echo $auxResp['RESPOSTA'];
			echo "</div>";
		}
		
	}
	*/
?>
