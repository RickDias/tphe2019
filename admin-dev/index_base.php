<?php
session_start();
if($_SESSION["UsuarioID"] == NULL){
    unset($_SESSION);
    session_destroy();
    header("Location: index.php"); exit;
}
require '../vendor/autoload.php';
$theme = Configuration::get('theme_admin');

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="ISO-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'> -->
    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="themes/default/css/user_info.css" rel="stylesheet">
    <link href="themes/default/css/overrides.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script src="vendor/jquery/jquery.min.js" type="text/javascript"></script>


</head>

<body>

  <div class="container-fluid">
  	<div class="row">
  		<div class="col-md-12">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;">
          <?php
          include 'menu_top.php';
          ?>
        </nav>
  		</div>
  	</div>
  	<div class="row">
  		<div class="col-md-12">
  			<div class="row">
  				<div class="col-md-2">
            <?php
            include 'menu_sidebar.php';
            ?>
  				</div>
  				<div class="col-md-10">
            <?php
            if (Tools::getValue('pag')){
              $tpl = Tools::getValue('pag');
              require "themes/default/".$tpl.".php"; // onde 'pagina' é a variavel passada pela URL (GET)
            }else{
              require 'themes/default/index.php'; //primeiro acesso, padrao 'home.php'
            }
            ?>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>

<!-- jQuery -->
<!-- <script src="vendor/jquery/jquery.min.js"></script> -->
<!-- <script src="js/jquery-1.11.1.min.js"></script> -->
<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="vendor/metisMenu/metisMenu.min.js"></script>
<!-- Morris Charts JavaScript -->
<script src="vendor/raphael/raphael.min.js"></script>
<script src="vendor/morrisjs/morris.min.js"></script>
<script src="data/morris-data.js"></script>
<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>

</body>
</html>
