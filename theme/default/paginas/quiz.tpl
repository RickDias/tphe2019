<div style="">
  <h1>jogos disponíveis para sua turma</h1>
</div>
<div>
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
