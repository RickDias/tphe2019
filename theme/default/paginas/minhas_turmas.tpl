<div class="col-md-10">
{if $enviado}
<div class="alert alert-success" role="alert" style="margin:10px">
  {$enviado}
</div>
{/if}
{if $turmas}
<div style="padding:15px 0 0 15px">
  <h2>Minhas Turmas</h2>
</div>
{foreach from=$turmas item=$turma}
<div class="col-lg-4">
  <div class="panel panel-success">
    <div class="panel-heading">
      {$turma["NOME"]}
    </div>
    <div class="panel-body">
      <p>
        Sigla: {$turma["SIGLA"]}<br/>
      </p>
    </div>
    <div class="panel-footer">
      <form action="index.php?pag=minhas_turmas" method="POST">
        <input type='hidden' name='id-turma' value="{$turma["ID_TURMA"]}">
        <input type='hidden' name='id-quiz' value="{$turma["ID_QUIZ"]}">
        <button type="submit" name="ver_turma" value="jogar" class="btn btn-outline btn-success"><i class="fa fa-play fa-1x"></i> Ver Turma</button>
      </form>
    </div>
  </div>
</div>
{/foreach}
{else}
{if $alerta}
<div style="padding:15px 0 0 15px">
  <h2>Minhas Turmas</h2>
  <div class="panel-body">
    <p>
      {$alerta}<br>
      Caso ja tenha enviado sua matrícula, aguarde a aprovação do professor!
    </p>
  </div>
</div>
{/if}
{/if}

{if $toda_turma}
<div style="padding:15px 0 0 15px">
  <h2>Ver Turma</h2>
</div>
<div class="panel-heading">
  {$toda_turma[0]["nome_turma"]}
</div>
{foreach from=$toda_turma item=$aluno}
<div class="col-lg-4">
  <div class="panel panel-success">
    <div class="panel-body">
      <p>
        {$aluno["nome_aluno"]}<br/>
      </p>
    </div>
  </div>
  <div class="panel-footer">
    <form action="#" method="POST">
      <input type='hidden' name='id-turma' value="{$quiz["ID_TURMA"]}">
      <input type='hidden' name='id-quiz' value="{$quiz["ID_QUIZ"]}">
      <button type="submit" name="ver_turma" value="jogar" class="btn btn-outline btn-success"><i class="fa fa-play fa-1x"></i> Voltar</button>
    </form>
  </div>
</div>
{/foreach}
{/if}


</div>
