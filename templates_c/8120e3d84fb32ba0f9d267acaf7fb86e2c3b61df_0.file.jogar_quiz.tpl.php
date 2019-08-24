<?php
/* Smarty version 3.1.33, created on 2019-08-24 02:14:36
  from 'C:\xampp\htdocs\tphe2019\theme\default\paginas\jogar_quiz.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d60816c035731_65193219',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8120e3d84fb32ba0f9d267acaf7fb86e2c3b61df' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tphe2019\\theme\\default\\paginas\\jogar_quiz.tpl',
      1 => 1566605673,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d60816c035731_65193219 (Smarty_Internal_Template $_smarty_tpl) {
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
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
