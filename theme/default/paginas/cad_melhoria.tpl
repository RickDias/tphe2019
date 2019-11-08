<div class="col-md-10" style="background:#333;color:#ddd;padding:;">
  <h3>Cadastrar uma sugestão de melhoria para o TPhE!</h3>
</div>
{if $alert}
<div class="alert alert-success" role="alert" style="margin:10px">
  {$alert}
</div>
{/if}
{if $alertE}
<div class="alert alert-danger" role="alert" style="margin:10px">
  {$alertE}
</div>
{/if}

<div class="col-md-10" style="margin-top:5px;">
<form role="form" action="index.php?pag=cad_melhoria&salva_melhoria=1" method="POST">
  <div class="form-group">
    <label>Digite a descrição da sugestão:</label>
    <textarea class="form-control" rows="3" name="txtarquiz" id="txtarquiz"></textarea>
  </div>

  <div class="form-group">
    <label>E-mail de contato (Opcional):</label>
    <input class="form-control" type="text" name="email" id="email" value=""/>
  </div>

  <input type="hidden" value="<?php echo $_SESSION['UsuarioID']; ?>">
  <button type="submit" class="btn btn-success">Gravar Dados</button>

</form>

<a href="index.php?pag=painel_jogador" class="btn btn-outline btn-warning" style="margin-top:15px;">
<i class="fa fa-backward fa-1x"></i> Voltar ao Inicio
</a>

</div>

{if $id_user == 3}
<div class="col-md-10" style="margin-top:20px">
  <a class="btn btn-outline btn-warning" id="mostra-sug" style="margin-top:15px;" onclick=mostra_sug()>
    Mostrar sugerstões
  </a>
  <a class="btn btn-outline btn-danger" id="oculta-sug" style="margin-top:15px;display:none" onclick=oculta_sug()>
    Ocultar sugerstões
  </a>

  <div class="" style="background:;display:none;margin-top:20px" id="melhorias_div">
    {if $melhoria}
      {foreach from=$melhoria item=sug}
        <div style="border:1px solid black;border-radius:5px;margin-bottom:5px;padding:10px 15px">
          <span>{$sug["DESCRICAO"]}</span>
        </div>
      {/foreach}
    {/if}
  </div>
</div>

{/if}
<script>
function mostra_sug(){
  $("#melhorias_div").show("slow");
  $("#oculta-sug").show();
  $("#mostra-sug").hide();
}

function oculta_sug(){
  $("#melhorias_div").hide("slow");
  $("#oculta-sug").hide();
  $("#mostra-sug").show();
}

</script>
