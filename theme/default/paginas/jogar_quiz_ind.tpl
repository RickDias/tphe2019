{foreach key=$key from=$resultados item=$q}
<div class="col-md-7">
  <div class="score_quiz col-md-8" id="score_quiz">
    <label for="score_val">Pontuação:</label><br>
    <input type="text" id="score_val" name="score_val" value="{$score}" disabled class="col-sm-3">
  </div>

  <a href="index.php?pag=jogo&jogo=quiz&sair_quiz=1" style="margin:15px;float:right" class="btn btn-outline btn-danger">Sair</a>

<form id="regForm" action="index.php?pag=jogar_quiz_ind&terminar=1">

  <div class="codigo" id="timer_count">
    <span id="segundo">30</span><br>
    <div id="voltas"></div>
  </div>

  <h1 class="black">Quiz Individual {$q["ID_QUIZ"]} - {$q["DESCRICAO"]}</h1>

  <div class="tab" id="description">
    <br>
          <!-- <p class="p_16_black" style="font-weight:bold">Aguarde o inicio do jogo pelo professor!</p> -->
          <p class="p_16_black">Você pode sair a qualquer momento clicando em <b style="color:red">SAIR</b> no topo, porém <span style="color:red;font-weight:bold">perderá sua pontuação atual!</span></p>
          <p class="p_16_black">Bons estudos!</p>
  </div>
  <!-- {$q["RODADA"]|var_dump} -->

  <div style="overflow:auto;display:none" id="iniciar" name="iniciar">
    <a href="index.php?pag=jogo&jogo=quiz" style="" class="">Voltar</a>
    <div style="float:right;">
      <!-- <button type="button" id="prevBtn" onclick="nextPrevInd(-1)">Previous</button> -->
      <button type="button" id="nextBtn" onclick="nextPrevInd(1)">Next</button>
    </div>
  </div>
<!-- One "tab" for each step in the form: -->
{foreach key=$key from=$perguntas item=pergunta}
<div class="tab" id="tab_{$key}">{$pergunta[0]->getDescricao()}
  {foreach from=$respostas item=$arr_resp}
    {foreach key=$key_r from=$arr_resp item=$resposta}
      {if $pergunta[0]->getId_pergunta() == $resposta->getId_pergunta()}
        <div id="div_resposta_{$key_r}" class="respostas_quiz" onclick="confere_resposta_ind('{$resposta->getTipo()}','{$key}','{$pergunta[0]->getPontuacao()}','{$id_quiz}','{$id_usuario}','{$resposta->getId_resposta()}','{$key_r}');" this.onclick=null;">
          <p>{$resposta->getResposta()}</p>
          <input type="hidden" value="{$resposta->getTipo()}" id="tipo_resp_{$key_r}">
        </div>
        {/if}
    {/foreach}
  {/foreach}
</div>
<div style="overflow:auto;display:none" class="esgotado" id="temp_esg_{$key}" name="temp_esg_{$key}">
  Tempo esgotado! Aguarde a próxima rodada
  <input type="hidden" value="0" id="div_esg_{$key}">

</div>
{/foreach}

<div style="overflow:auto;display:none" id="resp_certa" name="resp_certa">
  Acertou, continue assim!
  <div style="float:right;">
    <!-- <button type="button" id="prevBtn" onclick="nextPrevInd(-1)">Previous</button> -->
    <button type="button" id="nextBtn" onclick="nextPrevInd(1)">Next</button>
  </div>
</div>

<div style="overflow:auto;display:none" id="resp_errada" name="resp_errada">
  Foi quase!
  <div style="float:right;">
    <!-- <button type="button" id="prevBtn" onclick="nextPrevInd(-1)">Previous</button> -->
    <button type="button" id="nextBtn" onclick="nextPrevInd(1)">Next</button>
  </div>
</div>


<!-- Circles which indicates the steps of the form: -->
<div style="text-align:center;margin-top:40px;" id="all_steps" name="all_steps">
  {foreach key=$key from=$perguntas item=$pag}
  <span class="step" id="num_step_{$key}" name"num_step_{$key}"></span>
  {/foreach}
</div>

</form>
</div>

<div class="col-md-3" id="container_sala__aluno">
  <h4>Jogadores na sala</h4>
  <div class="item_sala_aluno">
    {if $alunos}
    {foreach from=$alunos item=$aluno}
    <div class="col-md-12" id="bloco_aluno">

      <div class="col-md-3">
        <div class="icon_aluno">
          S
        </div>
      </div>

      <div class="col-md-9">
        <h3>{$aluno["NOME"]}</h3>
        <span>Pontuação Geral: {$aluno["pontos_geral"]}</span>
      </div>

    </div>
    {/foreach}
    {else}
      Sem alunos na sala!
    {/if}
  </div>
</div>


<script src="theme/default/vendor/jquery/jquery.min.js"></script>

<script src="theme/default/js/jogar_quiz_ind.js"></script>
{/foreach}
