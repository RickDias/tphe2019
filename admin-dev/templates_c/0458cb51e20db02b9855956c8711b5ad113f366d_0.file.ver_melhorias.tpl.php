<?php
/* Smarty version 3.1.33, created on 2019-08-16 01:03:34
  from 'C:\xampp\htdocs\tphe2019\admin-dev\themes\default\template\ver_melhorias.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d55e4c65dd2d2_08116821',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0458cb51e20db02b9855956c8711b5ad113f366d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tphe2019\\admin-dev\\themes\\default\\template\\ver_melhorias.tpl',
      1 => 1565910213,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d55e4c65dd2d2_08116821 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
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
              <?php if ($_smarty_tpl->tpl_vars['resultados']->value) {?>
              <td><?php echo $_smarty_tpl->tpl_vars['aux']->value['ID_MELHORIA'];?>
</td>
              <td><?php echo $_smarty_tpl->tpl_vars['aux']->value['DESCRICAO'];?>
</td>
              <td><?php echo $_smarty_tpl->tpl_vars['aux']->value['DT_SOLICITACAO'];?>
</td>
              <td><?php echo $_smarty_tpl->tpl_vars['aux']->value['DT_ATUALIZACAO'];?>
</td>
              <td>
                	<?php if (($_smarty_tpl->tpl_vars['aux']->value['SITUACAO'] == 'S')) {?>
                  echo 'Solicitado';
                  <?php } else { ?>
                  <?php echo $_smarty_tpl->tpl_vars['aux']->value['SITUACAO'];?>

                  <?php }?>
              </td>
              <?php } else { ?>
              <td colspan="5" style="text-align:center;">Sem Dados!</td>
              <?php }?>
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
<?php }
}
