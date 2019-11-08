<div class="container" id="user_front_container" style="color:#ddd">
  <div class="fb-profile col-md-12">
    {if $msg}
    <div class="alert alert-success" id="mssg" role="alert" style="margin:10px">
      {$msg}
    </div>
    {/if}
    {if $msge}
    <div class="alert alert-danger" id="mssg2" role="alert" style="margin:10px">
      {$msge}
    </div>
    {/if}
    <!-- {$pt_user|var_dump} -->
    <!-- capa -->
    <!-- <div id="bg_profile" style="background-image:url('admin-dev/img/gifs/4.gif')"> -->
    <img align="left"class="fb-image-lg" src="{$img_capa}" alt="Profile image example"/>
    {if $visita != 1}
    <a class="btn btn-outline btn-info" style="z-index:999;position:absolute" onclick="mostra_img()" id="botao_mostra"><i class="fa fa-pencil" aria-hidden="true"></i></a>
    {/if}
    <!-- </div> -->
    <!-- perfil -->
      <img align="left" class="fb-image-profile thumbnail" src="{$img_perfil}" alt="Profile image example"/>

      <span id="span_altera" style="display:none">Alterar imagem</span>
      <div class="col-md-12" id="container_alt_img">
        <form id="upd_cover_form" action="index.php?pag=profile" method="POST">
          <input type="hidden" id="update_cover" name="update_cover" value="1">
        <center><h4>Capas:</h4></center>
        <div class="div_images" style="background:#555">
          <!-- foreach -->
          <!-- {assign var=x value=0} -->
          {for $x=1 to 12}
          <div class="coluna4">
            <center>
              <a onclick="select_radio({$x})">
                <img class="img_covers" id="img_{$x}" src="admin-dev/img/{$x}.2.jpg" alt="Profile image example"/>
              </a>
                <input type="radio" value="{$x}" id="c{$x}" name="cover_radio" style="display:none">
            </center>
          </div>
          {/for}
        </div>

        <center><h4>Perfil:</h4></center>
        <div class="div_images" style="background:#555;">
          <!-- foreach -->
          {for $y=10 to 21}
          <div class="coluna5">
            <center>
              <a onclick="select_radio2({$y})">
                <img class="img_profile" id="img2_{$y}" src="admin-dev/img/{$y}.jpg" alt="Profile image example"/>
              </a>
              <input type="radio" value="{$y}" id="p{$y}" name="profile_radio" style="display:none">
            </center>
          </div>
          {/for}
        </div>
        <center style="margin-bottom:5px">
        <a class="btn btn-outline btn-danger" style="margin:5px" onclick="oculta_img()" id="botao_oculta">Cancelar</a>
        <button type="submit" class="btn btn-outline btn-success" style="margin:5px" onclick="oculta_img()" id="botao_oculta">Salvar</button>
      </center>


      </form>

      </div>

      <!-- nome -->
      <div class="col-md-12" style="display:flex;flex-wrap:wrap;padding:15px;background:#333">
        <div style="background:#555" class="col-md-12">
          <span style="font-weight:bold;font-size:35px;background:">{$usuario[0]->nome}</span>
        </div>

        <div style="background:;padding:10px" class="col-md-10">
          <div class="col-md-12" id="text_conquista" style="font-weight:bold;background:;margin-bottom:5px">
            <h5>Conquistas</h5>
          </div>
          {if $conquistas}
          {foreach from=$conquistas item=$conquista}
          <div class="" id="conquistas_profile">
              <img src="admin-dev/img/conquistas/{$conquista[0]}.png" class="img_conquistas" title="{$conquista[1]}">
          </div>
          {/foreach}
          {else}
          {if $visita ==1}
          Este jogador não possui conquistas...
          {else}
          Voce ainda não possui conquistas!
          {/if}
          {/if}
        </div>

        <div id="score_profile" class="col-sm-12 col-md-2">
          {if $pt_user}
          {foreach $pt_user as $level}
          <!-- {$level|var_dump} -->
          {assign var=total_pontos value=$level["pontos"]}
          {assign var=total_level value=1}
          {if $total_pontos < 10}
            {$total_level = 1}
          {else}
            {$total_level = $total_pontos/5}
          {/if}

          {assign var=percent_base value=explode(".",$total_level)}
          {assign var=percent value=(int)$percent_base[1]*10}
          <div class="ldBar label-center" id="score_bar_profile" data-value="{$percent}" data-label="4" data-preset="circle">
          </div>
          <div class="text_profile_level">
            Nível {$total_level|intval}
          </div>
          {/foreach}
          {else}
            Sem pontos até o momento!
          {/if}
        </div>

      </div>
        <!-- <a href="#" style="color:red">editar</a> -->
      <!-- status -->
    {if $visita == 1}
    <div class="col-md-12 profile_sett">
      <h4>Turmas deste aluno:</h4>

      {if $turmas}
      <div class="col-md-12" style="padding:0px 10px">
      {foreach $turmas as $turma}
      <!-- {$turma|var_dump} -->
      <div class="col-md-5 lista_turma_profile">
        <span>Turma: <span style="font-weight:bold;font-size:18px;">{$turma["turma"]}</span></span><br><br>
        Total de acertos: {$turma["acertos"]}<br>
        Pontuação nesta turma: {$turma["pontos"]}
      </div>
      {/foreach}
      </div>
      {else}
      {if $turmas2}
      <div class="col-md-12" style="padding:0px 10px">
        {foreach $turmas2 as $turma2}
        <div class="col-md-5 lista_turma_profile">
          <center>
            <span style="font-weight:bold;font-size:18px;">{$turma2["turma"]}</span><br><br>
          </center>
        </div>
        {/foreach}
      </div>
      {else}
      <div class="col-md-8" style="border:1px solid black;border-radius:5px;margin:15px">
        <h6>Sem turmas para este aluno no momento!</h6>
      </div>
      {/if}
      {/if}


      <a href="index.php?pag=painel_jogador" class="btn btn-outline btn-success" style="margin:5px;">
        <i class="fa fa-backward fa-1x"></i> Voltar
      </a>
    </div>

    {else}
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
          <div class="alert alert-success" id="mssg3" role="alert">Senha alterada com sucesso!</div>
          {else}
          <div class="alert alert-danger" id="mssg4" role="alert">Senha incorreta!</div>
          {/if}
          {/if}
          <label for="atual_pass" id="atual_pass_lb" style="display:none">Senha Atual</label>
          <input type="password" id="atual_pass" name="atual_pass" style="display:none" required="required">
          <label for="new_pass" id="new_pass_lb" style="display:none">Nova Senha</label>
          <input type="password" id="new_pass" name="new_pass" style="display:none" required="required">
          <div class="col-md-2">
            <input class="btn btn-outline btn-success" type="submit" id="salva_pass" style="margin:10px 0;display:none" value="Salvar">
            <a class="btn btn-outline btn-danger" id="alt_senha" style="" onclick="mostra()">Alterar senha</a>
            <a class="btn btn-outline btn-danger" id="cancel_pass" style="display:none" onclick="oculta()">Cancelar</a>
          </div><br>
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
    {/if}
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

setInterval(function(){
  $("#mssg").delay(4000).hide("slow");
  $("#mssg2").delay(4000).hide("slow");
  $("#mssg3").delay(5000).hide("slow");
  $("#mssg4").delay(5000).hide("slow");
}, 4000);

function mostra_img(){
  $("#container_alt_img").show("slow");
  $("#botao_oculta").show("slow");
  $("#span_altera").show("slow");
}

function oculta_img(){
  $("#container_alt_img").hide("slow");
  $("#botao_oculta").hide("slow");
  $("#span_altera").hide("slow");
}

function select_radio(id) {
  for (var i = 0; i <= 12; i++) {
      $("#img_"+i).css('border', '0px solid #9c1513');
  }
  document.getElementById("c"+id).checked = true;
  $("#img_"+id).css('border', '3px solid #9c1513');

}

function select_radio2(id) {
  for (var r = 10; r <= 21; r++) {
      $("#img2_"+r).css('border', '0px solid #9c1513');
  }
  document.getElementById("p"+id).checked = true;
  $("#img2_"+id).css('border', '3px solid #9c1513');

}

</script>

<br>
<br>
<br>
<br>
<br>
<!-- {$usuario|var_dump} -->
