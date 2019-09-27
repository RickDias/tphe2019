<?php
/* Smarty version 3.1.33, created on 2019-09-28 00:26:28
  from 'C:\xampp\htdocs\tphe2019\admin-dev\themes\default\template\jogar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d8e8c943d3c88_60194845',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3763d79154f0d903aa999b1c7a6658c82e8211df' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tphe2019\\admin-dev\\themes\\default\\template\\jogar.tpl',
      1 => 1569623168,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d8e8c943d3c88_60194845 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['quiz_arr']->value) {?>
<div align='center' class="col-md-12">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['quiz_arr']->value, 'quiz');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['quiz']->value) {
?>
<h1>Quiz <?php echo $_smarty_tpl->tpl_vars['quiz']->value["ID_QUIZ"];?>
 - <?php echo $_smarty_tpl->tpl_vars['quiz']->value["DESCRICAO"];?>
</h1>
Turma : <?php echo $_smarty_tpl->tpl_vars['turma_arr']->value["nome"];?>

<div class="container_perguntas_admin">
  <?php if ($_smarty_tpl->tpl_vars['perguntas']->value) {?>
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
    <div class="col-md-12" id="iniciar_sala">
      <!-- <a href="index_base.php?pag=quiz_admin&iniciar_quiz=1&id_quiz=<?php echo $_smarty_tpl->tpl_vars['id_quiz']->value;?>
&id_turma=<?php echo $_smarty_tpl->tpl_vars['id_turma']->value;?>
" class=""> -->
        <a href="index_base.php?pag=sala&abrir_sala=1&id_quiz=<?php echo $_smarty_tpl->tpl_vars['id_quiz']->value;?>
&id_turma=<?php echo $_smarty_tpl->tpl_vars['id_turma']->value;?>
" class="">

        Iniciar Sala
      </a>
    </div>
  <?php } else { ?>
  Ainda não há perguntas para este quiz!
  <div class="col-md-12" id="iniciar_sala">
    <a href="index_base.php">Voltar</a>
  </div>
  <?php }?>
</div>

<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>
<?php }
}
}
