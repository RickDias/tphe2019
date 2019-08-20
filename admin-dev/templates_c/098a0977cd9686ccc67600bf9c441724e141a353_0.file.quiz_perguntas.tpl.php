<?php
/* Smarty version 3.1.33, created on 2019-08-20 02:21:59
  from 'C:\xampp\htdocs\tphe2019\admin-dev\themes\default\template\quiz_perguntas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d5b3d27054d64_66864672',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '098a0977cd9686ccc67600bf9c441724e141a353' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tphe2019\\admin-dev\\themes\\default\\template\\quiz_perguntas.tpl',
      1 => 1566260517,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d5b3d27054d64_66864672 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-green">
      <!-- VER PERGUNTAS -->
			<div class="panel-heading">
				ID_QUIZ: #<?php echo Tools::getValue('id-quiz');?>
 - TURMA: #<?php echo Tools::getValue('id-turma');?>

			</div>
			<!-- .panel-heading -->
			<div class="panel-body">
				<div class="panel-group" id="accordion">
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['resultados']->value, 'aux');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['aux']->value) {
?>
								<!-- <div class='panel panel-red'> -->
								<!-- <div class='panel panel-default'> -->

							<div class="panel-heading">
								<h4 class="panel-title">
											<a data-toggle='collapse' data-parent='#accordion' href='#collapse<?php echo $_smarty_tpl->tpl_vars['aux']->value['ID_PERGUNTA'];?>
'>
											ID_PERGUNTA: #<?php echo $_smarty_tpl->tpl_vars['aux']->value['ID_PERGUNTA'];?>

									</a>
								</h4>
							</div>
							<div id="collapse<?php echo $_smarty_tpl->tpl_vars['aux']->value['ID_PERGUNTA'];?>
" class="panel-collapse collapse in">
								<div class="panel-body">
									<blockquote>
										<?php echo $_smarty_tpl->tpl_vars['aux']->value['TEXTO'];?>



                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['respostas']->value, 'auxResp');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['auxResp']->value) {
?>

											<?php if ($_smarty_tpl->tpl_vars['auxResp']->value['TIPO'] == 'F') {?>
                      <div class='alert alert-danger'>
												<i class='fa fa-times-circle fa-1x'></i>
											<?php } else { ?>
                      <div class='alert alert-success'>
                        <i class='fa fa-check-circle fa-1x'></i>
                      <?php }?>
											<?php echo $_smarty_tpl->tpl_vars['auxResp']->value['RESPOSTA'];?>

											</div>

										 <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
									</blockquote>
									<small>
											Categoria: <?php echo $_smarty_tpl->tpl_vars['aux']->value['DESCRICAO'];?>

									</small>
								</div>
							</div>
						<!-- </div> -->
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</div>
			</div>
			<!-- .panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<?php }
}
