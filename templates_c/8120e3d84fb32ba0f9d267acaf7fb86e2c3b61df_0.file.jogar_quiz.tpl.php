<?php
/* Smarty version 3.1.33, created on 2019-09-10 17:22:04
  from 'C:\xampp\htdocs\tphe2019\theme\default\paginas\jogar_quiz.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d77bf9c612da9_04627706',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8120e3d84fb32ba0f9d267acaf7fb86e2c3b61df' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tphe2019\\theme\\default\\paginas\\jogar_quiz.tpl',
      1 => 1568128923,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d77bf9c612da9_04627706 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['resultados']->value, 'q', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['q']->value) {
?>
<div class="col-md-9">
<form id="regForm" action="index.php?pag=jogar_quiz&terminar=1">
  <div class="score_quiz col-md-8" id="score_quiz">
    <!-- Pontuação:<span id="score_val">0</span> -->
    <label for="score_val">Pontuação:</label><br>
    <input type="text" id="score_val" name="score_val" value="0" disabled class="col-sm-3">
  </div>
  <div class="codigo" id="timer_count">
    <!-- <span id="hora">00h</span><span id="minuto">00m</span> -->
    <span id="segundo">30</span><br>
    <!-- <input type="button" value="Volta" onclick="volta();"><br> -->
    <!-- <div id="parar"><input type="button" value="Parar" onclick="parar();"></div> -->
    <!-- <div id="comeca" style="display:none;"><input type="button" value="Comeca" onclick="tempo(1);"><br></div> -->
    <!-- <input type="button" value="Limpa" onclick="limpa();"><br><br> -->
    <div id="voltas"></div>
  </div>

  <h1 class="black">Quiz <?php echo $_smarty_tpl->tpl_vars['q']->value["ID_QUIZ"];?>
 - <?php echo $_smarty_tpl->tpl_vars['q']->value["DESCRICAO"];?>
</h1>

  <div class="tab">
          <p class="p_16_black">Neste quiz, serão mostradas 10 perguntas sobre <?php echo $_smarty_tpl->tpl_vars['q']->value["DESCRICAO"];?>
 definidas pelo professor!</p>
          <p class="p_16_black">Bons estudos!</p>
  </div>

  <div style="overflow:auto;display:none" id="iniciar" name="iniciar">
    <a href="index.php?pag=jogo&jogo=quiz" style="" class="">Voltar</a>
    <div style="float:right;">
      <!-- <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button> -->
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
<!-- One "tab" for each step in the form: -->
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['perguntas']->value, 'pergunta', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['pergunta']->value) {
?>
<div class="tab" id="tab_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['pergunta']->value[0]->getDescricao();?>

  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['respostas']->value, 'arr_resp');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['arr_resp']->value) {
?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['arr_resp']->value, 'resposta', false, 'key_r');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key_r']->value => $_smarty_tpl->tpl_vars['resposta']->value) {
?>
      <?php if ($_smarty_tpl->tpl_vars['pergunta']->value[0]->getId_pergunta() == $_smarty_tpl->tpl_vars['resposta']->value->getId_pergunta()) {?>
        <div id="div_resposta_<?php echo $_smarty_tpl->tpl_vars['key_r']->value;?>
" class="respostas_quiz" onclick="confere_resposta('<?php echo $_smarty_tpl->tpl_vars['resposta']->value->getTipo();?>
','<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['pergunta']->value[0]->getPontuacao();?>
'); this.onclick=null;">
          <p><?php echo $_smarty_tpl->tpl_vars['resposta']->value->getResposta();?>
</p>
          <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['resposta']->value->getTipo();?>
" id="tipo_resp_<?php echo $_smarty_tpl->tpl_vars['key_r']->value;?>
">
        </div>
        <?php }?>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<div style="overflow:auto;display:none" id="resp_certa" name="resp_certa">
  Acertou, continue assim!
  <div style="float:right;">
    <!-- <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button> -->
    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
  </div>
</div>

<div style="overflow:auto;display:none" id="resp_errada" name="resp_errada">
  Foi quase!
  <div style="float:right;">
    <!-- <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button> -->
    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
  </div>
</div>

<!-- Circles which indicates the steps of the form: -->
<div style="text-align:center;margin-top:40px;" id="all_steps" name="all_steps">
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['perguntas']->value, 'pag', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['pag']->value) {
?>
  <span class="step" id="num_step_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" name"num_step_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"></span>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>

</form>
</div>

<div class="col-md-3" id="container_sala__aluno">
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
        <span>id pont: <?php echo $_smarty_tpl->tpl_vars['aluno']->value["id_pontuacao"];?>
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


<?php echo '<script'; ?>
 src="theme/default/vendor/jquery/jquery.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="theme/default/js/jogar_quiz.js"><?php echo '</script'; ?>
>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
