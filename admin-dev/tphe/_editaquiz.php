<?php

	// Tenta se conectar ao servidor MySQL
	//$cx = mysqli_connect("localhost", "root", "");
	$cx = mysqli_connect("192.168.4.3", "karlise", "270346");

	// Tenta se conectar a um banco de dados MySQL
	//$db = mysqli_select_db($cx, "tphe");
	$db = mysqli_select_db($cx, "karlise");

	//criando a query de consulta à tabela 
	$query = "SELECT `ID_QUIZ`, `ID_USUARIO`, `DESCRICAO`, ";
	$query .= " date_format(`DT_INICIO`, '%d-%m-%Y') AS 'DT_INICIO', ";
	$query .= " date_format(`DT_FIM`, '%d-%m-%Y') AS 'DT_FIM', `PUBLICACAO` ";
	$query .= " FROM `quiz` WHERE `ID_QUIZ` = ".$_POST['id-quiz']." LIMIT 1";
	
	$sql = mysqli_query($cx, $query) or die(mysqli_error($cx));
	
	while($aux = mysqli_fetch_assoc($sql)) {
		//percorrendo os registros da consulta.
		
?> 
															
<form role="form" action="../../forms/editar_quiz.php" method="POST">

   <div class="form-group">
		<label>Digite a NOVA descrição do Quiz:</label>
                <textarea class="form-control" rows="3" name="txtarquiz" id="txtarquiz"><?php echo $aux['DESCRICAO']; ?></textarea>                                
	</div>
	<div class="form-group">
		<label>Data de início: não pode ser alterada, nessa versão do TPhe</label>
                <input class="form-control" type="text" readonly=0 name="data_in" id="data_in" value="<?php echo $aux['DT_INICIO']; ?>"/>
				
	</div>
	
	<div class="form-group">
		<label>Data de fim: não pode ser alterada, nessa versão do TPhe</label>
                <input class="form-control" type="text" readonly=0 name="data_fi" id="data_fi" value="<?php echo $aux['DT_FIM']; ?>"/>
	</div>
	
	 <div class="form-group">
		<?php
			if ($aux['PUBLICACAO'] == 'S') {
		?>
				<div class="radio">
					<label>
						<input type="radio" name="optionsRadios" id="optionsRadios1" value="S" checked>Publicar
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="optionsRadios" id="optionsRadios2" value="N">Não publicar
					</label>
				</div>
		<?php
			} else {
		?>
				<div class="radio">
					<label>
						<input type="radio" name="optionsRadios" id="optionsRadios1" value="S">Publicar
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="optionsRadios" id="optionsRadios2" value="N" checked>Não publicar
					</label>
				</div>
		<?php 
			}
			echo "<input type='hidden' name='id-quiz' value=".$aux['ID_QUIZ'].">";
		?>
	</div>

	<button type="submit" class="btn btn-default">Gravar Dados</button>

</form>
<?php } ?>