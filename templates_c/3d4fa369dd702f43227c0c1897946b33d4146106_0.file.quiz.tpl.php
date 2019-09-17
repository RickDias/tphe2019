<?php
/* Smarty version 3.1.33, created on 2019-09-17 01:08:00
  from 'C:\xampp\htdocs\tphe2019\theme\default\paginas\quiz.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d8015d0747439_02899279',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d4fa369dd702f43227c0c1897946b33d4146106' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tphe2019\\theme\\default\\paginas\\quiz.tpl',
      1 => 1568675279,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d8015d0747439_02899279 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="col-md-10">

<div style="">
  <h1>jogos disponíveis para sua turma</h1>
</div>
<div class="col-md-8">
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['resultados']->value, 'quiz');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['quiz']->value) {
?>
  <div class="col-lg-4">
    <div class="panel panel-success">
      <div class="panel-heading">
        <?php echo $_smarty_tpl->tpl_vars['quiz']->value["DESCRICAO"];?>

      </div>
      <div class="panel-body">
        <p>
          Data de Início: <?php echo $_smarty_tpl->tpl_vars['quiz']->value["DT_INICIO"];?>
<br/>
          Data de Fim: <?php echo $_smarty_tpl->tpl_vars['quiz']->value["DT_FIM"];?>
<br/>
          Turma: <?php echo $_smarty_tpl->tpl_vars['quiz']->value["SIGLA"];?>
<br/>
        </p>
      </div>
      <div class="panel-footer">
        <form action="index.php?pag=jogar_quiz" method="POST">
          <input type='hidden' name='id-turma' value="<?php echo $_smarty_tpl->tpl_vars['quiz']->value["ID_TURMA"];?>
">
          <input type='hidden' name='id-quiz' value="<?php echo $_smarty_tpl->tpl_vars['quiz']->value["ID_QUIZ"];?>
">
          <button type="submit" name="enviar" value="jogar" class="btn btn-outline btn-success"><i class="fa fa-play fa-1x"></i> JOGAR</button>
        </form>
      </div>
    </div>
  </div>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>

<div class="col-md-3" id="container_sala__aluno" style="float:right">
  Jogadores na sala
  <div class="item_sala_aluno">
    <?php if ($_smarty_tpl->tpl_vars['alunos']->value) {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['alunos']->value, 'aluno');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['aluno']->value) {
?>
    <div class="col-md-12" id="bloco_aluno">

      <div class="col-md-3">
        <div class="icon_aluno">
          S
        </div>
      </div>

      <div class="col-md-9">
        <h3><?php echo $_smarty_tpl->tpl_vars['aluno']->value["NOME"];?>
</h3>
        <span>Pontuação: <?php echo $_smarty_tpl->tpl_vars['aluno']->value["pontos_geral"];?>
</span>
      </div>

    </div>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php } else { ?>
      Sem alunos na sala!
    <?php }?>
  </div>
</div>

</div>
<?php }
}
