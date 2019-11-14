<div class="container" id="user_front_container" style="color:#ddd">
  <div class="fb-profile col-md-12 col-sm-8">
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


    {if $avatar_usuario}
    <div style="margin-bottom:-50px;">
      {if $visita != 1}
      <a style="cursor:pointer" onclick="mostra_img_avatar()" id="botao_mostra_avatar">
        {else}
        <a>
        {/if}
        <img align="left" class="img_edit_avatar_pf"  src='admin-dev/img/avatar/base/b{$avatar_usuario["base"]}.png' alt="Profile image example">
        <img align="left" class="img_edit_avatar_pf"  src='admin-dev/img/avatar/pele/p{$avatar_usuario["pele"]}.png' alt="Profile image example">
        <img align="left" class="img_edit_avatar_pf"  src='admin-dev/img/avatar/olhos/o{$avatar_usuario["olho"]}.png' alt="Profile image example">
        <img align="left" class="img_edit_avatar_pf"  src='admin-dev/img/avatar/boca/b{$avatar_usuario["boca"]}.png' alt="Profile image example">
        <img align="left" class="img_edit_avatar_pf"  src='admin-dev/img/avatar/roupa/r{$avatar_usuario["roupa"]}.png' alt="Profile image example">
        <img align="left" class="img_edit_avatar_pf"  src='admin-dev/img/avatar/cabelo/c{$avatar_usuario["cabelo"]}.png' alt="Profile image example">
        {if $visita != 1}
        <div class="btn btn-outline btn-info" style="margin-left: 5px;margin-top:25px;position:absolute"><i class="fa fa-pencil" aria-hidden="true"></i></div>
        {/if}
      </a>
    </div>
    <!-- capa perfil -->
        <img align="left"class="fb-image-lg" src="{$img_capa}" alt="Profile image example"/>
        {if $visita != 1}
        <a class="btn btn-outline btn-info" style="z-index:999;position:absolute" onclick="mostra_img()" id="botao_mostra"><i class="fa fa-pencil" aria-hidden="true"></i></a>
        {/if}
    {else}
    <img align="left"class="fb-image-lg" src="{$img_capa}" alt="Profile image example"/>
    {if $visita != 1}
    <a class="btn btn-outline btn-info" style="z-index:999;position:absolute" onclick="mostra_img()" id="botao_mostra"><i class="fa fa-pencil" aria-hidden="true"></i></a>
    {/if}
      <img align="left" class="fb-image-profile thumbnail" src="{$img_perfil}" alt="Profile image example">
      {if $visita != 1}
        <a class="btn btn-outline btn-info" onclick="mostra_img_avatar()" id="botao_mostra_avatar"><i class="fa fa-pencil" aria-hidden="true"></i></a>
        {/if}
      </img>
    {/if}





      <div class="col-md-12 container_edit_avatar" style="display:none" id="container_alt_avatar">
        <h4> Edição de seu avatar</h4>
        <form id="upd_avatar_form" action="index.php?pag=profile" method="POST">

          <input type="hidden" id="update_avatar" name="update_avatar" value="1">
          <div class="">

            <div class="col-md-4 col_avatar_big">
              {if $avatar_usuario}
              <img align="left" class="img_edit_avatar" id="a_base" src='admin-dev/img/avatar/base/b{$avatar_usuario["base"]}.png' alt="Profile image example">
              <img align="left" class="img_edit_avatar" id="a_pele" src='admin-dev/img/avatar/pele/p{$avatar_usuario["pele"]}.png' alt="Profile image example">
              <img align="left" class="img_edit_avatar" id="a_olho" src='admin-dev/img/avatar/olhos/o{$avatar_usuario["olho"]}.png' alt="Profile image example">
              <img align="left" class="img_edit_avatar" id=a_boca src='admin-dev/img/avatar/boca/b{$avatar_usuario["boca"]}.png' alt="Profile image example">
              <img align="left" class="img_edit_avatar" id="a_roupa" src='admin-dev/img/avatar/roupa/r{$avatar_usuario["roupa"]}.png' alt="Profile image example">
              <img align="left" class="img_edit_avatar" id="a_cabelo" src='admin-dev/img/avatar/cabelo/c{$avatar_usuario["cabelo"]}.png' alt="Profile image example">
              {else}
              <img align="left" class="img_edit_avatar" id="a_base" src="admin-dev/img/avatar/base/b1.png" alt="Profile image example">
              <img align="left" class="img_edit_avatar" id="a_pele" src="admin-dev/img/avatar/pele/p3.png" alt="Profile image example">
              <img align="left" class="img_edit_avatar" id="a_olho" src="admin-dev/img/avatar/olhos/o4.png" alt="Profile image example">
              <img align="left" class="img_edit_avatar" id="a_cabelo" src="admin-dev/img/avatar/cabelo/c1.png" alt="Profile image example">
              <img align="left" class="img_edit_avatar" id=a_boca src="admin-dev/img/avatar/boca/b3.png" alt="Profile image example">
              <img align="left" class="img_edit_avatar" id="a_roupa" src="admin-dev/img/avatar/roupa/r1.png" alt="Profile image example">
              {/if}
            </div>

            <div class="col-md-8 col_edit_big" style="min-height: 350px;">
              <div class="tabbable" id="">
                <ul class="nav nav-tabs" style="color:#333">
                  <li class="nav-item">
                    <a class="nav-link" href="#tab1" data-toggle="tab">Background</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#tab2" data-toggle="tab">Tom de pele</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#tab3" data-toggle="tab">Cabelo</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#tab4" data-toggle="tab">Tipo de olho</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#tab5" data-toggle="tab">Tipo de boca</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#tab6" data-toggle="tab">Tipo de roupa</a>
                  </li>
                </ul>
                <div class="tab-content" style="color:#333;">
                  <div class="tab-pane active" id="tab1">
                    {for $x=1 to 8}
                    <div class="mobile">
                      <a onclick="select_radio_base({$x})">
                        <img class="img_each_data" id="base_{$x}" src="admin-dev/img/avatar/base/b{$x}.png">
                      </a>
                      <input type="radio" value="{$x}" id="bs_{$x}" name="base_radio" style="display:none">
                    </div>
                    {/for}
                  </div>
                  <div class="tab-pane" id="tab2">
                    {for $x=1 to 4}
                    <div class="mobile">
                      <a onclick="select_radio_pele({$x})">
                        <img class="img_each_data" id="pele_{$x}" src="admin-dev/img/avatar/pele/p{$x}.png">
                      </a>
                      <input type="radio" value="{$x}" id="pl_{$x}" name="pele_radio" style="display:none">
                    </div>
                    {/for}
                  </div>
                  <div class="tab-pane" id="tab3">
                    {for $x=1 to 8}
                    <div class="mobile">
                      <a onclick="select_radio_cabelo({$x})">
                        <img class="img_each_data" id="cabelo_{$x}" src="admin-dev/img/avatar/cabelo/c{$x}.png">
                      </a>
                      <input type="radio" value="{$x}" id="ca_{$x}" name="cabelo_radio" style="display:none">
                    </div>
                    {/for}
                  </div>
                  <div class="tab-pane" id="tab4">
                    {for $x=1 to 8}
                    <div class="mobile">
                      <a onclick="select_radio_olho({$x})">
                        <img class="img_each_data" id="olho_{$x}" src="admin-dev/img/avatar/olhos/o{$x}.png">
                      </a>
                      <input type="radio" value="{$x}" id="ol_{$x}" name="olho_radio" style="display:none">
                    </div>
                    {/for}
                  </div>
                  <div class="tab-pane" id="tab5">
                    {for $x=1 to 8}
                    <div class="cont_over mobile">
                      <a onclick="select_radio_boca({$x})">
                        <img class="img_each_data" class="att_avatar" id="boca_{$x}" src="admin-dev/img/avatar/boca/b{$x}.png">
                      </a>
                      <input type="radio" value="{$x}" id="bo_{$x}" name="boca_radio" style="display:none">
                    </div>
                    {/for}
                  </div>
                  <div class="tab-pane" id="tab6">
                    {for $x=1 to 8}
                    <div class="mobile">
                      <a onclick="select_radio_roupa({$x})">
                        <img class="img_each_data" src="admin-dev/img/avatar/roupa/r{$x}.png">
                      </a>
                      <input type="radio" value="{$x}" id="ro_{$x}" id="roupa_{$x}" name="roupa_radio" style="display:none">
                    </div>
                    {/for}
                  </div>
                </div>
              </div>
            </div>

          </div>

          <center style="margin-bottom:5px">
            <a class="btn btn-outline btn-danger" style="margin:5px" onclick="oculta_img_avatar()" id="botao_oculta_avatar">Cancelar</a>
            <button type="submit" class="btn btn-outline btn-success" style="margin:5px">Salvar</button>
          </center>


      </form>

      </div>

      <div class="col-md-12" id="container_alt_img">
        <form id="upd_cover_form" action="index.php?pag=profile" method="POST">
          <input type="hidden" id="update_cover" name="update_cover" value="1">
        <center><h4>Alterar Capa:</h4></center>
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

        <!-- <center><h4>Perfil:</h4></center>
        <div class="div_images" style="background:#555;">
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
        </div> -->
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

          {if $pt_user}
          {foreach $pt_user as $level}
          {assign var=total_pontos value=$level["pontos"]}
          {/foreach}
          {if $total_pontos > 10}
          <div class="" id="conquistas_profile">
            <img src="admin-dev/img/conquistas/4.png" class="img_conquistas" style="width:70px;weight:80px" title="Subiu de nivel pela primeira vez!">
          </div>
          {/if}
          {/if}

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
function mostra_img_avatar(){
  $("#container_alt_avatar").show("slow");
  $("#botao_oculta_avatar").show("slow");
}

function oculta_img(){
  $("#container_alt_img").hide("slow");
  $("#botao_oculta").hide("slow");
}

function oculta_img_avatar(){
  $("#container_alt_avatar").hide("slow");
  $("#botao_oculta_avatar").hide("slow");
}

function select_radio(id) {
  for (var i = 0; i <= 12; i++) {
      $("#img_"+i).css('border', '0px solid #9c1513');
  }
  document.getElementById("c"+id).checked = true;
  $("#img_"+id).css('border', '3px solid #9c1513');

}

function select_radio_base(id){
  for (var r = 0; r <= 8; r++) {
      $("#base_"+r).css('border', '0px solid #9c1513');
  }
  document.getElementById("bs_"+id).checked = true;
  $("#base_"+id).css('border', '3px solid #9c1513');
  var bs = document.getElementById("a_base");
  bs.setAttribute("src", "admin-dev/img/avatar/base/b"+id+".png");
}

function select_radio_pele(id){
  for (var r = 0; r <= 4; r++) {
      $("#pele_"+r).css('border', '0px solid #9c1513');
  }
  document.getElementById("pl_"+id).checked = true;
  $("#pele_"+id).css('border', '3px solid #9c1513');
  var bs = document.getElementById("a_pele");
  bs.setAttribute("src", "admin-dev/img/avatar/pele/p"+id+".png");
}

function select_radio_olho(id){
  for (var r = 0; r <= 8; r++) {
      $("#olho_"+r).css('border', '0px solid #9c1513');
  }
  document.getElementById("ol_"+id).checked = true;
  $("#olho_"+id).css('border', '3px solid #9c1513');
  var bs = document.getElementById("a_olho");
  bs.setAttribute("src", "admin-dev/img/avatar/olhos/o"+id+".png");
}

function select_radio_boca(id){
  for (var r = 0; r <= 8; r++) {
      $("#boca_"+r).css('border', '0px solid #9c1513');
  }
  document.getElementById("bo_"+id).checked = true;
  $("#boca_"+id).css('border', '3px solid #9c1513');
  var bs = document.getElementById("a_boca");
  bs.setAttribute("src", "admin-dev/img/avatar/boca/b"+id+".png");
}

function select_radio_roupa(id){
  for (var r = 0; r <= 8; r++) {
      $("#roupa_"+r).css('border', '0px solid #9c1513');
  }
  document.getElementById("ro_"+id).checked = true;
  $("#roupa_"+id).css('border', '3px solid #9c1513');
  var bs = document.getElementById("a_roupa");
  bs.setAttribute("src", "admin-dev/img/avatar/roupa/r"+id+".png");
}

function select_radio_cabelo(id){
  for (var r = 0; r <= 8; r++) {
      $("#cabelo_"+r).css('border', '0px solid #9c1513');
  }
  document.getElementById("ca_"+id).checked = true;
  $("#cabelo_"+id).css('border', '3px solid #9c1513');
  var bs = document.getElementById("a_cabelo");
  bs.setAttribute("src", "admin-dev/img/avatar/cabelo/c"+id+".png");
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
