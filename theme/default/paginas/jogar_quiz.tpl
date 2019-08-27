{foreach key=$key from=$resultados item=$q}

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

  <h1 class="black">Quiz {$q["ID_QUIZ"]} - {$q["DESCRICAO"]}</h1>

  <div class="tab">
          <p class="p_16_black">Neste quiz, serão mostradas 10 perguntas sobre {$q["DESCRICAO"]} definidas pelo professor!</p>
          <p class="p_16_black">Bons estudos!</p>
  </div>

  <div style="overflow:auto;display:none" id="iniciar" name="iniciar">
    <a href="index.php?pag=jogo&jogo=quiz" style="" class="">Voltar</a>
    <div style="float:right;">
      <!-- <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button> -->
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- {$perguntas|var_dump} -->
<!-- One "tab" for each step in the form: -->
{foreach key=$key_perg from=$perguntas item=$pergunta}
<div class="tab" id="tab_{$key_perg}">{$pergunta["DESCRICAO"]}
  {foreach key=$key from=$respostas item=$resposta}
  {if $pergunta["ID_PERGUNTA"] == $resposta["ID_PERGUNTA"]}
  <div id="div_resposta_{$key}" class="respostas_quiz" onclick="confere_resposta('{$resposta["TIPO"]}','{$key_perg}','{$pergunta["PONTUACAO"]}'); this.onclick=null;">
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
