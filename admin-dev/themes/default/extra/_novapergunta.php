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
                    <h1 class="page-header">Cadastrar uma nova Pergunta!</h1>
					<p> Digite o texto da pergunta que deseja cadastrar, informe a disciplina a que pertence e sua respectiva categoria. Clique em Avançar.
					Na próxima tela, informe a opção que representa a resposta certa, clique em Avançar. Em seguida, informe as 3 opções que representarão
					as opções de resposta erradas. Ao iniciar o cadastro, vá até o fim.
					</p>
                </div>								
					
				<form role="form" action="_cadperguntarespcerta.php" method="POST">

					<div class="form-group">
						<label>Digite o texto da pergunta:</label>
						<textarea class="form-control" rows="3" name="txtarpergunta"></textarea>
					</div>

					<div class="form-group">
						<label>Selecione a Disciplina</label>
						<select class="form-control" name="seldisciplina">
							<?php
								//consulta das descrições das disciplinas para popular o componente html SELECT
								require_once '../../config/config.php';
								require_once '../../functions/functions.php';
								require_once '../../class/disciplina/disciplinaDAO.php';
								require_once '../../class/disciplina/disciplinaVO.php';
								
								$link = conecta_db();				
								
								$disciplinaVO = new disciplinaVO();
								$disciplinaDAO = new disciplinaDAO( );
								
								$disciplinaVO = $disciplinaDAO->getAll($link);
								foreach ($disciplinaVO as $dados){								
									echo '<option value='.$dados->getId_disciplina().'>'.$dados->getNome().'</option>';
								}								
							?>		
						</select>
					</div>
	
					<div class="form-group">
						<label>Selecione a Categoria</label>
						<select class="form-control" name="categoria">
							<?php
								require_once '../../class/categoria/categoriaDAO.php';
								require_once '../../class/categoria/categoriaVO.php';
								
								$categoriaVO = new categoriaVO();
								$categoriaDAO = new categoriaDAO( );
								
								$categoriaVO = $categoriaDAO->getAll($link);
								foreach ($categoriaVO as $dados){								
									echo '<option value='.$dados->getId_categoria().'>'.$dados->getDescricao().'</option>';
								}
								desconecta_db($link);
							?>
						</select>
					</div>

					<button type="submit" class="btn btn-default">Avançar >></button>

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
