<div align='center' class="col-md-12">

{foreach from=$resultados item=$quiz}
<h1>Quiz {$quiz["ID_QUIZ"]} - {$quiz["DESCRICAO"]}</h1>
<div class="container_perguntas_admin">
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
</div>

{/foreach}
<div class="col-md-12" id="iniciar_sala">
  <form action="index_base.php?pag=sala" method="POST">
    <input type="hidden" id="id_quiz" name="id_quiz" value="{$quiz["ID_QUIZ"]}">
    <input type="hidden" id="abrir_sala" name="abrir_sala" value="{$quiz["ID_QUIZ"]}">
    <i class="icon-chevron-sign-right" style="font-size:30px"></i>
    <button class="">
      Iniciar Sala
    </button>
</form>
</div>
</div>
