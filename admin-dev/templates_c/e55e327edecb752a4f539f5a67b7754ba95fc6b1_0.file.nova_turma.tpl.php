<?php
/* Smarty version 3.1.33, created on 2019-08-15 03:01:40
  from 'C:\xampp\htdocs\tphe2019\admin-dev\themes\default\template\nova_turma.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d54aef482aef4_41823161',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e55e327edecb752a4f539f5a67b7754ba95fc6b1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tphe2019\\admin-dev\\themes\\default\\template\\nova_turma.tpl',
      1 => 1565830886,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d54aef482aef4_41823161 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cadastrar uma nova turma!</h1>
                </div>
                <!-- /.col-lg-12 -->

								<?php echo '<?php ';?>//include('..\..\forms\cadturma.php'); <?php echo '?>';?>
								<form role="form" action="..\functions\gravar_turma.php" method="POST">

								   <div class="form-group">
										<label>Digite o nome da turma:</label>
												<input class="form-control" type="text" name="nome_turma" id="nome_turma">
									</div>

									<div class="form-group">
										<label>Digite a Sigla da turma:</label>
												<input class="form-control" type="text" name="sigla_turma" id="sigla_turma">
									</div>

									<div class="form-group">
										<label>Digite o Ano da turma:</label>
												<input class="form-control" type="number" name="ano_turma" id="ano_turma">
									</div>

									<div class="form-group">
										<label>Digite o Semestre da turma:</label>
												<input class="form-control" type="number" name="semestre_turma" id="semestre_turma">
									</div>
										<div class="form-group">
											<label>Selecione Disciplina</label>
													<select class="form-control" name="disciplina" id="disciplina">
												<option value='1'><?php echo $_smarty_tpl->tpl_vars['aux']->value['disciplina'];?>
</option>
											</select>
										</div>
										<button type="submit" class="btn btn-default">Gravar Dados</button>

								</form>

            </div>
            <!-- /.row -->
<?php }
}
