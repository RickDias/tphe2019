<?php
/* Smarty version 3.1.33, created on 2019-08-16 00:40:04
  from 'C:\xampp\htdocs\tphe2019\admin-dev\themes\default\template\nova_melhoria.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d55df448ab0c3_04892166',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd9bf4e6722f101f4f9f0497ebf87c421cc1f6e16' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tphe2019\\admin-dev\\themes\\default\\template\\nova_melhoria.tpl',
      1 => 1565908803,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d55df448ab0c3_04892166 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cadastrar uma sugestão de melhoria para o TPhE!</h1>
                </div>
                <!-- /.col-lg-12 -->

				<form role="form" action="..\functions\gravar_melhoria.php" method="POST">

					<div class="form-group">
					<label>Digite a descrição da sugestão:</label>
					<textarea class="form-control" rows="3" name="txtarquiz" id="txtarquiz"></textarea>
					</div>

					<div class="form-group">
					<label>E-mail de contato:</label>
					<input class="form-control" readonly=0 type="text" name="email" id="email" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
"/>
					</div>

					<input type="hidden" value="<?php echo '<?php ';?>echo $_SESSION['UsuarioID']; <?php echo '?>';?>">

					<button type="submit" class="btn btn-default">Gravar Dados</button>

				</form>

            </div>
<?php }
}
