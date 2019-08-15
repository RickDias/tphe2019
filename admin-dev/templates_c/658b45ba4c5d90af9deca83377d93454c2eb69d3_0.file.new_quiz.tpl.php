<?php
/* Smarty version 3.1.33, created on 2019-08-15 02:04:04
  from 'C:\xampp\htdocs\tphe2019\admin-dev\themes\default\template\new_quiz.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d54a1740e7e42_37322267',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '658b45ba4c5d90af9deca83377d93454c2eb69d3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tphe2019\\admin-dev\\themes\\default\\template\\new_quiz.tpl',
      1 => 1565827441,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d54a1740e7e42_37322267 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cadastrar um novo Quiz!</h1>
                </div>
                <!-- /.col-lg-12 -->

								<form role="form" action="../functions/gravar_quiz.php" method="POST">

								   <div class="form-group">
										<label>Digite a descrição do Quiz:</label>
												<textarea class="form-control" rows="3" name="txtarquiz" id="txtarquiz"></textarea>
									</div>

									<div class="form-group">
										<label>Informe a data de início:</label>
												<input class="form-control" type="date" name="data_in" id="data_in">
									</div>

									<div class="form-group">
										<label>Informe a data de fim:</label>
												<input class="form-control" type="date" name="data_fi" id="data_fi">
									</div>

									 <div class="form-group">

										<div class="radio">
											<label>
												<input type="radio" name="optionsRadios" id="optionsRadios1" value="S" checked>Publicar
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="optionsRadios" id="optionsRadios2" value="N">Não publicar
											</label>
										</div>

									</div>

									<button type="submit" class="btn btn-default">Gravar Dados</button>

								</form>

            </div>
<?php }
}
