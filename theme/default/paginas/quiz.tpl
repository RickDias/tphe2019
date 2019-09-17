<div class="col-md-10">

<div style="">
  <h1>jogos disponíveis para sua turma</h1>
</div>
<div class="col-md-8">
  {foreach from=$resultados item=$quiz}
  <div class="col-lg-4">
    <div class="panel panel-success">
      <div class="panel-heading">
        {$quiz["DESCRICAO"]}
      </div>
      <div class="panel-body">
        <p>
          Data de Início: {$quiz["DT_INICIO"]}<br/>
          Data de Fim: {$quiz["DT_FIM"]}<br/>
          Turma: {$quiz["SIGLA"]}<br/>
        </p>
      </div>
      <div class="panel-footer">
        <form action="index.php?pag=jogar_quiz" method="POST">
          <input type='hidden' name='id-turma' value="{$quiz["ID_TURMA"]}">
          <input type='hidden' name='id-quiz' value="{$quiz["ID_QUIZ"]}">
          <button type="submit" name="enviar" value="jogar" class="btn btn-outline btn-success"><i class="fa fa-play fa-1x"></i> JOGAR</button>
        </form>
      </div>
    </div>
  </div>
  {/foreach}
</div>

<div class="col-md-3" id="container_sala__aluno" style="float:right">
  Jogadores na sala
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
        <span>Pontuação: {$aluno["pontos_geral"]}</span>
      </div>

    </div>
    {/foreach}
    {else}
      Sem alunos na sala!
    {/if}
  </div>
</div>

</div>
