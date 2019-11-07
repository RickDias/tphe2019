{foreach key=$key from=$resultados item=$q}
<div class="col-md-7">
  <div class="score_quiz col-md-8" id="score_quiz">
    <label for="score_val">Pontuação:</label><br>
    <input type="text" id="score_val" name="score_val" value="0" disabled class="col-sm-3">
  </div>

  <a href="index.php?pag=jogo&jogo=quiz&sair_quiz=1" style="margin:15px;float:right" class="btn btn-outline btn-danger">Sair</a>

<form id="regForm" action="index.php?pag=jogar_quiz&terminar=1">

  <h1 class="black">Quiz {$q["ID_QUIZ"]} - {$q["DESCRICAO"]}</h1>

  <div class="tab" id="description">
    <br>
          <p class="p_16_black" style="font-weight:bold">Aguarde o inicio do jogo pelo professor!</p>
          <p class="p_16_black">Você pode sair a qualquer momento clicando em <b style="color:red">SAIR</b> ao topo, porém <span style="color:red;font-weight:bold">perderá sua pontuação atual!</span></p>
          <p class="p_16_black">Bons estudos!</p>
  </div>
  <!-- {$q["RODADA"]|var_dump} -->

  <div style="overflow:auto;display:none" id="iniciar" name="iniciar">
    <a href="index.php?pag=jogo&jogo=quiz" style="" class="">Voltar</a>
    <div style="float:right;">
      <!-- <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button> -->
      <button type="button" id="nextBtn" onclick="">Next</button>
    </div>
  </div>
<!-- One "tab" for each step in the form: -->
{foreach key=$key from=$perguntas item=pergunta}
<div class="tab" id="tab_{$key}">{$pergunta[0]->getDescricao()}
  {foreach from=$respostas item=$arr_resp}
    {foreach key=$key_r from=$arr_resp item=$resposta}
      {if $pergunta[0]->getId_pergunta() == $resposta->getId_pergunta()}
        <div id="div_resposta_{$key_r}" class="respostas_quiz" onclick="confere_resposta('{$resposta->getTipo()}','{$key}','{$pergunta[0]->getPontuacao()}','{$id_quiz}','{$id_turma}','{$key_r}','{$id_usuario}','{$resposta->getId_resposta()}'); this.onclick=null;">
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
<div id="final_jogo" style="display:none">
  <div class="tab" id="description_fim">
    <br>
    <center>
      <p class="p_16_black" style="font-weight:bold">Você concluiu o Quiz!</p>
      <p class="p_16_black">Você pode voltar clicando em <b style="color:red">SAIR</b> no topo.</p>
      <p class="p_16_black">Sua pontuação total terminou em <span style="color:red;font-weight:bold">{$score} pontos</span></p>
    </center>
  </div>
</div>

<div style="overflow:auto;display:none" id="resp_certa" name="resp_certa">
  Acertou, continue assim!
  <div style="float:right;">
    <!-- <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button> -->
    <!-- <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button> -->
  </div>
</div>

<div style="overflow:auto;display:none" id="resp_errada" name="resp_errada">
  Foi quase!
  <div style="float:right;">
    <!-- <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button> -->
    <!-- <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button> -->
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
    {foreach from=$alunos key=$al item=$aluno}
    <div class="col-md-12" id="bloco_aluno">

      <div class="col-md-3">
        <div class="icon_aluno" style="background:rgb({mt_rand(0,255)},{mt_rand(0,255)},{mt_rand(0,255)})">
          {$aluno["NOME"][0]}
        </div>
      </div>
      <div class="col-md-6">
        <span>{$aluno["NOME"]}</span><br>
        {assign var=total_pontos value=$level[$al]["pontos"]}
        {assign var=total_level value=1}
        {if $total_pontos < 10}
          {$total_level = 1}
        {else}
          {$total_level = $total_pontos/5}
        {/if}
        <!-- {$level[$al]|var_dump} -->
        <i class="fa fa-arrow-right"></i><span style="font-weight:bold;color:#fed136"> {$level[$al]["pontos"]} pontos</span> - <span style="font-size:12px">Lv {$total_level|intval}</span><br>

      </div>

    </div>
    {/foreach}
    {else}
      Sem alunos na sala!
    {/if}
  </div>
</div>


<script src="theme/default/vendor/jquery/jquery.min.js"></script>

<script src="theme/default/js/jogar_quiz.js"></script>
{/foreach}

<script>

function loadlink(){
    $.ajax({
               type:"POST",
               url: "check_start.php",
               async:true,
               dataType : "json",
               data: {
                 ver_rodada:1,
                 id_quiz:{$id_quiz},
                 id_turma:{$id_turma}
               },
               success: function( data ) {
                 var total_element = data.length;

                 $.each(data, function(i, val){
                   console.log(data[i]);
                   if(data[i] == 0){
                     showTab(0);
                     // refresh only once
                     if(!window.location.hash) {
                       // window.location = window.location + '#loaded';s
                       // window.location.reload();
                     }
                     // $('#teste').append('<span id="aluno_nome_'+i+'" class="nome_aluno">'+data[i]["nome_aluno"]+'</span><br>');
                   }else{
                     // hideTab(data[i] - 1);
                     showTab(data[i]);
                   }
               });
               },
               error: function( xhr, status) {
               console.log(xhr);
               console.log(status);
               }
               });
}

setInterval(function(){
    loadlink() // this will run after every 5 seconds
}, 2000);


</script>
<script type="text/javascript">
  var IDLE_TIMEOUT = 5;  // 10 minutes of inactivity
  var _idleSecondsCounter = 0;
  document.onclick = function() {
      _idleSecondsCounter = 0;
  };
  document.onmousemove = function() {
      _idleSecondsCounter = 0;
  };
  document.onkeypress = function() {
      _idleSecondsCounter = 0;
  };
  window.setInterval(CheckIdleTime, 1000);
  function CheckIdleTime() {
      _idleSecondsCounter++;
      var oPanel = document.getElementById("SecondsUntilExpire");
      if (oPanel)
          oPanel.innerHTML = (IDLE_TIMEOUT - _idleSecondsCounter) + "";
      if (_idleSecondsCounter >= IDLE_TIMEOUT) {
          // destroy the session in logout.php
          // document.location.href = "index.php?pag=jogo&jogo=quiz&sair_quiz=1";
      }
  }
</script>
