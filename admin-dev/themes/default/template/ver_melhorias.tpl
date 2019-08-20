<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Melhorias Cadastradas</h1>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        Melhorias cadastradas
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
              <th>#</th>
              <th>DESCRIÇÃO</th>
              <th>DATA DE SOLICITAÇÃO</th>
              <th>DATA DE ATUALIZAÇÃO</th>
              <th>SITUAÇÃO</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              {if $resultados}
              <td>{$aux['ID_MELHORIA']}</td>
              <td>{$aux['DESCRICAO']}</td>
              <td>{$aux['DT_SOLICITACAO']}</td>
              <td>{$aux['DT_ATUALIZACAO']}</td>
              <td>
                	{if ($aux['SITUACAO'] == 'S')}
                  echo 'Solicitado';
                  {else}
                  {$aux['SITUACAO']}
                  {/if}
              </td>
              {else}
              <td colspan="5" style="text-align:center;">Sem Dados!</td>
              {/if}
            </tr>
          </tbody>
        </table>
        <!-- /.table-responsive -->

      </div>
      <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
  </div>
  <!-- /.col-lg-12 -->
</div>
