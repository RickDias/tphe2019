<?php
/* Smarty version 3.1.33, created on 2019-05-22 15:49:49
  from 'C:\xampp\htdocs\tphe2019\menu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ce5537dbe5c09_80785409',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8c32fadc13e1612f80aae89dc42509a461e96931' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tphe2019\\menu.tpl',
      1 => 1558532960,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ce5537dbe5c09_80785409 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Navigation -->
<nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container" id="container_menu">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="index.php?pag=home">Projeto TPhE</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li>
                    <a class="page-scroll" href="index.php?pag=teste&get=gerson">testes</a>
                </li>
                <li>
                    <a class="page-scroll" href="#">Link 2</a>
                </li>
                <li>
                    <a class="page-scroll" href="#">Link 3</a>
                </li>
                <li>
                    <a class="page-scroll" href="index.php?pag=sobre">Sobre nós</a>
                </li>
                <?php if ($_smarty_tpl->tpl_vars['cessao']->value == false) {?>
                <li>
                    <a class="page-scroll" href="index.php?pag=login">Login</a>
                </li>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['cessao']->value == true) {?>
                <li>
                    <a class="page-scroll" href="index.php?pag=loggout">Sair</a>
                </li>
                <?php }?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<?php }
}
