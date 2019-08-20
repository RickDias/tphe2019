<?php
/* Smarty version 3.1.33, created on 2019-08-16 02:25:20
  from 'C:\xampp\htdocs\tphe2019\admin-dev\themes\default\template\nova_pergunta.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d55f7f0b79ef4_26685735',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2f1194732041a4cf1d8baeae9a497b4d78de6d8d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tphe2019\\admin-dev\\themes\\default\\template\\nova_pergunta.tpl',
      1 => 1565914720,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d55f7f0b79ef4_26685735 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Cadastrar uma nova Pergunta!</h1>
    <p> Digite o texto da pergunta que deseja cadastrar, informe a disciplina a que pertence e sua respectiva categoria. Clique em Avançar.
      Na próxima tela, informe a opção que representa a resposta certa, clique em Avançar. Em seguida, informe as 3 opções que representarão
      as opções de resposta erradas. Ao iniciar o cadastro, vá até o fim.
    </p>
  </div>

  <form role="form" action="index_base.php?pag=define_resp_certa" method="POST">
    <div class="form-group">
      <label>Digite o texto da pergunta:</label>
      <textarea class="form-control" rows="3" name="txtarpergunta"></textarea>
    </div>
    <div class="form-group">
      <label>Selecione a Disciplina</label>
      <select class="form-control" name="seldisciplina">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['disciplina']->value, 'dados');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['dados']->value) {
?>
        <option value='<?php echo $_smarty_tpl->tpl_vars['dados']->value->getId_disciplina();?>
'><?php echo $_smarty_tpl->tpl_vars['dados']->value->getNome();?>
</option>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </select>
    </div>
    <div class="form-group">
      <label>Selecione a Categoria</label>
      <select class="form-control" name="categoria">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categoria']->value, 'dados');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['dados']->value) {
?>
          <option value='<?php echo $_smarty_tpl->tpl_vars['dados']->value->getId_categoria();?>
'>'<?php echo $_smarty_tpl->tpl_vars['dados']->value->getDescricao();?>
'</option>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </select>
    </div>
    <button type="submit" class="btn btn-default">Avançar >></button>
  </form>
</div>
<?php }
}
