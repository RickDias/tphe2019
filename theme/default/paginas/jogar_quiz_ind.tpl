{foreach key=$key from=$resultados item=$q}
<div class="col-md-7">
  <div class="score_quiz col-md-8" id="score_quiz">
    <label for="score_val">Pontuação:</label><br>
    <input type="text" id="score_val" name="score_val" value="0" disabled class="col-sm-3">
  </div>

  <a href="index.php?pag=jogo&jogo=quiz&sair_quiz=1" style="margin:15px;float:right" class="btn btn-outline btn-danger">Sair</a>

<form id="regForm" action="index.php?pag=jogar_quiz_ind&terminar=1">

  <div class="codigo" id="timer_count">
    <span id="segundo">30</span><br>
    <div id="voltas"></div>
  </div>
  <center>
    <h4 class="black">Quiz Individual</h4>
    <h6>{$q["DESCRICAO"]}</h6>
  </center>
  <div class="tab" id="description">
    <br>
          <p class="p_16_black" style="font-weight:bold">Este Quiz individual é gerado de forma randomica!</p>
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
        <div id="div_resposta_{$key_r}" class="respostas_quiz" onclick="confere_resposta_ind('{$resposta->getTipo()}','{$key}','{$pergunta[0]->getPontuacao()}','{$id_quiz}','{$id_usuario}','{$resposta->getId_resposta()}','{$key_r}');" this.onclick=null;>
          <p>{$resposta->getResposta()}</p>
          <input type="hidden" value="{$resposta->getTipo()}" id="tipo_resp_{$key_r}">
        </div>
        {/if}
    {/foreach}
  {/foreach}
</div>
<div id="final_jogo" style="display:none">
  <div class="tab_fim" id="description_fim">
    <br>
    <center>
      <p class="p_16_black" style="font-weight:bold">Você concluiu o Quiz!</p>
      <p class="p_16_black">Você pode voltar clicando em <b style="color:red">SAIR</b> no topo.</p>
      <p class="p_16_black">Sua pontuação total terminou em <span style="color:red;font-weight:bold">{$score} pontos</span></p>
    </center>
  </div>
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
    {foreach from=$alunos key=$al item=$aluno}
    <div class="col-md-12" id="bloco_aluno">

      <div class="col-md-3">
        <div class="icon_aluno" style="background:rgb({mt_rand(0,255)},{mt_rand(0,255)},{mt_rand(0,255)})">
          {$aluno["NOME"][0]}
        </div>
      </div>
      <div class="col-md-9">
        <h5>{$aluno["NOME"]}</h5>
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

<script src="theme/default/js/jogar_quiz_ind.js"></script>
{/foreach}

<script>

function load_ajax_aluno(){
  // $('#div_alunos_sala').load(self);
    // $('#div_alunos_sala').load('index_base.php?pag=sala&update_alunos=1&id_quiz={$id_quiz}&id_turma={$id_turma}',function () {
         // $(this).unwrap();
         // console.log( $(this));
    // });
    // $.ajax({
    //            type:"POST",
    //            url: "check_start.php",
    //            async:true,
    //            dataType : "json",
    //            data: {
    //              id_quiz:{$id_quiz},
    //              id_turma:{$id_turma},
    //              busca_aluno:1
    //            },
    //            success: function( data ) {
    //              var total_element = data.length;
    //              var total_element_html =  $('.nome_aluno').length;
    //              $.each(data, function(i, val){
    //                console.log(val["nome_aluno"]);
    //                var nome_aluno = $('#aluno_nome_'+i);
    //                nome_aluno.html(val["nome_aluno"]);
    //                // console.log($('#div_alunos_true').length == 0);
    //                if(total_element_html == i){
    //                  if ($('#div_alunos_true').length == 0){
    //                  // $('#teste').append('Gerson');
    //                    $('#div_alunos_sala').append('<div class="col-md-3" id="div_alunos_true"><h3>Jogadores na sala</h3><div class="col-md-12 bloco_aluno" id="bloco_aluno_'+i+'"><div class="col-md-3"><div class="icon_aluno" style="background:rgb({mt_rand(0,255)},{mt_rand(0,255)},{mt_rand(0,255)})">'+val["nome_aluno"][0]+'</div></div><div class="col-md-9" id="teste"><h5 id="aluno_nome_'+i+'" class="nome_aluno">'+data[i]["nome_aluno"]+'</h5></div></div></div></div>');
    //                  $('#sem_alunos').remove();
    //                }else{
    //                  $('#div_alunos_true').append('<div class="col-md-12 bloco_aluno" id="bloco_aluno_'+i+'"><div class="col-md-3"><div class="icon_aluno" style="background:rgb({mt_rand(0,255)},{mt_rand(0,255)},{mt_rand(0,255)})">'+val["nome_aluno"][0]+'</div></div><div class="col-md-9" id="teste"><h5 id="aluno_nome_'+i+'" class="nome_aluno">'+data[i]["nome_aluno"]+'</h5></div></div>');
    //                }
    //                }
    //                if( total_element < total_element_html){
    //                  $('#div_alunos_true').remove();
    //                  $('#div_alunos_sala').append('<div class="col-md-3" id="div_alunos_true"><h3>Jogadores na sala</h3><div class="col-md-12 bloco_aluno" id="bloco_aluno_'+i+'"><div class="col-md-3"><div class="icon_aluno" style="background:rgb({mt_rand(0,255)},{mt_rand(0,255)},{mt_rand(0,255)})">'+val["nome_aluno"][0]+'</div></div><div class="col-md-9" id="teste"><h5 id="aluno_nome_'+i+'" class="nome_aluno">'+data[i]["nome_aluno"]+'</h5></div></div></div></div>');
    //                  // $('#teste').append('Sem Alunos na Sala!');
    //                }
    //            });
    //              // alert(data);
    //            },
    //            error: function( xhr, status) {
    //            console.log( "Desculpe, não foi possivel encontrar alunos!" );
    //            $('.bloco_aluno').remove();
    //            // console.log(xhr);
    //            // console.log(status);
    //            }
    //            });
}

// loadlink(); // This will run on page load
setInterval(function(){
    load_ajax_aluno() // this will run after every 5 seconds
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
