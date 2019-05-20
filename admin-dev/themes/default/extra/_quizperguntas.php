<?php 

	// Tenta se conectar ao servidor MySQL
	$cx = mysqli_connect("localhost", "root", "");
	//$cx = mysqli_connect("192.168.4.3", "karlise", "270346");

	// Tenta se conectar a um banco de dados MySQL
	$db = mysqli_select_db($cx, "tphe");
	//$db = mysqli_select_db($cx, "karlise");

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
	
?>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-green">
			<div class="panel-heading">
				<?php echo "ID_QUIZ: #".$_POST['id-quiz']." - TURMA: #".$_POST['id-turma']; ?>
			</div>
			<!-- .panel-heading -->
			<div class="panel-body">
				<div class="panel-group" id="accordion">
					<?php
						$cor=0;
						while($aux = mysqli_fetch_assoc($sql)) {
							//percorrendo os registros da consulta.									
							$cor++;
							
							if($cor % 2 == 0){
								echo "<div class='panel panel-red'>";
							} else {
								echo "<div class='panel panel-default'>";
							}
					?>	
						
							<div class="panel-heading">
								<h4 class="panel-title">
									
										<?php 
											echo "<a data-toggle='collapse' data-parent='#accordion' href='#collapse".$aux['ID_PERGUNTA']."'>";
											echo "ID_PERGUNTA: #".$aux['ID_PERGUNTA']; 
										?>
									</a>
								</h4>
							</div>
							<div id="collapse<?php echo $aux['ID_PERGUNTA']; ?>" class="panel-collapse collapse in">
								<div class="panel-body">
									<blockquote>
										<?php echo $aux['TEXTO'];
																				
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
										
										 ?>
									</blockquote>
									<small>
											<?php echo "Categoria: ".$aux['DESCRICAO'];?>
									</small>
								</div>
							</div>
						</div>
					<?php
						}
					?>
				</div>
			</div>
			<!-- .panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->