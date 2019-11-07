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

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

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
			
			<!-- MENU LATERAL -->
            <?php include('_menu.php'); ?> 
            
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Turmas Cadastradas</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<?php
				//header("Content-type: text/html; charset=utf-8"); 

				// Tenta se conectar ao servidor MySQL
				//$cx = mysqli_connect("localhost", "root", "");
				$cx = mysqli_connect("192.168.4.3", "karlise", "270346");

				// Tenta se conectar a um banco de dados MySQL
				//$db = mysqli_select_db($cx, "tphe");
				$db = mysqli_select_db($cx, "karlise");

				//character_set_connection=utf8"); resolvido no my.ini do xampp - pesquisar utf

				//criando a query de consulta à tabela 
				$sql = mysqli_query($cx, "SELECT `turma`.`ID_TURMA`, `turma`.`ANO`, `turma`.`SEMESTRE`, `turma`.`NOME`, `turma`.`SIGLA`, 
											`turma`.`ID_USUARIO`, `disciplina`.`NOME` as 'disciplina'
											FROM `turma` , `disciplina`
											WHERE `turma`.`ID_DISCIPLINA` = `disciplina`.`ID_DISCIPLINA`
											and `ID_USUARIO` = ".$_SESSION['UsuarioID']) or die(mysqli_error($cx) //caso haja um erro na consulta
				);
				
			?>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Turmas cadastradas
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ANO</th>
                                        <th>SEMESTRE</th>
                                        <th>NOME</th>
                                        <th>SIGLA</th>
										<th>DISCIPLINA</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
										while($aux = mysqli_fetch_assoc($sql)) {
										//pecorrendo os registros da consulta.
											echo '<tr>'; // abre uma linha
											echo '<td>'.$aux['ID_TURMA'].'</td>'; 
											echo '<td>'.$aux['ANO'].'</td>';
											echo '<td>'.$aux['SEMESTRE'].'</td>';	
											echo '<td>'.$aux['NOME'].'</td>'; 
											echo '<td>'.$aux['SIGLA'].'</td>';
											echo '<td>'.$aux['disciplina'].'</td>';	
											echo '</tr>'; // fecha linha
										/*loop deve terminar aqui*/	
										}
                                    ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
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

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
