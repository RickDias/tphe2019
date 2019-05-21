<?php /* Smarty version Smarty-3.1.19-dev, created on 2019-05-21 04:00:02
         compiled from "index_base.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8289487555ce35641cb43d7-98075626%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a8ae32368fab38771f1d40f407bb0917a39f78a' => 
    array (
      0 => 'index_base.tpl',
      1 => 1558404002,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8289487555ce35641cb43d7-98075626',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_5ce35641d07a64_84321733',
  'variables' => 
  array (
    'menu_top' => 0,
    'menu_sidebar' => 0,
    'template' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ce35641d07a64_84321733')) {function content_5ce35641d07a64_84321733($_smarty_tpl) {?><!DOCTYPE html>
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
            <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['menu_top']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </nav>
  		</div>
  	</div>
  	<div class="row">
  		<div class="col-md-12">
  			<div class="row">
  				<div class="col-md-2">
            <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['menu_sidebar']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  				</div>
  				<div class="col-md-10">
            <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
