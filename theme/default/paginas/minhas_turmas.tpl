<div class="col-md-10" style="margin-bottom:20%">
{if $enviado}
<div class="alert alert-success" role="alert" style="margin:10px">
  {$enviado}
</div>
{/if}
{if $turmas}
<div style="margin-top: 5px;padding:15px 0px; background:#333;color:#ddd">
  <h2 style="padding:0px 15px">Minhas Turmas</h2>
</div>
{foreach from=$turmas item=$turma}
<div class="col-md-6" style="padding:35px">
  <div class="panel panel-success">
    <div class="panel-heading">
    <h4>{$turma["nome_turma"]}</h4>
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
<div style="margin-top: 5px;padding:15px 0px; background:#333;color:#ddd">
  <h2 style="padding:0px 15px">Ver Turma</h2>
</div>
<div class="panel-heading">
  <center><h3>{$toda_turma[0]["nome_turma"]}</h3></center>
</div>
<div class="col-md-12">
{foreach from=$toda_turma key=key item=$aluno}
<div class="col-md-4">
  <div class="panel panel-success">
    <a href="index.php?pag=profile&visita=1&id_user={$aluno["id_aluno"]}" style="color:#222">
      <div class="panel-body" id="lista_alunos"  style="background:rgb({mt_rand(0,255)},{mt_rand(0,255)},{mt_rand(0,255)})">
        <div class="col-md-4 avatar-aluno">
          <img class="img_avatar" src="admin-dev/img/{$aluno["id_aluno"]}.jpg">
        </div>
        <div class="col-md-8" style="padding-top:5%">
          <span style="font-size:20px">{$aluno["nome_aluno"]}</span><br>
          {if $level_aluno}

          {foreach from=$level_aluno item=level}

          {if $level[0]["ID_USUARIO"] == {$aluno["id_aluno"]}}

          {assign var=total_pontos value=$level[$key]["pontos"]}
          {assign var=total_level value=1}

          {if $total_pontos < 10}
            {$total_level = 1}
          {else}
            {$total_level = $total_pontos/5}
          {/if}

          <i class="fa fa-arrow-right"></i><span style="font-weight:bold"> {$level[0]["pontos"]} pontos</span> - <span style="font-size:12px">Lv {$total_level|intval}</span><br>
          {/if}

          {/foreach}
          {/if}
        </div>
      </div>
    </a>
  </div>
</div>
{/foreach}
</div>

<div class="panel-footer col-md-12">
  <a href="index.php?pag=minhas_turmas" class="btn btn-outline btn-success">
  <i class="fa fa-backward fa-1x"></i> Voltar
  </a>
</div>
{/if}


</div>
