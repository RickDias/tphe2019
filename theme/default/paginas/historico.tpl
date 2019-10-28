<!-- {$turmas|var_dump} -->
<div class="col-md-8">

<h3>Aluno:{$turmas[0]["usuario"]}</h3><br>
{foreach $turmas as $turma}
<!-- {$turma|var_dump} -->
<div class="col-md-8" style="border:1px solid black;border-radius:5px;margin:15px">
  <h6>Turma:{$turma["turma"]}</h6>
  Sem dados para as turmas...<br><br>
  <!-- <h3>Quiz:{$turma["DESCRICAO"]}</h3><br> -->
  <!-- {foreach from=$pontos item=$ponto}
  {if $turma["ID_QUIZ"] == $ponto["id_quiz"]}
  {$ponto["id_quiz"]}
  <h7>Pontos{$ponto["pontos"]}:</h7><br>
  {/if}
  {/foreach} -->
</div>
{/foreach}
</div>
