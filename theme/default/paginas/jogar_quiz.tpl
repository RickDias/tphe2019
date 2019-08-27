<!-- {foreach from=$resultados item=$quiz}
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
          <h1 class="black">Quiz I - {$quiz["DESCRICAO"]}</h1>
          <p class="p_16_black">Neste quiz, serão mostradas 10 perguntas aleatórias de {$quiz["disciplina"]}</p>
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
{/foreach} -->
{foreach key=$key from=$resultados item=$q}


<form id="regForm" action="index.php?pag=pag=jogo&jogo=quiz">
  <div class="codigo">
    <!-- <span id="hora">00h</span><span id="minuto">00m</span> -->
    <span id="segundo">30</span><br>
    <!-- <input type="button" value="Volta" onclick="volta();"><br> -->
    <!-- <div id="parar"><input type="button" value="Parar" onclick="parar();"></div> -->
    <!-- <div id="comeca" style="display:none;"><input type="button" value="Comeca" onclick="tempo(1);"><br></div> -->
    <!-- <input type="button" value="Limpa" onclick="limpa();"><br><br> -->
    <div id="voltas"></div>
  </div>

  <h1 class="black">Quiz {$q["ID_QUIZ"]} - {$q["DESCRICAO"]}</h1>

  <div class="tab">
          <p class="p_16_black">Neste quiz, serão mostradas 10 perguntas sobre {$q["DESCRICAO"]} definidas pelo professor!</p>
          <p class="p_16_black">Bons estudos!</p>
  </div>

  <div style="overflow:auto;display:none" id="iniciar" name="iniciar">
    <div style="float:right;">
      <!-- <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button> -->
      <a href="index.php?pag=jogo&jogo=quiz" style="" class="">Voltar</a>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- {$perguntas|var_dump} -->
<!-- One "tab" for each step in the form: -->
{foreach key=$key_perg from=$perguntas item=$pergunta}
<div class="tab" id="tab_{$key_perg}">{$pergunta["DESCRICAO"]}
  {foreach key=$key from=$respostas item=$resposta}
  {if $pergunta["ID_PERGUNTA"] == $resposta["ID_PERGUNTA"]}
  <div id="div_resposta_{$key}" class="respostas_quiz" onclick="confere_resposta('{$resposta["TIPO"]}','{$key_perg}'); this.onclick=null;">
    <p>{$resposta["RESPOSTA"]}</p>
  </div>
  <!-- {$resposta|var_dump} -->
  <input type="hidden" value="{$resposta["TIPO"]}" id="tipo_resp_{$key}">
  {/if}
  {/foreach}
</div>
{/foreach}
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
  {foreach key=$key from=$perguntas item=$pag}
  <span class="step" id="num_step_{$key}" name"num_step_{$key}"></span>
  {/foreach}
</div>

</form>
<script src="theme/default/vendor/jquery/jquery.min.js"></script>

<script src="theme/default/js/jogar_quiz.js"></script>
{/foreach}
