{if $quiz_arr}
<div align='center' class="col-md-12">
{foreach from=$quiz_arr item=$quiz}
<h1>Quiz {$quiz["ID_QUIZ"]} - {$quiz["DESCRICAO"]}</h1>
Turma : {$turma_arr["nome"]}
<div class="container_perguntas_admin">
  {if $perguntas}
    {foreach key=$key_perg from=$perguntas item=$pergunta}
    <div class="perguntas_admin col-md-5">
    {$pergunta["DESCRICAO"]} - {$pergunta["PONTUACAO"]} pontos
    {foreach from=$respostas item=$resposta}
    {if $pergunta["ID_PERGUNTA"] == $resposta["ID_PERGUNTA"]}
    <div class="respostas_admin" id="{$resposta["TIPO"]}">
      {$resposta["RESPOSTA"]}
    </div>
    {/if}
    {/foreach}
    </div>
    {/foreach}
    <div class="col-md-12" id="iniciar_sala">
      <!-- <a href="index_base.php?pag=quiz_admin&iniciar_quiz=1&id_quiz={$id_quiz}&id_turma={$id_turma}" class=""> -->
        <a href="index_base.php?pag=sala&abrir_sala=1&id_quiz={$id_quiz}&id_turma={$id_turma}" class="">

        Iniciar Sala
      </a>
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
