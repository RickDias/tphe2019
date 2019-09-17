<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Turmas Cadastradas</h1>
  </div>
  <!-- /.col-lg-12 -->
</div>

<!-- /.row -->
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        Turmas cadastradas
      </div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
              <th>#</th>
              <th>ANO</th>
              <th>SEMESTRE</th>
              <th>NOME</th>
              <th>SIGLA</th>
              <th>DISCIPLINA</th>
              <th>Cod Turma</th>
              <th></th>


            </tr>
          </thead>
          <tbody>
            <!-- {$result|var_dump} -->
            {foreach from=$result item=$turma}
            <!-- {$turma|var_dump} -->
            <tr>
                <td>{$turma['ID_TURMA']}</td>
                <td>{$turma['ANO']}</td>
                <td>{$turma['SEMESTRE']}</td>
                <td>{$turma['NOME']}</td>
                <td>{$turma['SIGLA']}</td>
                <td>{$turma['disciplina']}</td>
                <td>{$turma['codigo_turma']}</td>
                <td><a href="index_base.php?pag=detalhe_turma&id_turma={$turma['ID_TURMA']}">Ver Turma</a></td>

            </tr>
            {/foreach}
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
  <!-- /.row -->
