<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cadastrar uma nova turma!</h1>
                </div>
                <!-- /.col-lg-12 -->

								<?php //include('..\..\forms\cadturma.php'); ?>
								<form role="form" action="..\functions\gravar_turma.php" method="POST">

								   <div class="form-group">
										<label>Digite o nome da turma:</label>
												<input class="form-control" type="text" name="nome_turma" id="nome_turma">
									</div>

									<div class="form-group">
										<label>Digite a Sigla da turma:</label>
												<input class="form-control" type="text" name="sigla_turma" id="sigla_turma">
									</div>

									<div class="form-group">
										<label>Digite o Ano da turma:</label>
												<input class="form-control" type="number" name="ano_turma" id="ano_turma">
									</div>

									<div class="form-group">
										<label>Digite o Semestre da turma:</label>
												<input class="form-control" type="number" name="semestre_turma" id="semestre_turma">
									</div>
										<div class="form-group">
											<label>Selecione Disciplina</label>
													<select class="form-control" name="disciplina" id="disciplina">
												<option value='1'>{$aux['disciplina']}</option>
											</select>
										</div>
										<button type="submit" class="btn btn-default">Gravar Dados</button>

								</form>

            </div>
            <!-- /.row -->
