<div id="wrapper" style="background:tomato">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Visão Geral</h1>
      </div>
    </div>
    <!-- /.row -->
    <div class="row">
      <!--BOX IMPLEMENTAÇÃO FUTURA DE TROCA DE MENSAGENS ENTRE ALUNO E PROFESSOR-->
      <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-comments fa-5x"></i>
              </div>
              <div class="col-xs-9 text-right">

                <div class="huge">0</div>
                <div>Novas mensagens!</div>
              </div>
            </div>
          </div>
          <a href="#">
            <div class="panel-footer">
              <span class="pull-left">Ver Detalhes</span>
              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
              <div class="clearfix"></div>
            </div>
          </a>
        </div>
      </div>
      <!--FIM - IMPLEMENTAÇÃO FUTURA DE TROCA DE MENSAGENS ENTRE ALUNO E PROFESSOR-->

      <!--BOX QUANTIDADE DE QUIZES DO PROFESSOR-->
      <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-tasks fa-5x"></i>
              </div>
              <div class="col-xs-9 text-right">
                <div class="huge">12</div>
                <div>Meus Quizes!</div>
              </div>
            </div>
          </div>
          <a href="#">
            <div class="panel-footer">
              <span class="pull-left">Acessar</span>
              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
              <div class="clearfix"></div>
            </div>
          </a>
        </div>
      </div>
      <!--FIM - BOX QUANTIDADE DE QUIZES DO PROFESSOR-->

      <!--BOX QUANTIDADE DE TURMAS DO PROFESSOR-->
      <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">

              </div>
              <div class="col-xs-9 text-right">
                <div class="huge">124</div>
                <div>Minhas Turmas!</div>
              </div>
            </div>
          </div>
          <a href="#">
            <div class="panel-footer">
              <span class="pull-left">Acessar</span>
              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
              <div class="clearfix"></div>
            </div>
          </a>
        </div>
      </div>
      <!--FIM - BOX QUANTIDADE DE TURMAS DO PROFESSOR-->

      <!--BOX QUANTIDADE DE ALUNOS DO PROFESSOR-->
      <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">

              </div>
              <div class="col-xs-9 text-right">
                <div class="huge">13</div>
                <div>Meus Alunos!</div>
              </div>
            </div>
          </div>
          <a href="#">
            <div class="panel-footer">
              <span class="pull-left">Acessar</span>
              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
              <div class="clearfix"></div>
            </div>
          </a>
        </div>
      </div>
      <!--FIM - BOX QUANTIDADE DE ALUNOS DO PROFESSOR-->
    </div>
    <!-- /.row -->
    <div class="row">
      <!-- PAINEL DE MEUS QUIZES -->
      <div class="col-lg-8">
        <div class="panel panel-default">
          <div class="panel-heading">
            Meus Quizes!
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <form role="form" action="index_base.php?pag=menu_quiz" method="POST">
              <!-- {$resultados|var_dump} -->
              {foreach from=$resultados item=quiz}
              <div class="col-lg-4">
                <div class="panel panel-success">
                  <div class="panel-heading">
                    Quiz {$objeto["ID_QUIZ"]}
                    <!-- <?php 	echo $aux['ID_QUIZ'];
                    echo "<input type='hidden' name='id-quiz' value=".$aux['ID_QUIZ'].">";
                    ?> -->
                  </div>
                  <div class="panel-body">
                    <!-- {$aux['DESCRICAO']|var_dump} -->
                    <h1>{$objeto["DESCRICAO"]}</h1>
                    <p>
                      Data de Início: {$objeto["DT_INICIO"]}<br/>
                      Data de Fim: {$objeto["DT_FIM"]}<br/>
                      Turma: {$objeto["SIGLA"]}<br/>
                      <input type='hidden' name='id-turma' value="{$objeto["ID_TURMA"]}">
                      <input type='hidden' name='id-quiz' value="{$objeto["ID_QUIZ"]}">



                    </p>
                  </div>
                  <div class="panel-footer">
                    <button type="submit" name="enviar" value="jogar" class="btn btn-outline btn-success"><i class="fa fa-play fa-1x"></i></button>
                    <button type="submit" name="enviar" value="relat" class="btn btn-outline btn-success"><i class="fa fa-book fa-1x"></i></button>
                    <button type="submit" name="enviar" value="edita" class="btn btn-outline btn-success"><i class="fa fa-edit fa-1x"></i></button>
                    <button type="submit" name="enviar" value="apaga" class="btn btn-outline btn-success"><i class="fa fa-trash-o fa-1x"></i></button>
                  </div>
                </div>
              </div>
              {/foreach}
              <!-- /.col-lg-4 -->
            </form>
            <?php
            ?>




          </div>
          <!-- /.panel-body -->
        </div>
        <!-- /.panel -->

      </div>
      <!-- /.col-lg-8 -->

      <!-- IMPLEMENTAÇÃO FUTURA DO PAINEL DE NOTIFICAÇÕES DO PROFESSOR-->
      <div class="col-lg-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fa fa-bell fa-fw"></i> Notifications Panel - Em breve!
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <div class="list-group">
              <a href="#" class="list-group-item">
                <i class="fa fa-comment fa-fw"></i> New Comment
                <span class="pull-right text-muted small"><em>4 minutes ago</em>
                </span>
              </a>
              <a href="#" class="list-group-item">
                <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                <span class="pull-right text-muted small"><em>12 minutes ago</em>
                </span>
              </a>
              <a href="#" class="list-group-item">
                <i class="fa fa-envelope fa-fw"></i> Message Sent
                <span class="pull-right text-muted small"><em>27 minutes ago</em>
                </span>
              </a>
              <a href="#" class="list-group-item">
                <i class="fa fa-tasks fa-fw"></i> New Task
                <span class="pull-right text-muted small"><em>43 minutes ago</em>
                </span>
              </a>
              <a href="#" class="list-group-item">
                <i class="fa fa-upload fa-fw"></i> Server Rebooted
                <span class="pull-right text-muted small"><em>11:32 AM</em>
                </span>
              </a>
              <a href="#" class="list-group-item">
                <i class="fa fa-bolt fa-fw"></i> Server Crashed!
                <span class="pull-right text-muted small"><em>11:13 AM</em>
                </span>
              </a>
              <a href="#" class="list-group-item">
                <i class="fa fa-warning fa-fw"></i> Server Not Responding
                <span class="pull-right text-muted small"><em>10:57 AM</em>
                </span>
              </a>
              <a href="#" class="list-group-item">
                <i class="fa fa-shopping-cart fa-fw"></i> New Order Placed
                <span class="pull-right text-muted small"><em>9:49 AM</em>
                </span>
              </a>
              <a href="#" class="list-group-item">
                <i class="fa fa-money fa-fw"></i> Payment Received
                <span class="pull-right text-muted small"><em>Yesterday</em>
                </span>
              </a>
            </div>
            <!-- /.list-group -->
            <a href="#" class="btn btn-default btn-block">View All Alerts</a>
          </div>
          <!-- /.panel-body -->
        </div>


        <!-- /.panel -->
        <div class="chat-panel panel panel-default">
          <div class="panel-heading">
            <i class="fa fa-comments fa-fw"></i> Chat - Em Breve!
            <div class="btn-group pull-right">
              <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-chevron-down"></i>
              </button>
              <ul class="dropdown-menu slidedown">
                <li>
                  <a href="#">
                    <i class="fa fa-refresh fa-fw"></i> Refresh
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-check-circle fa-fw"></i> Available
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-times fa-fw"></i> Busy
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-clock-o fa-fw"></i> Away
                  </a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="#">
                    <i class="fa fa-sign-out fa-fw"></i> Sign Out
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <ul class="chat">
              <li class="left clearfix">
                <span class="chat-img pull-left">
                  <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                </span>
                <div class="chat-body clearfix">
                  <div class="header">
                    <strong class="primary-font">Jack Sparrow</strong>
                    <small class="pull-right text-muted">
                      <i class="fa fa-clock-o fa-fw"></i> 12 mins ago
                    </small>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                  </p>
                </div>
              </li>
              <li class="right clearfix">
                <span class="chat-img pull-right">
                  <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                </span>
                <div class="chat-body clearfix">
                  <div class="header">
                    <small class=" text-muted">
                      <i class="fa fa-clock-o fa-fw"></i> 13 mins ago</small>
                      <strong class="pull-right primary-font">Bhaumik Patel</strong>
                    </div>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                    </p>
                  </div>
                </li>
                <li class="left clearfix">
                  <span class="chat-img pull-left">
                    <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                  </span>
                  <div class="chat-body clearfix">
                    <div class="header">
                      <strong class="primary-font">Jack Sparrow</strong>
                      <small class="pull-right text-muted">
                        <i class="fa fa-clock-o fa-fw"></i> 14 mins ago</small>
                      </div>
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                      </p>
                    </div>
                  </li>
                  <li class="right clearfix">
                    <span class="chat-img pull-right">
                      <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                    </span>
                    <div class="chat-body clearfix">
                      <div class="header">
                        <small class=" text-muted">
                          <i class="fa fa-clock-o fa-fw"></i> 15 mins ago</small>
                          <strong class="pull-right primary-font">Bhaumik Patel</strong>
                        </div>
                        <p>
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                        </p>
                      </div>
                    </li>
                  </ul>
                </div>
                <!-- /.panel-body -->
                <div class="panel-footer">
                  <div class="input-group">
                    <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                    <span class="input-group-btn">
                      <button class="btn btn-warning btn-sm" id="btn-chat">
                        Send
                      </button>
                    </span>
                  </div>
                </div>
                <!-- /.panel-footer -->
              </div>
              <!-- /.panel .chat-panel -->
            </div>
            <!-- /.col-lg-4 -->
            <!-- FIM - IMPLEMENTAÇÃO FUTURA DO PAINEL DE NOTIFICAÇÕES DO PROFESSOR-->
          </div>
          <!-- /.row -->
        <!-- /#page-wrapper -->

      </div>
