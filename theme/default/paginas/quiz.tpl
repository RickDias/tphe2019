<div class="col-md-10">

  <div style="margin-top: 5px;padding:15px 0px; background:#333;color:#ddd">
    <h2 style="padding:0px 15px">Jogos Disponíveis para suas turmas</h2>
  </div>
<div class="col-md-12">
  {if $resultados->num_rows > 0}
  {foreach from=$resultados item=$quiz}
  <div class="col-md-4">
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
  {else}
  <div class="col-md-12" style="margin:20px 0px">
  <div class="panel panel-danger">
    <div class="panel-heading">
      Ops...
    </div>
    <div class="panel-body">
      <p>
        Não há jogos liberado pelo professor!
      </p>
    </div>
    <div class="panel-footer">

    </div>
  </div>
</div>


  {/if}
</div>

<div class="col-md-12">
  <div style="margin-top: 5px;padding:15px 0px; background:#333;color:#ddd">
    <h2 style="padding:0px 15px">Jogos de teste disponíveis</h2>
  </div>
  {if $jg_ind}
  {foreach from=$jg_ind item=$jg}
  <div class="col-md-4" style="margin:20px 0">
    <div class="panel panel-success">
      <div class="panel-heading">
        {$jg["DESCRICAO"]}
      </div>
      <div class="panel-body">
        <p>
          Data de Início: {$jg["DT_INICIO"]}<br/>
          Data de Fim: {$jg["DT_FIM"]}<br/>
        </p>
      </div>
      <div class="panel-footer">
        <form action="index.php?pag=jogar_quiz_ind" method="POST">
          <input type='hidden' name='id-quiz' value="{$jg["ID_QUIZ"]}">
          <button type="submit" name="enviar" value="jogar" class="btn btn-outline btn-success"><i class="fa fa-play fa-1x"></i> JOGAR</button>
        </form>
      </div>
    </div>
  </div>
  {/foreach}
  {else}
  <div class="panel-heading" style="margin: 50px 0">
    Não há jogos liberados!
  </div>
  {/if}
</div>


</div>
