<div class="container" id="user_front_container">
  <div class="fb-profile">
    <!-- capa -->
    <div id="bg_profile" style="background-image:url('admin-dev/img/gifs/4.gif')">
      <!-- <img id="bg_profile" align="left"class="fb-image-lg" src="admin-dev/img/gifs/1.gif" alt="Profile image example"/> -->
      <a href="" class="btn btn-dark">Alterar</a>
    </div>
    <!-- perfil -->
    <img align="left" class="fb-image-profile thumbnail" src="{$img_perfil}" alt="Profile image example"/>

      <!-- nome -->
      <div class="col-md-8" style="display:flex;flex-wrap:wrap;padding:15px;">
        <span style="flex-grow:2;font-weight:bold;font-size:35px">{$usuario[0]->nome}</span>
        <div class="ldBar label-center" id="score_bar_profile" data-value="{$percent}" data-preset="circle">
        </div>

        <span class="col-md-12" style="font-weight:bold">LEVEL <span style="font-size:20px;color:#f00">{(int)$pt_user}</span></span>
      </div>
        <!-- <a href="#" style="color:red">editar</a> -->
      <!-- status -->
      <!-- <div class="score_user">$total_pontos</div> -->

    <div class="col-md-12 profile_sett">
      <form id="upd_pass_form" action="index.php?pag=profile" method="POST">
        <input type="hidden" id="update_pass" name="update_pass" value="1">
        <input type="hidden" id="id_user" name="id_user" value="{$usuario[0]->id_usuario}">

        <div class="container_pf">
          <div class="date-text" style="display: block;">
            <h4>{$usuario[0]->email}</h4>
          </div>
          {if $upd_pass}
          {if $upd_ok == 1}
          <div class="alert alert-success" role="alert">Senha alterada com sucesso!</div>
          {else}
          <div class="alert alert-danger" role="alert">Senha incorreta!</div>
          {/if}
          {/if}
          <a id="alt_senha" style="" onclick="mostra()">Alterar senha</a>
          <label for="atual_pass" id="atual_pass_lb" style="display:none">Senha Atual</label>
          <input type="password" id="atual_pass" name="atual_pass" style="display:none" required="required">
          <label for="new_pass" id="new_pass_lb" style="display:none">Nova Senha</label>
          <input type="password" id="new_pass" name="new_pass" style="display:none" required="required">
          <input type="submit" id="salva_pass" style="margin:10px 0;display:none" value="Salvar">
          <a id="cancel_pass" style="" onclick="oculta()">Cancelar</a>
          <!-- <div  style="padding-top:15px">
            Tema: <div style="background:white;border:1px solid gray;padding:5px 10px;width:50px;border-radius:15px"><div style="background:{$color};width:30px">&nbsp</div></div>
          </div> -->
          <ul class="list-inline social-buttons">
            <li>
              <a href="{$base_facebook}{$usuario[0]->id_facebook}"><i class="fa fa-facebook"></i></a>
            </li>
          </ul>
        </div>
      </form>
    </div>
  </div>
</div>
<script>

function mostra(){
  document.getElementById("atual_pass_lb").style.display = "block";
  document.getElementById("atual_pass").style.display = "block";
  document.getElementById("new_pass_lb").style.display = "block";
  document.getElementById("new_pass").style.display = "block";
  document.getElementById("salva_pass").style.display = "block";
  document.getElementById("cancel_pass").style.display = "block";
  document.getElementById("alt_senha").style.display = "none";

}

function oculta(){
  document.getElementById("atual_pass_lb").style.display = "none";
  document.getElementById("atual_pass").style.display = "none";
  document.getElementById("new_pass_lb").style.display = "none";
  document.getElementById("new_pass").style.display = "none";
  document.getElementById("salva_pass").style.display = "none";
  document.getElementById("cancel_pass").style.display = "none";
  document.getElementById("alt_senha").style.display = "block";
}
</script>

<br>
<br>
<br>
<br>
<br>
<!-- {$usuario|var_dump} -->
