<?php
/* Smarty version 3.1.33, created on 2019-08-20 01:17:02
  from 'C:\xampp\htdocs\tphe2019\admin-dev\themes\default\template\define_resp_certa.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d5b2dee26d2a0_31726034',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a4fd810e569fd3ae2f62d080f8de30b60a8cc5ba' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tphe2019\\admin-dev\\themes\\default\\template\\define_resp_certa.tpl',
      1 => 1566256616,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d5b2dee26d2a0_31726034 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header">Cadastrar uma nova Pergunta!</h1>
              </div>

      <form role="form" action="index_base.php?pag=define_resp_errada" method="POST">

        <div class="form-group">
          <label>Pergunta:</label>
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pergunta']->value, 'dados');
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

              <input type="hidden" id="categoria" name="categoria" value="<?php echo $_smarty_tpl->tpl_vars['dados']->value->getId_categoria();?>
">
          <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>

        <div class="form-group">
          <label>Digite a resposta correta:</label>
              <!-- passando as variaveis abaixo nas inputs hidden para a proxima pagina acessar os dados -->
              <input type="hidden" name="idpergunta" value="<?php echo $_smarty_tpl->tpl_vars['id_pergunta']->value;?>
">
          <input class="form-control" name="txtrespcerta">
        </div>

        <button type="submit" class="btn btn-default">Avançar >></button>

      </form>

          </div>
<?php }
}
