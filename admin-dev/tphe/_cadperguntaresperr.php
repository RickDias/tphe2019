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
                </div>								
					
				<form role="form" action="../../forms/gravarpergunta.php" method="POST">

					<div class="form-group">
						<label>Pergunta:</label>
						<?php echo $idpergunta = $_POST['idpergunta']; ?>			

						<?php							
							require_once '../../config/config.php';
							require_once '../../functions/functions.php';
							require_once '../../class/pergunta/perguntaDAO.php';
							require_once '../../class/pergunta/perguntaVO.php';

							$link = conecta_db();
							
							$perguntaVO = new perguntaVO();
							$perguntaDAO = new perguntaDAO();										
							
							$perguntaVO = $perguntaDAO->getPerguntas($link, $idpergunta);

							foreach ($perguntaVO as $dados){								
									echo $dados->getDescricao();
								}	
						?>
					</div>	
					<div class="form-group">
						<label>Disciplina:</label>
						<?php
								//consulta das descrições das disciplinas para popular o componente html SELECT
								
								require_once '../../class/disciplina/disciplinaDAO.php';
								require_once '../../class/disciplina/disciplinaVO.php';
																
								$disciplinaVO = new disciplinaVO();
								$disciplinaDAO = new disciplinaDAO( );
								
								foreach ($perguntaVO as $dados){								
									$iddisciplina = $dados->getId_disciplina();
									$idcategoria = $dados->getId_categoria();
								}
																
								$disciplinaVO = $disciplinaDAO->getDisciplina($link, $iddisciplina);
								foreach ($disciplinaVO as $dadosdisciplina){								
									echo $dadosdisciplina->getNome();
								}								
							?>
					</div>	
					<div class="form-group">
						<label>Categoria:</label>
						<?php
								//consulta das descrições das categorias para popular o componente html SELECT
								require_once '../../class/categoria/categoriaDAO.php';
								require_once '../../class/categoria/categoriaVO.php';
								
								$categoriaVO = new categoriaVO();
								$categoriaDAO = new categoriaDAO( );								
								
								$categoriaVO = $categoriaDAO->getCategorias($link, $idcategoria);
								foreach ($categoriaVO as $dadoscategoria){								
									echo $dadoscategoria->getDescricao();
								}								
							?>		
					</div>	
					<div class="form-group">
						<label>Resposta correta:</label>
						<?php echo $_POST['txtrespcerta']; ?>
					</div>
		
					<div class="form-group">
							<!-- passando as variaveis abaixo nas inputs hidden para a proxima pagina acessar os dados -->
							<input type="hidden" name="idpergunta" value="<?php echo $idpergunta; ?>">
							<input type="hidden" name="txtrespcerta" value="<?php echo $_POST['txtrespcerta']; ?>">	
						<label>Digite 3 opções de respostas erradas:</label></br>
					</div>	
					<div class="form-group">	
						<label>Opção 1:</label>
						<input class="form-control" name="txtresperr1">
						
						<label>Opção 2:</label>
						<input class="form-control" name="txtresperr2">
						
						<label>Opção 3:</label>
						<input class="form-control" name="txtresperr3">
						
					</div>
					
					<button type="submit" class="btn btn-default">Finalizar</button>
					<!--button type="reset" class="btn btn-default">Reset Button</button-->

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