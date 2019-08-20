<?php
/* Smarty version 3.1.33, created on 2019-08-20 01:26:50
  from 'C:\xampp\htdocs\tphe2019\admin-dev\themes\default\template\define_resp_errada.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d5b303a5a8e57_82243577',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '55ccaa626814e3f339e3de71dea6c8d8bbb44bac' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tphe2019\\admin-dev\\themes\\default\\template\\define_resp_errada.tpl',
      1 => 1566257206,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d5b303a5a8e57_82243577 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Cadastrar uma nova Pergunta!</h1>
  </div>

  <form role="form" action="..\functions\gravar_pergunta.php" method="POST">

    <div class="form-group">
      <label>Pergunta:</label>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categoria']->value, 'dados');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['dados']->value) {
?>
      <?php echo $_smarty_tpl->tpl_vars['dados']->value->getDescricao();?>

      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
    <div class="form-group">
      <label>Disciplina:</label>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['disciplina']->value, 'dados');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['dados']->value) {
?>
      <?php echo $_smarty_tpl->tpl_vars['dados']->value->getNome();?>

      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
    <div class="form-group">
      <label>Categoria:</label>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categoria']->value, 'dados');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['dados']->value) {
?>
      <?php echo $_smarty_tpl->tpl_vars['dados']->value->getDescricao();?>

      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
    <div class="form-group">
      <label>Resposta correta:</label>
      <?php echo $_smarty_tpl->tpl_vars['resp_certa']->value;?>

    </div>

    <div class="form-group">
      <!-- passando as variaveis abaixo nas inputs hidden para a proxima pagina acessar os dados -->
      <input type="hidden" name="idpergunta" value="<?php echo $_smarty_tpl->tpl_vars['id_pergunta']->value;?>
">
      <input type="hidden" name="txtrespcerta" value="<?php echo $_smarty_tpl->tpl_vars['resp_certa']->value;?>
">
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
<?php }
}
