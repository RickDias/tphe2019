<!-- {$turmas|var_dump} -->
<div class="col-md-8" style="min-height:550px;">
{if $level_aluno}
{foreach $level_aluno as $level}
<div class="classejogador" style="background:#333">
  <div class="container" id="user_info_container">
    <div class="fb-profile">
      <img align="left" class="fb-image-profile thumbnail" style="margin:5px;" src="admin-dev/img/{$level["ID_USUARIO"]}.jpg">
      <div class="col-md-8" style="margin-top:15px;color:#ccc">
        <h3>{$level["NOME"]}</h3>
        {assign var=total_pontos value=$level["pontos"]}
        {assign var=total_level value=1}
        {if $total_pontos < 10}
          {$total_level = 1}
        {else}
          {$total_level = $total_pontos/5}
        {/if}
        <i class="fa fa-arrow-right"></i><span style="font-weight:bold;color:#fed136"> {$level["pontos"]} pontos</span> - <span style="font-size:12px">Nível {$total_level|intval}</span><br>
        <!-- <span class="text-muted" style="font-size:13px"><i class="fa fa-clock-o fa-fw"></i> {$jogador["turma"]}</span> -->
      </div>
    </div>
  </div>
</div>

<!-- {$level|var_dump} -->
{/foreach}
{else}
<h3>Histórico</h3><br>
{/if}
{if $turmas}
<div class="col-md-12" style="padding:0px 10px">
{foreach $turmas as $turma}
<!-- {$turma|var_dump} -->
<div class="col-md-5" style="border:1px solid black;border-radius:5px;margin:15px;background:#333;color:#ddd;padding:5px;">
  <span>Turma: <span style="font-weight:bold;font-size:18px;">{$turma["turma"]}</span></span><br><br>
  Total de acertos: {$turma["acertos"]}<br>
  Pontuação nesta turma: {$turma["pontos"]}
  <!-- Sem dados para as turmas...<br><br> -->
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
{else}
<div class="col-md-8" style="border:1px solid black;border-radius:5px;margin:15px;">
  <h6>Sem dados para este aluno no momento!</h6>
</div>
{/if}
</div>
