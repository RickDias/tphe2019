<div class="col-md-10">
                <div class="col-md-12">
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
												<input class="option_radio" type="radio" name="optionsRadios" id="optionsRadios1" value="S" checked>Publicar
											</label>
										</div>
										<div class="radio">
											<label>
												<input class="option_radio" type="radio" name="optionsRadios" id="optionsRadios2" value="N">Não publicar
											</label>
										</div>

									</div>

									<button type="submit" class="btn btn-default">Gravar Dados</button>

								</form>

            </div>
