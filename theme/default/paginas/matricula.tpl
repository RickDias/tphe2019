<div class="col-md-10" style="margin-bottom:20%">


<form class="well form-horizontal" action="index.php?pag=matricula" method="post"  id="contact_form">
  <input type="hidden" name="salva_cadastro" id="salva_cadastro" value="1">

  <fieldset>
    <!-- Form Name -->
    <legend><center><h2><b>Realizar Matrícula</b></h2></center></legend><br>
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label">Digite o código da turma</label>
      <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
          <input  name="cod_turma" placeholder="digite o código da turma..." class="form-control"  type="text">
        </div>
      </div>
    </div>
    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label"></label>
      <div class="col-md-4"><br>
      <button type="submit" class="btn btn-warning" id="verificar_codigo" name="verificar_codigo">Enviar</button>
      </div>
    </div>
  </fieldset>
</form>


</div>
