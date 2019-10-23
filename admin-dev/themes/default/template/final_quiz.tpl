OKK
<div class="col-lg-12 col-md-8">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-comments fa-5x"></i>
              </div>
              <div class="col-xs-6 text-center">
                <div><h2>Pontuação Final</h2></div>
              </div>
              <div class="col-xs-3 text-right">
                <div class="huge">{count($result)}</div>
              </div>
            </div>
          </div>
            <div class="panel-footer">
              <div class="row">
                <div class="col-xs-4 text-center">
                  <h3>Jogador</h3>
                </div>
                <div class="col-xs-4 text-center">
                  <h3>Pontuação</h3>
                </div>
                <div class="col-xs-4 text-center">
                  <h3>Outro dado</h3>
                </div>
              </div>
              {foreach from=$result key=$key item=$res}
              <div class="col-xs-4 text-center">
                {$res["NOME"]}
              </div>
              <div class="col-xs-4 text-center">
                {$res["pontos_geral"]}
              </div>
              <div class="col-xs-4 text-center">
                Add caso precise
              </div>
              {/foreach}
              <a href="index_base.php">
                <div class="col-xs-4 pull-right">
                  <span class="pull-left">Concluir</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                </div>
              </a>
              <div class="clearfix"></div>
            </div>
        </div>
      </div>
<!-- {$res|var_dump} -->
