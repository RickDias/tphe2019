<?php
/* Smarty version 3.1.33, created on 2019-08-15 02:47:25
  from 'C:\xampp\htdocs\tphe2019\admin-dev\themes\default\template\gerar_perguntas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d54ab9d43f256_23850456',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '07ae568caeab7179b8c577d79b16b4efd358baea' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tphe2019\\admin-dev\\themes\\default\\template\\gerar_perguntas.tpl',
      1 => 1565830033,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d54ab9d43f256_23850456 (Smarty_Internal_Template $_smarty_tpl) {
?><form role="form" action="..\functions\gerar_perguntas_banco.php" method="POST">
    <div class="form-group">
        <label>Selecione um Quiz</label>
          <select class='form-control' name='sel_quiz'>
            <option value='<?php echo $_smarty_tpl->tpl_vars['aux']->value['ID_QUIZ'];?>
'><?php echo $_smarty_tpl->tpl_vars['aux']->value['DESCRICAO'];?>
</option>
			    </select>

				<input type='hidden' name='opid_quiz' value='<?php echo $_smarty_tpl->tpl_vars['aux']->value['ID_QUIZ'];?>
'>
    </div>
    <div class="form-group">
        <label>Selecione Turma</label>

				<select class='form-control' name='sel_turma' >

					<option value="<?php echo $_smarty_tpl->tpl_vars['auxturma']->value['ID_TURMA'];?>
"><?php echo $_smarty_tpl->tpl_vars['auxturma']->value['NOME'];?>
 - <?php echo $_smarty_tpl->tpl_vars['auxturma']->value['SIGLA'];?>
</option>
			</select>

				<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['aux']->value['ID_TURMA'];?>
">
    </div>
	<div class="form-group">
        <label>Selecione a categoria das perguntas</label>

				<select class='form-control' name='sel_categoria' >
					<option value="<?php echo $_smarty_tpl->tpl_vars['auxcategoria']->value['ID_CATEGORIA'];?>
"><?php echo $_smarty_tpl->tpl_vars['auxcategoria']->value['DESCRICAO'];?>
</option>
	      </select>

				<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['auxcategoria']->value['ID_CATEGORIA'];?>
">
    </div>
    <button type="submit" class="btn btn-default">Gerar perguntas</button>
</form>
<?php }
}
