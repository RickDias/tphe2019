<?php

	session_start();
    	
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Página do Professor</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php include('_menutop.php'); ?>
            <!-- /.navbar-top-links -->

			<?php include('_menu.php'); ?> 
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cadastrar uma nova turma!</h1>
                </div>
                <!-- /.col-lg-12 -->
								
								<?php //include('..\..\forms\cadturma.php'); ?> 
								<form role="form" action="../../forms/gravar_turma.php" method="POST">

								   <div class="form-group">
										<label>Digite o nome da turma:</label>
												<input class="form-control" type="text" name="nome_turma" id="nome_turma">
									</div>

									<div class="form-group">
										<label>Digite a Sigla da turma:</label>
												<input class="form-control" type="text" name="sigla_turma" id="sigla_turma">
									</div>
									
									<div class="form-group">
										<label>Digite o Ano da turma:</label>
												<input class="form-control" type="number" name="ano_turma" id="ano_turma">
									</div>
									
									<div class="form-group">
										<label>Digite o Semestre da turma:</label>
												<input class="form-control" type="number" name="semestre_turma" id="semestre_turma">
									</div>
									
									<?php 
										// Tenta se conectar ao servidor MySQL
										//$cx = mysqli_connect("localhost", "root", "");
										$cx = mysqli_connect("192.168.4.3", "karlise", "270346");

										// Tenta se conectar a um banco de dados MySQL
										//$db = mysqli_select_db($cx, "tphe");
										$db = mysqli_select_db($cx, "karlise");

										//character_set_connection=utf8"); resolvido no my.ini do xampp - pesquisar utf

										//criando a query de consulta à tabela 
										$sql = mysqli_query($cx, "SELECT `disciplina`.`ID_DISCIPLINA`, `disciplina`.`NOME` as 'disciplina' FROM `disciplina`");
				
										?>
										<div class="form-group">
											<label>Selecione Disciplina</label>
													<select class="form-control" name="disciplina" id="disciplina">
												
										<?php
											while($aux = mysqli_fetch_assoc($sql)) {
											//pecorrendo os registros da consulta.
												echo "<option value='1'>".$aux['disciplina']."</option>";																		
											/*loop deve terminar aqui*/	
											}
										?>
																							
												
											</select>
										</div>
										<button type="submit" class="btn btn-default">Gravar Dados</button>

								</form>

            </div>
            <!-- /.row -->
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
