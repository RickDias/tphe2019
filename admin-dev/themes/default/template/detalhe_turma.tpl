<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Detalhes da turma {$dados_turma[0]["nome_turma"]} - {$dados_turma[0]["SEMESTRE"]}° Semestre</h1>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading" style="padding:20px">
        <div class="col-md-4">Código da turma: {$dados_turma[0]["codigo_turma"]}</div>
        <div class="col-md-4">Ano: {$dados_turma[0]["ANO"]}</div>
        <div class="col-md-4">Sigla: {$dados_turma[0]["SIGLA"]}</div>

      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
              <th>#</th>
              <th>ALUNO</th>
              <th>STATUS</th>
              <th>SCORE TOTAL</th>
              <th colspan="2"><center>Opções</center></th>
            </tr>
          </thead>
          <tbody>
            <!-- {$result|var_dump} -->
            <!-- {$dados_turma|var_dump} -->
            {if $dados_turma}
            {foreach from=$dados_turma item=$turma}
            <!-- {$turma|var_dump} -->
            <tr>
                <td>{$turma['ID_USUARIO']}</td>
                <td>{$turma['nome_aluno']}</td>
                <td>
                  {if $turma['status'] == "A"}
                  <i class="fa fa-thumbs-up" aria-hidden="true"></i> Ativo
                  {/if}
                  {if $turma['status'] == "I"}
                  <i class="fa fa-hourglass-end" aria-hidden="true"></i> Aguardando aceitação
                  {/if}
                  {if $turma['status'] == "R"}
                  <i class="fa fa-thumbs-down" aria-hidden="true"></i> Rejeitado
                  {/if}
                </td>
                <td>{$turma['pontos_geral']}</td>
                <td>
                {if $turma['status'] == "I"}
                    <a href="index_base.php?pag=detalhe_turma&adiciona_aluno=1&id_turma={$turma['ID_TURMA']}&id_aluno={$turma['ID_USUARIO']}"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Adicionar Aluno</a><br>
                    <a href="index_base.php?pag=detalhe_turma&remove_aluno=1&id_turma={$turma['ID_TURMA']}&id_aluno={$turma['ID_USUARIO']}"><i class="fa fa-thumbs-down" aria-hidden="true"></i> Remover Aluno</a>
                {/if}
                {if $turma['status'] == "A"}
                <a href="index_base.php?pag=detalhe_turma&remove_aluno=1&id_turma={$turma['ID_TURMA']}&id_aluno={$turma['ID_USUARIO']}"><i class="fa fa-thumbs-down" aria-hidden="true"></i> Remover Aluno</a>
                {/if}
                {if $turma['status'] == "R"}
                <a href="index_base.php?pag=detalhe_turma&adiciona_aluno=1&id_turma={$turma['ID_TURMA']}&id_aluno={$turma['ID_USUARIO']}"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Adicionar Aluno</a><br>
                {/if}
              </td>
              <td>
                <a href="index_base.php?pag=historico_aluno&id_aluno={$turma['ID_USUARIO']}&id_turma={$turma['ID_TURMA']}">Ver Aluno</a><br>
              </td>
            </tr>
            {/foreach}
            {else}
            <tr><td colspan="5"><center>
              <h3>Sem Alunos nesta turma!</h3></center>
            </td></tr>
            {/if}
            </tbody>
          </table>
          <a class="btn btn-outline btn-danger" href="index_base.php?pag=turmas" style="margin:15px">Voltar</a>

          <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
