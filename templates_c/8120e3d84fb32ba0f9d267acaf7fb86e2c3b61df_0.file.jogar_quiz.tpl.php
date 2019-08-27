<?php
/* Smarty version 3.1.33, created on 2019-08-28 00:42:11
  from 'C:\xampp\htdocs\tphe2019\theme\default\paginas\jogar_quiz.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d65b1c309b921_56722502',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8120e3d84fb32ba0f9d267acaf7fb86e2c3b61df' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tphe2019\\theme\\default\\paginas\\jogar_quiz.tpl',
      1 => 1566945729,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d65b1c309b921_56722502 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['resultados']->value, 'quiz');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['quiz']->value) {
?>
    <div id="container_stage_1" style=";width:100%;height:100%;">
      <div id="failbg" class="failbg" style="position: absolute; visibility: hidden; left: 0px; top: 0px; width: 100%; height: 100%; opacity: 0;">
      </div>
      <div id="orangebg" class="orangebg" style="position: absolute; visibility: hidden; left: 0px; top: 0px; width: 100%; height: 100%; opacity: 0;">
      </div>
      <div id="timerRow" class="col-md-10 col-md-offset-1 timerRow" style="position: absolute; visibility: visible; left: 0px; top: 0px; opacity: 1;">
        <div id="timerCol1" class="col-md-6" style="position: relative; visibility: visible; left: 0px; top: 0px; opacity: 1;">
        </div>
        <div id="timerContainer" class="col-md-6 timerContainer" style="position: relative; visibility: visible; left: 0px; top: 0px; opacity: 1;">
          <canvas id="quiztimer" class="timer" width="300" height="300" style="position: absolute; left: 0px; top: 0px;">
          </canvas>
        </div>
      </div>
      <div id="openingText" class="col-md-10 col-md-offset-1 vertical-align" style="position: relative; visibility: visible; z-index: 3; left: 0px; top: 0px; opacity: 1;">
        <div id="title" style="position: relative; visibility: visible; margin-top: 20px; left: 0px; top: 0px; opacity: 1;">
          <h1 class="black">Quiz I - <?php echo $_smarty_tpl->tpl_vars['quiz']->value["DESCRICAO"];?>
</h1>
          <p class="p_16_black">Neste quiz, serão mostradas 10 perguntas aleatórias de <?php echo $_smarty_tpl->tpl_vars['quiz']->value["disciplina"];?>
</p>
          <p class="p_16_black">Bons estudos!</p>
          <div id="goBtn" style="position: relative; visibility: visible; margin-top: 40px; margin-bottom: 20px; left: 0px; top: 0px; width: 100px; height: 40px; opacity: 1; cursor: pointer;" class="btnOutCss">
	           <a class="nav-link active show" href="#container_stage_2" data-toggle="tab">
               <input id="btn" type="button" value="Iniciar!" style="width: 100px; height: 40px; cursor: pointer;">
            </a>
          </div>
        </div>
      </div>
      <div id="quiz" class="col-md-10 col-md-offset-1" style="position: relative; visibility: visible; left: 0px; top: 0px; opacity: 1;">
        <div id="quizquestionContainer">
          <div id="quizoptionContainer" style="left: 0px; top: 0px;">
          </div>
          <div id="quizfeedbackContainer">
          </div>
        </div>
      </div>
      <div id="quiztimeoutContainer" class="timeoutContainer" style="display: none;">
      </div>
      <div id="quizscoreContainer" class="scoreContainer" style="display: none;">
      </div>
    </div>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> -->
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['resultados']->value, 'q', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['q']->value) {
?>


<form id="regForm" action="index.php?pag=pag=jogo&jogo=quiz">
  <div class="score_quiz" id="score_quiz">
    Pontuação:<span id="score_val">0</span>
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
  <!-- <?php echo var_dump($_smarty_tpl->tpl_vars['perguntas']->value);?>
 -->
<!-- One "tab" for each step in the form: -->
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['perguntas']->value, 'pergunta', false, 'key_perg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key_perg']->value => $_smarty_tpl->tpl_vars['pergunta']->value) {
?>
<div class="tab" id="tab_<?php echo $_smarty_tpl->tpl_vars['key_perg']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['pergunta']->value["DESCRICAO"];?>

  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['respostas']->value, 'resposta', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['resposta']->value) {
?>
  <?php if ($_smarty_tpl->tpl_vars['pergunta']->value["ID_PERGUNTA"] == $_smarty_tpl->tpl_vars['resposta']->value["ID_PERGUNTA"]) {?>
  <div id="div_resposta_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" class="respostas_quiz" onclick="confere_resposta('<?php echo $_smarty_tpl->tpl_vars['resposta']->value["TIPO"];?>
','<?php echo $_smarty_tpl->tpl_vars['key_perg']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['pergunta']->value["PONTUACAO"];?>
'); this.onclick=null;">
    <p><?php echo $_smarty_tpl->tpl_vars['resposta']->value["RESPOSTA"];?>
</p>
  </div>
  <!-- <?php echo var_dump($_smarty_tpl->tpl_vars['resposta']->value);?>
 -->
  <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['resposta']->value["TIPO"];?>
" id="tipo_resp_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">
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
