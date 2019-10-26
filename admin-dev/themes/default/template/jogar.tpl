{if $quiz_arr}
<div align='' class="col-md-12">
{foreach from=$quiz_arr item=$quiz}
<h1>Quiz {$quiz["ID_QUIZ"]} - {$quiz["DESCRICAO"]}</h1>
Turma : {$turma_arr["nome"]}
<div class="container_perguntas_admin">
  {if $perguntas}
  <div style="display:none;margin-left:auto;margin-right:auto" id="container_perg_adm" class="col-md-12">
    {foreach key=$key_perg from=$perguntas item=$pergunta}
    <div class="perguntas_admin col-md-5">
      {$pergunta["DESCRICAO"]} - {$pergunta["PONTUACAO"]} pontos
      {foreach from=$respostas item=$resposta}
      {if $pergunta["ID_PERGUNTA"] == $resposta["ID_PERGUNTA"]}
      <div class="respostas_admin" id="{$resposta["TIPO"]}" align="center">
        {$resposta["RESPOSTA"]}
      </div>
      {/if}
      {/foreach}
    </div>
    {/foreach}
  </div>
    <div class="col-md-12">
      <div id="iniciar_sala" align="center">
        <a class="btn btn-default" id="oculta_pergs" onclick="oculta_perg()" style="display:none">
          Ocultar Perguntas
        </a>
        <a class="btn btn-default" id="ver_pergs" onclick="Mostra_perg()">
          Ver Perguntas
        </a>
        <a href="index_base.php?pag=sala&abrir_sala=1&id_quiz={$id_quiz}&id_turma={$id_turma}" class="btn btn-default">
          Iniciar Sala
        </a>
      </div>
    </div>
  {else}
  Ainda não há perguntas para este quiz!
  <div class="col-md-12" id="iniciar_sala">
    <a href="index_base.php">Voltar</a>
  </div>
  {/if}
</div>

{/foreach}
</div>
{/if}

<script>
function Mostra_perg(){
  $("#container_perg_adm").show("slow");
  $("#ver_pergs").hide();
  $("#oculta_pergs").show("slow");

}
function oculta_perg(){
  $("#container_perg_adm").hide("slow");
  $("#ver_pergs").show("slow");
  $("#oculta_pergs").hide();

}
</script>
