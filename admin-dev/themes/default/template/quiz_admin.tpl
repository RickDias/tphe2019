{foreach key=$key from=$resultados item=$q}
<div class="col-md-9">
  <a id="termina_form" href="index_base.php?pag=final_quiz&terminar=1&id_quiz={$q["ID_QUIZ"]}&id_turma={$id_turma}" style="display:none">terminar</a>
<form id="regForm" action="">
  <div class="codigo" id="timer_count">
    <span id="segundo">30</span><br>
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
      <button type="button" id="nextBtn" onclick="nextPrev(1)">NextXX</button>
    </div>
  </div>
{foreach key=$key from=$perguntas item=pergunta}
<div class="tab" id="tab_{$key}">{$pergunta[0]->getDescricao()}
  {foreach from=$respostas item=$arr_resp}
    {foreach key=$key_r from=$arr_resp item=$resposta}
      {if $pergunta[0]->getId_pergunta() == $resposta->getId_pergunta()}
        <div id="div_resposta_{$key_r}" class="respostas_quiz" onclick="">
          <p>{$resposta->getResposta()}</p>
          <input type="hidden" value="{$resposta->getTipo()}" id="tipo_resp_{$key_r}">
        </div>
        {/if}
    {/foreach}
  {/foreach}
</div>
{/foreach}
<a href="#esgotado" style="display:none" id="envia_esgotado" onclick="updateEsgotado(1,{$q["ID_QUIZ"]},{$id_turma})">ESGOTAR</a>
<a href="#reiniciado" style="display:none" id="envia_reiniciar" onclick="updateEsgotado(2,{$q["ID_QUIZ"]},{$id_turma})">REINICIAR</a>


<div style="overflow:auto;display:none" id="resp_certa" name="resp_certa">
  <div style="float:right;">
    <button type="button" id="nextBtn" onclick="nextPrev(1,{$q["ID_QUIZ"]},{$id_turma})">Próxima pergunta</button>
  </div>
</div>
<div style="overflow:auto;display:none" id="resp_errada" name="resp_errada">
  <div style="float:right;">
    <button type="button" id="nextBtn" onclick="nextPrev(1,{$q["ID_QUIZ"]},{$id_turma})">Próxima pergunta</button>
  </div>
</div>
<!-- <div style="overflow:auto;display:none" id="finalizar" name="finalizar">
  <div style="float:right;">
    <button type="button" id="nextBtn" onclick="nextPrev(1,{$q["ID_QUIZ"]},{$id_turma})">Finalizar</button>
  </div>
</div> -->

<!-- Circles which indicates the steps of the form: -->
<div style="text-align:center;margin-top:40px;" id="all_steps" name="all_steps">
  {foreach key=$key from=$perguntas item=$pag}
  <span class="step" id="num_step_{$key}" name"num_step_{$key}"></span>
  {/foreach}
</div>
<button type="button" id="" onclick="parar()">Parar Quiz</button>
</form>
<form role="form" action="index_base.php?pag=sala&abrir_sala=1" method="POST">
  <input type='hidden' name='id_quiz' value="{$q["ID_QUIZ"]}">
  <input type='hidden' name='id_turma' value="{$id_turma}">
  <input type='hidden' name='fechar_quiz' value="1">
  <button type="submit" name="enviar" value="jogar" class="btn btn-outline btn-success"><i class="fa fa-backward fa-1x"></i> Voltar</button>
</form>
</div>

<div class="col-md-3" id="container_sala__aluno">
  <div class="item_sala_aluno">
    {if $alunos}
    <div class="col-md-12" id="div_alunos_true">
      <h3>Jogadores na sala</h3>
      {foreach from=$alunos key=$key item=$aluno}
      <div class="col-md-12 bloco_aluno" id="bloco_aluno_{$aluno["ID_USUARIO"]}">
        <div class="col-md-3">
          <div class="icon_aluno" style="background:rgb({mt_rand(0,255)},{mt_rand(0,255)},{mt_rand(0,255)})">
            {$aluno["nome_aluno"][0]}
          </div>
        </div>
        <div class="col-md-9" id="teste">
          <h5 id="aluno_nome_{$key}" class="nome_aluno">{$aluno["nome_aluno"]}</h5>
        </div>
      </div>
      {/foreach}
    </div>
  </div>
    {else}
    <div class="col-md-3" id="sem_alunos">
      <h3>Jogadores na sala</h3>
      Sem Alunos na Sala!
    </div>
    {/if}
  </div>
</div>


<script src="vendor/jquery/jquery.min.js"></script>

<script src="themes/default/js/jogar_quiz.js"></script>
{/foreach}
