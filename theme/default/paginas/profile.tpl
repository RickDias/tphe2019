<div class="container" id="user_front_container" style="color:#ddd">
  <div class="fb-profile">
    {if $msg}
    <div class="alert alert-success" role="alert" style="margin:10px">
      {$msg}
    </div>
    {/if}
    {if $msge}
    <div class="alert alert-danger" role="alert" style="margin:10px">
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
        Capas:
        <div class="div_images" style="background:#555">
          <!-- foreach -->
          <!-- {assign var=x value=0} -->
          {for $x=1 to 12}
          <div class="coluna4">
            <center>
              <img class="img_covers" src="admin-dev/img/{$x}.2.jpg" alt="Profile image example"/>
                <input type="radio" value="{$x}" id="{$x}" name="cover_radio">
            </center>
          </div>
          {/for}
        </div>

        Perfil:
        <div class="div_images" style="background:#555">
          <!-- foreach -->
          {for $y=10 to 21}
          <div class="coluna4">
            <center>
              <img class="img_profile" src="admin-dev/img/{$y}.jpg" alt="Profile image example"/>
              <input type="radio" value="{$y}" id="{$y}" name="profile_radio">
            </center>
          </div>
          {/for}
        </div>
        <a class="btn btn-outline btn-info" style="margin:5px" onclick="oculta_img()" id="botao_oculta">Cancelar</a>
        <button type="submit" class="btn btn-outline btn-success" style="margin:5px" onclick="oculta_img()" id="botao_oculta">Salvar</button>

      </form>

      </div>

      <script>
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

      </script>

      <!-- nome -->
      <div class="col-md-12" style="display:flex;flex-wrap:wrap;padding:15px;background:#333">
        <div style="background:#555" class="col-md-12">
          <span style="font-weight:bold;font-size:35px;background:">{$usuario[0]->nome}</span>
        </div>

        <div style="background:;padding:10px" class="col-md-10">
          <div class="col-md-12" style="font-weight:bold;background:;margin-bottom:5px">
            <h5>Conquistas</h5>
          </div>
          {if $conquistas}
          {foreach from=$conquistas item=$conquista}
          <div class="col-md-3" style="font-weight:bold;background:;margin:2px;padding:15px;">
              <img src="admin-dev/img/conquistas/{$conquista}.jpg" class="img_conquistas">
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

        <div style="background:;text-align:center;padding-top:35px;" class="col-md-2">
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
          <div class="" style="font-weight:bold;background:;width:90px;font-size:20px;">
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
      <div class="col-md-5" style="border:1px solid black;border-radius:5px;margin:15px;background:#333;color:#ddd;padding:5px;">
        <span>Turma: <span style="font-weight:bold;font-size:18px;">{$turma["turma"]}</span></span><br><br>
        Total de acertos: {$turma["acertos"]}<br>
        Pontuação nesta turma: {$turma["pontos"]}
        <!-- Sem dados para as turmas...<br><br> -->
        <!-- <h3>Quiz:{$turma["DESCRICAO"]}</h3><br> -->
        <!-- {foreach from=$pontos item=$ponto}
        {if $turma["ID_QUIZ"] == $ponto["id_quiz"]}
        {$ponto["id_quiz"]}
        <h7>Pontos{$ponto["pontos"]}:</h7><br>
        {/if}
        {/foreach} -->
      </div>
      {/foreach}
      </div>
      {else}
      <div class="col-md-8" style="border:1px solid black;border-radius:5px;margin:15px">
        <h6>Sem turmas para este aluno no momento!</h6>
      </div>
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
          <div class="alert alert-success" role="alert">Senha alterada com sucesso!</div>
          {else}
          <div class="alert alert-danger" role="alert">Senha incorreta!</div>
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
</script>

<br>
<br>
<br>
<br>
<br>
<!-- {$usuario|var_dump} -->
