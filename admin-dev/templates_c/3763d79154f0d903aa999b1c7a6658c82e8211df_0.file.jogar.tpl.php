<?php
/* Smarty version 3.1.33, created on 2019-09-03 01:40:09
  from 'C:\xampp\htdocs\tphe2019\admin-dev\themes\default\template\jogar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d6da859e716c1_96657642',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3763d79154f0d903aa999b1c7a6658c82e8211df' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tphe2019\\admin-dev\\themes\\default\\template\\jogar.tpl',
      1 => 1567467260,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d6da859e716c1_96657642 (Smarty_Internal_Template $_smarty_tpl) {
?><div align='center' class="col-md-12">

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['resultados']->value, 'quiz');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['quiz']->value) {
?>
<h1>Quiz <?php echo $_smarty_tpl->tpl_vars['quiz']->value["ID_QUIZ"];?>
 - <?php echo $_smarty_tpl->tpl_vars['quiz']->value["DESCRICAO"];?>
</h1>
<div class="container_perguntas_admin">
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['perguntas']->value, 'pergunta', false, 'key_perg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key_perg']->value => $_smarty_tpl->tpl_vars['pergunta']->value) {
?>
  <div class="perguntas_admin col-md-5">
  <?php echo $_smarty_tpl->tpl_vars['pergunta']->value["DESCRICAO"];?>
 - <?php echo $_smarty_tpl->tpl_vars['pergunta']->value["PONTUACAO"];?>
 pontos
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['respostas']->value, 'resposta');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['resposta']->value) {
?>
  <?php if ($_smarty_tpl->tpl_vars['pergunta']->value["ID_PERGUNTA"] == $_smarty_tpl->tpl_vars['resposta']->value["ID_PERGUNTA"]) {?>
  <div class="respostas_admin" id="<?php echo $_smarty_tpl->tpl_vars['resposta']->value["TIPO"];?>
">
    <?php echo $_smarty_tpl->tpl_vars['resposta']->value["RESPOSTA"];?>

  </div>
  <?php }?>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </div>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>

<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
<div class="col-md-12" id="iniciar_sala">
  <form action="index_base.php?pag=sala" method="POST">
    <input type="hidden" id="id_quiz" name="id_quiz" value="<?php echo $_smarty_tpl->tpl_vars['quiz']->value["ID_QUIZ"];?>
">
    <input type="hidden" id="abrir_sala" name="abrir_sala" value="<?php echo $_smarty_tpl->tpl_vars['quiz']->value["ID_QUIZ"];?>
">
    <i class="icon-chevron-sign-right" style="font-size:30px"></i>
    <button class="">
      Iniciar Sala
    </button>
</form>
</div>
</div>
<?php }
}
