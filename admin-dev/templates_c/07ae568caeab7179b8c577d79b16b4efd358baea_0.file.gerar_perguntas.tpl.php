<?php
/* Smarty version 3.1.33, created on 2019-09-13 01:06:28
  from 'C:\xampp\htdocs\tphe2019\admin-dev\themes\default\template\gerar_perguntas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d7acf74c9e3a8_26618019',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '07ae568caeab7179b8c577d79b16b4efd358baea' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tphe2019\\admin-dev\\themes\\default\\template\\gerar_perguntas.tpl',
      1 => 1568329587,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d7acf74c9e3a8_26618019 (Smarty_Internal_Template $_smarty_tpl) {
?><form role="form" action="..\functions\gerar_perguntas_banco.php" method="POST">
    <div class="form-group">
        <label>Selecione um Quiz</label>
          <select class='form-control' name='sel_quiz'>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['quizes']->value, 'quiz');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['quiz']->value) {
?>
              <option value='<?php echo $_smarty_tpl->tpl_vars['quiz']->value['ID_QUIZ'];?>
'><?php echo $_smarty_tpl->tpl_vars['quiz']->value['DESCRICAO'];?>
</option>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </select>

				<input type='hidden' name='opid_quiz' value='<?php echo $_smarty_tpl->tpl_vars['aux']->value['ID_QUIZ'];?>
'>
    </div>
    <div class="form-group">
        <label>Selecione Turma</label>
				<select class='form-control' name='sel_turma' >
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['turmas']->value, 'turma');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['turma']->value) {
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['turma']->value['ID_TURMA'];?>
"><?php echo $_smarty_tpl->tpl_vars['turma']->value['NOME'];?>
 - <?php echo $_smarty_tpl->tpl_vars['turma']->value['SIGLA'];?>
</option>
          <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</select>

				<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['aux']->value['ID_TURMA'];?>
">
    </div>
	<div class="form-group">
        <label>Selecione a categoria das perguntas</label>

				<select class='form-control' name='sel_categoria' >
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categorias']->value, 'categoria');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['categoria']->value) {
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['categoria']->value['ID_CATEGORIA'];?>
"><?php echo $_smarty_tpl->tpl_vars['categoria']->value['DESCRICAO'];?>
</option>
          <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	      </select>

				<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['turma']->value['ID_CATEGORIA'];?>
">
    </div>
    <button type="submit" class="btn btn-default">Gerar perguntas</button>
</form>
<?php }
}
