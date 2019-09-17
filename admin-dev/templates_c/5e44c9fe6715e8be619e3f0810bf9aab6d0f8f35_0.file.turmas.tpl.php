<?php
/* Smarty version 3.1.33, created on 2019-09-18 01:01:11
  from 'C:\xampp\htdocs\tphe2019\admin-dev\themes\default\template\turmas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d8165b7108a90_04963942',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5e44c9fe6715e8be619e3f0810bf9aab6d0f8f35' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tphe2019\\admin-dev\\themes\\default\\template\\turmas.tpl',
      1 => 1568761151,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d8165b7108a90_04963942 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
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
            <!-- <?php echo var_dump($_smarty_tpl->tpl_vars['result']->value);?>
 -->
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['result']->value, 'turma');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['turma']->value) {
?>
            <!-- <?php echo var_dump($_smarty_tpl->tpl_vars['turma']->value);?>
 -->
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['turma']->value['ID_TURMA'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['turma']->value['ANO'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['turma']->value['SEMESTRE'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['turma']->value['NOME'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['turma']->value['SIGLA'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['turma']->value['disciplina'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['turma']->value['codigo_turma'];?>
</td>
                <td><a href="index_base.php?pag=detalhe_turma&id_turma=<?php echo $_smarty_tpl->tpl_vars['turma']->value['ID_TURMA'];?>
">Ver Turma</a></td>

            </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
<?php }
}
