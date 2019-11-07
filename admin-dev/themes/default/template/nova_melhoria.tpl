<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cadastrar uma sugestão de melhoria para o TPhE!</h1>
                </div>
                <!-- /.col-lg-12 -->

				<form role="form" action="..\functions\gravar_melhoria.php" method="POST">

					<div class="form-group">
					<label>Digite a descrição da sugestão:</label>
					<textarea class="form-control" rows="3" name="txtarquiz" id="txtarquiz"></textarea>
					</div>

					<div class="form-group">
					<label>E-mail de contato:</label>
					<input class="form-control" readonly=0 type="text" name="email" id="email" value="{$email}"/>
					</div>

					<input type="hidden" value="<?php echo $_SESSION['UsuarioID']; ?>">

					<button type="submit" class="btn btn-default">Gravar Dados</button>

				</form>

            </div>
