<script>
function toggle_turma(){
  $( "#cod_turma" ).toggleClass( display, block );
}
</script>

    <div class="container">

		<form class="well form-horizontal" action="index.php?pag=cadastro" method="post"  id="contact_form">
      <input type="hidden" name="salva_cadastro" id="salva_cadastro" value="1">

			<fieldset>
				<!-- Form Name -->
				<legend><center><h2><b>Registre-se</b></h2></center></legend><br>
				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label">Nome Completo</label>
					<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input  name="nome_user" placeholder="digite seu nome completo" class="form-control"  type="text">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">E-Mail</label>
					<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
							<input name="email" placeholder="email@email.com" class="form-control"  type="text">
						</div>
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				<label class="col-md-4 control-label" >Senha</label>
				<div class="col-md-4 inputGroupContainer">
				<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				<input name="user_password" placeholder="Senha (use letras e números, min 8)" class="form-control"  type="password">
				</div>
				</div>
				</div>

				<div class="form-group">
				<label class="col-md-4 control-label" >Confirme sua Senha</label>
				<div class="col-md-4 inputGroupContainer">
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					<input name="confirm_password" placeholder="Confirme sua Senha" class="form-control"  type="password">
				</div>
					<div class="radio">
					<label>
					<input type="radio" name="optionsRadios" id="optionsRadios2" value="3" onclick="toggle_turma()" checked>Sou um Aluno
					</label>
          <input name="cod_turma" id="cod_turma" placeholder="Digite o código da turma" class="form-control"  type="password" style="display:none">
					</div>
          <div class="radio">
            <label>
              <input type="radio" name="optionsRadios" id="optionsRadios1" value="2">Sou um Professo*<br><br>
              <span style="font-size:10px;color:#888">*marque somente se realmente for um Professor,<br> pois são sistemas diferentes!</span>
            </label>
          </div>
				</div>
				</div>

				<!-- Success message -->
				<!-- <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div> -->

				<!-- Button -->
				<div class="form-group">
				  <label class="col-md-4 control-label"></label>
				  <div class="col-md-4"><br>
					<button type="submit" class="btn btn-warning" id="salva_cadastro">Salvar</button>
				  </div>
				</div>

			</fieldset>
		</form>
    </div><!-- /.container -->
