<?php /* Smarty version Smarty-3.1.19-dev, created on 2019-05-21 03:36:18
         compiled from "themes\index_base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10950222675ce35612a6fe27-28024228%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45e81a87f4fc92f17409f4b5eb296c82e6874e01' => 
    array (
      0 => 'themes\\index_base.tpl',
      1 => 1558402445,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10950222675ce35612a6fe27-28024228',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menu_top' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_5ce35612b82734_52709224',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ce35612b82734_52709224')) {function content_5ce35612b82734_52709224($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="themes/<<?php ?>?php echo $theme ?<?php ?>>/css/user_info.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>

<body>

  <div class="container-fluid">
  	<div class="row">
  		<div class="col-md-12">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;">
          <!-- <<?php ?>?php
          include 'menu_top.php';
          ?<?php ?>> -->
          <?php echo $_smarty_tpl->tpl_vars['menu_top']->value;?>

          
        </nav>
  		</div>
  	</div>
  	<div class="row">
  		<div class="col-md-12">
  			<div class="row">
  				<div class="col-md-2">
            <<?php ?>?php
            include 'menu_sidebar.php';
            ?<?php ?>>
  				</div>
  				<div class="col-md-10">
            <<?php ?>?php
            if (Tools::getValue('pag')){
              $tpl = Tools::getValue('pag');
              require "themes/".$theme."/".$tpl.".php"; // onde 'pagina' é a variavel passada pela URL (GET)
            }else{
              require 'themes/'.$theme.'/index.php'; //primeiro acesso, padrao 'home.php'
            }
            ?<?php ?>>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>

<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>
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
<?php }} ?>
