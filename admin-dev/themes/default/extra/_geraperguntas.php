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
                    <h1 class="page-header">Randomizar perguntas para um Quiz!</h1>
                </div>
                <!-- TELA MASTER QUE INCLUI O FORMULÁRIO DE SELEÇÃO DE QUIZ E TURMA PARA GERAR PERGUNTAS -->								
				<?php //include('..\..\forms\gerarperguntas.php'); ?> 
				
				<form role="form" action="..\..\forms\gerar_perguntas_banco.php" method="POST">
					<div class="form-group">
						<label>Selecione um Quiz</label>
							<?php
								// Tenta se conectar ao servidor MySQL
								//$cx = mysqli_connect("localhost", "root", "");
								$cx = mysqli_connect("192.168.4.3", "karlise", "270346");

								// Tenta se conectar a um banco de dados MySQL
								//$db = mysqli_select_db($cx, "tphe");
								$db = mysqli_select_db($cx, "karlise");

								//criando a query de consulta à tabela 
								$query = "SELECT * FROM `quiz` WHERE `ID_USUARIO` = ".$_SESSION['UsuarioID']." ORDER BY `DESCRICAO`";
								
								$sql = mysqli_query($cx, $query) or die(mysqli_error($cx)); //caso haja um erro na consulta
								
								echo "<select class='form-control' name='sel_quiz'>";
								
								while($aux = mysqli_fetch_assoc($sql)) {
									//percorrendo os registros da consulta.									
									echo '<option value='.$aux['ID_QUIZ'].'>'.$aux['DESCRICAO'].'</option>';
								}
							
								echo "</select>";
						
								//echo "<input type='hidden' name='opid_quiz' value='".$aux['ID_QUIZ']."'>";
								
							?>
					</div>
					<div class="form-group">
						<label>Selecione Turma</label>
					   
							<?php
								//criando a query de consulta à tabela 
								$turmaqr = "SELECT `ID_TURMA`, `ANO`, `SEMESTRE`, `NOME`, `SIGLA`, `ID_USUARIO`, `ID_DISCIPLINA`  FROM `turma` WHERE `ID_USUARIO` = ".$_SESSION['UsuarioID']." ORDER BY `NOME`";
								
								$sql = mysqli_query($cx, $turmaqr) or die(mysqli_error($cx)); //caso haja um erro na consulta
								
								echo "<select class='form-control' name='sel_turma' >";
								
								while($auxturma = mysqli_fetch_assoc($sql)) {
									//percorrendo os registros da consulta.									
									echo '<option value='.$auxturma['ID_TURMA'].'>'.$auxturma['NOME'].' - '.$auxturma['SIGLA'].'</option>';
								}
								echo "</select>";
						
								//echo'<input type="hidden" value='.$aux['ID_TURMA'].'>';
							?>
					</div>		
					<div class="form-group">
						<label>Selecione a categoria das perguntas</label>
					   
							<?php
								//criando a query de consulta à tabela 
								
								//$turmaqr = "SELECT * FROM `categoria` WHERE `ID_USUARIO` = ".$_SESSION['UsuarioID'];
								//IMPLEMENTAÇÃO FUTURA DA CATEGORIA CADASTRADA PELO PROFESSOR, PARA AS SUAS PERGUNTAS
								
								$categoriaqr = "SELECT `ID_CATEGORIA`, `DESCRICAO`, `MENU_PAI` FROM `categoria` ORDER BY 3,2 ";				
								
								$sql = mysqli_query($cx, $categoriaqr) or die(mysqli_error($cx)); //caso haja um erro na consulta
								
								echo "<select class='form-control' name='sel_categoria' >";
								
								while($auxcategoria = mysqli_fetch_assoc($sql)) {
									//percorrendo os registros da consulta.									
									echo '<option value='.$auxcategoria['ID_CATEGORIA'].'>'.$auxcategoria['DESCRICAO'].'</option>';
								}
								echo "</select>";
						
								// echo'<input type="hidden" value='.$auxcategoria['ID_CATEGORIA'].'>';
							?>
					</div>				
					<button type="submit" class="btn btn-default">Gerar perguntas</button>
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
