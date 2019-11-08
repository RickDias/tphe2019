  <div class="col-md-10">
      <!-- nome -->
      <div class="col-md-12" style="display:flex;flex-wrap:wrap;padding:15px;background:#333">
        <div style="background:#555" class="col-md-12">
          <span style="font-weight:bold;font-size:35px;color:#ddd">Ajuda</span>
        </div>

        <div style="background:;padding:10px" class="col-md-12">
          <div class="col-md-12" id="text_conquista" style="background:;margin-bottom:5px;color:#ddd">
            <spa style="font-weight:bold"n><b>E</b>sta página foi desenvolvida para auxiliar com possíveis problemas...</span><br><br>
            <span id="" style="color:#aaa">
              Lembre-se, este sistema está com todas suas funcionalidades implantadas permitindo o uso de todas suas ferramentas.<br>
              Ainda assim <span style="color:#c96b6b">não está completo</span> e possui itens como textos e imagens em desenvolvimento.<br>
              Abaixo você verá soluções para <span style="color:#fed136">problemas</span> já relatados.
            </span>
          </div>
        </div>

        <div id="score_profile" class="col-sm-12 col-md-2">
          <div class="text_profile_level">
            <!-- Nível {$total_level|intval} -->
          </div>
        </div>
      </div>

    <div class="col-md-12 profile_sett" style="border-radius:0px">
      <div style="background:#555;margin-top:15px" class="col-md-12">
        <span style="font-weight:bold;font-size:35px;color:#ddd">Problemas relatados</span>
      </div>
      <div class="col-md-12" style="padding:0px 10px">
        {if $problemas}
        {foreach from=$problemas item=$problema}
      <div class="col-md-10 lista_turma_profile" style="padding:5px 15px">
        <center>
          <h5>Falha:</h5>
          <span style="font-weight:bold;font-size:12px;">{$problema["valor"]}</span><br><br>
          <img style="" class="img_ajuda" src="admin-dev/img/error/{$problema["id_img"]}.png" alt="Profile image example"/>
        </center>
      </div>
      {/foreach}
      {else}
      <div style="padding:25px 15px">
        Sem resultados...
      </div>
      {/if}
      </div>


      <a href="index.php?pag=painel_jogador" class="btn btn-outline btn-success" style="margin:5px;">
        <i class="fa fa-backward fa-1x"></i> Voltar ao inicio
      </a>
    </div>

  </div>
