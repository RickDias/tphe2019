<div class="col-lg-12 col-md-8">
        <div class="panel_ranking">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-comments fa-5x"></i>
              </div>
              <div class="col-xs-6 text-center">
                <div><h2>Pontuação Final</h2></div>
              </div>
              <div class="col-md-3 text-right">
                <center><div class="huge">{count($result)}</div><span style="font-size:13px;">jogadores</span></center>
              </div>
            </div>
          </div>
            <div class="panel-footer texto_ranking">
              <div class="row">
                <div class="col-md-2 text-center">
                  <h3>Posição</h3>
                </div>
                <div class="col-md-5 text-center">
                  <h3>Jogador</h3>
                </div>
                <div class="col-md-5 text-center">
                  <h3>Pontuação</h3>
                </div>
              </div>
              {foreach from=$result key=$key item=$res}
              <div class="row_ranking">
                <div class="col-md-2 text-center">
                  {if $key == 0}<i style="font-size:18px;color:gold" class="fa fa-trophy" aria-hidden="true"></i>{/if}
                  {$key+1}°
                </div>
                <div class="col-md-5 text-center">
                  {$res["NOME"]}
                </div>
                <div class="col-md-5 text-center">
                  {$res["pontos_geral"]}
                </div>
              </div>
              {/foreach}
              <!-- <a href="index_base.php"> -->
              <a onclick=updateRodada(0,{$quiz},{$turma}) class="btn btn-warning btn-md pull-right">
                  <span class="">Concluir</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
              </a>
              <div class="clearfix"></div>
            </div>
        </div>
      </div>
<!-- {$res|var_dump} -->
<script>
function updateRodada(rodada,quiz,turma)
{
  // alert("RODADA");
        $.post('index_base.php?pag=quiz_admin&remove_aluno=1&id_turma='+turma+'&id_quiz='+quiz+'&rodada='+rodada, function(d)
        {
            console.log('Update rodada');
            // $(answer).after("<span>Score Updated!</span>").remove();
            window.location.href="index_base.php";
        });
}
</script>
