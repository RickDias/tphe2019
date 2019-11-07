    <!-- left side start-->
		<head>
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!-- Custom CSS -->
		<link href="theme/default/css/style.css" rel='stylesheet' type='text/css' />
		<!-- webfonts -->
		<link href='//fonts.googleapis.com/css?family=Nunito:400,700,300' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=Francois+One' rel='stylesheet' type='text/css'>
		 <!-- Meters graphs -->
		<script src="theme/default/js/jquery-1.11.1.min.js"></script>
		<!-- Placed js at the end of the document so the pages load faster -->
		</head>
		<!-- left side end-->
		<!-- main content start-->
		<div class="col-md-10 col-sm-12">
			<!-- header-starts -->
			<div style="padding:15px 0 0 15px">
				<h2>painel do aluno</h2>
			</div>
			<div id="page-wrapper">
				<div class="top-grids">
					<div class="top-grids-info">
						<!-- top-grid-left -->
						<div class="col-md-9 top-grid-left" >
							<!-- top-big-grids -->
							<div class="top-big-grids">
                <!-- cima a baiso esquerda -->
								<div class="col-md-12 top-grid-left-left" style="background:;">
                  <!-- div grande -->
									<!-- <div class="top-grid-left-left-grids"style="background:tomato">
										<div class="col-md-8 top-grid-left-img">
											<div data-video="Bzt6h5uFWOU" id="video">
												<img src="theme/default/images/f12.jpg" alt="Use your own screenshot.">
											</div>
										</div>
										<div class="col-md-4 top-grid-left-info">
											<a class="text" href="single.html">Fusce ornare congue ligula vel placerat</a>
											<p>Nam id sollicitudin felis. Nulla non bibendum arcu. Vestibulum non venenatis risus.Suspendisse venenatis venenatis mi.</p>
											<div class="t-grid">
												<ul>
													<li><a href="#"><i class="fa fa-clock-o"></i> 2h</a></li>
													<li><a href="#"><i class="fa fa-user"></i> Ornare Congue</a></li>
												</ul>
											</div>
										</div>
										<div class="clearfix"> </div>
									</div> -->
									<!-- three-grids -->
									<div class="three-grids">
                    <!-- menor para foreach -->
										<div class="col-md-12" style="margin-bottom:15px;background:;padding: 15px;border:1px solid gray;border-radius:3px;">
											<h3>Quizes liberados pelo professor</h3>
											{if $resultados->num_rows > 0}
											{foreach key=$key from=$resultados item=$jogo}
											<!-- {$jogo|var_dump} -->
											<div class="col-md-4">
												<div class="three-grid-img">
													<a href="#"><img src="theme/default/images/c{rand(1,15)}.jpg" alt="" /></a>
												</div>
												<div class="three-grid-text"  style="border:1px solid silver;">
													<div class="three-grid-text-heading">
														<a class="text" href="index.php?pag=jogo&jogo=quiz">{$jogo["DESCRICAO"]} - {$jogo["SIGLA"]}</a>
													</div>
													<div class="t-grid author-grid">
														<ul>
															<li><a href="#"><i class="fa fa-clock-o"></i> 30s</a></li>
															<li><a href="#"><i class="fa fa-user"></i> {$jogo["NOME"]}</a></li>
														</ul>
													</div>
												</div>
											</div>
											{/foreach}
											{else}
											<span>Não há quizes liberados no momento!</span>
											{/if}
										</div>

										<!-- individuais teste -->
										<div class="col-md-12" style="background:;padding: 15px;border:1px solid gray;border-radius:3px;">
											<h3>Quizes individuais disponíveis</h3>
											{if $resultados_ind->num_rows > 0}
											{foreach key=$key from=$resultados_ind item=$jogo_ind}
											<!-- {$jogo_ind|var_dump} -->
											<div class="col-md-4">
												<div class="three-grid-img">
													<a href="#"><img src="theme/default/images/g{rand(1,15)}.jpg" alt="" /></a>
												</div>
												<div class="three-grid-text"  style="border:1px solid silver;">
													<div class="three-grid-text-heading">
														<a class="text" href="index.php?pag=jogo&jogo=quiz">{$jogo_ind["DESCRICAO"]}</a>
													</div>
													<div class="t-grid author-grid">
														<ul>
															<li><a href="#"><i class="fa fa-clock-o"></i> 30s</a></li>
															<li><a href="#"><i class="fa fa-user"></i> {$jogo_ind["NOME"]}</a></li>
														</ul>
													</div>
												</div>
											</div>
											{/foreach}
											{else}
											<span>Não há quizes liberados no momento!</span>
											{/if}
										</div>

                    <!-- nada aqui -->
										<div class="clearfix"></div>
									</div>
									<!-- //three-grids -->
									<!-- two-grids -->
									<div class="two-grids"style="background:;padding: 15px;border:1px solid gray;border-radius:3px;">
                    <!-- divs mais longas para foreach -->
										<h3>Avisos</h3>
										<div class="col-md-6 two-grid-left" >
											<div class="two-grid-info">
												<div class="two-grid-img">
													<a href="#"><img src="theme/default/images/motor{rand(1,13)}.jpg" alt="" /></a>
												</div>
												<div class="two-grid-text">
													<div class="three-grid-text-heading two-grid-text-heading">
														<a class="text" href="#">Aula no dia 12/10</a>
														<p style="color:black">Pessoal, relembrando que no dia 12/10 será dia letivo com o horário da nossa aula. Faremos testes com os Quizes disponíveis para encontrar
														 possíveis falhas. Aguardo vocês lá!!!</p>
													</div>
													<div class="t-grid author-grid two-grid-author">
														<ul>
															<li><a href="#"><i class="fa fa-clock-o"></i> 16:20min</a></li>
															<li><a href="#"><i class="fa fa-user"></i> Karlise</a></li>
														</ul>
													</div>
												</div>
											</div>
										</div>

										<div class="clearfix"> </div>
									</div>
									<!-- //two-grids -->
									<!-- more-news -->

									<!-- //more-news -->
								</div>
								<div class="clearfix"> </div>
							</div>
							<!-- //top-big-grids -->
						</div>
						<!-- //top-grid-left -->
						<!-- top-grid-right -->
						<div class="col-md-3 top-grid-right" style="background:">
              <!-- ultimos avisos -->
              <div class="more-news">
                <div class="more-news-heading">
                  <h3>Ultimos avisos</h3>
                </div>
                <div class="more-news-grids">
                  <div class="col-md-12 more-news-left">
                    <div class="news-grids-bottom">
                      <!-- date -->
                      <div id="design" class="date">
                        <div id="cycler">
													{foreach key=$key from=$avisos item=$aviso}
                          <div class="date-text">
														<!-- {$aviso|var_dump} -->
                            <h4>{$usuario[$key][0]->nome}</h4>
														<!-- <small class="pull-right text-muted">
		                          <i class="fa fa-clock-o fa-fw"></i> 12 mins ago
		                        </small> -->
                            <ul>
                              <li><i class="fa fa-arrow-right"></i> {$aviso->getMensagem()}</li>
                              <li><a href="#"><i class="fa fa-play-circle-o"></i> Ver Mensagem</a></li>
                            </ul>
                          </div>
                    			{/foreach}
                        </div>
                        <script>
                          function cycle($item, $cycler){
                            setTimeout(cycle, 8000, $item.next(), $cycler);

                            $item.slideUp(1000,function(){
                              $item.appendTo($cycler).show();
                            });

                            }
                          cycle($('#cycler div:first'),  $('#cycler'));
                        </script>
                      </div>
                      <!-- //date -->
                    </div>
                  </div>
                  <div class="clearfix"> </div>
                </div>
              </div>
              <!-- /ultimos avisos -->


						<div class="clearfix"> </div>

						</div>
						<!-- player-rank -->
						<div class="player-rank col-md-3">
							<div class="ranking-heading">
								<h3>Top 10 Jogadores</h3>
							</div>
							{if $jogadores}
							{foreach key=$key from=$jogadores item=$jogador}
							<!-- {$jogador[0]|var_dump} -->
							{assign var=total_pontos value=$jogador[0]["pontos"]}
			        {assign var=total_level value=1}
			        {if $total_pontos < 10}
			          {$total_level = 1}
			        {else}
			          {$total_level = $total_pontos/5}
			        {/if}
							<a href="index.php?pag=profile&visita=1&id_user={$jogador[0]["ID_USUARIO"]}" style="color:#222">
								<div class="classejogador">
									<span style="font-weight:bold;text-transform: uppercase;">
										<img class="img_avatar_rank" src="admin-dev/img/{$jogador[0]["ID_USUARIO"]}.jpg">
										{$jogador[0]["NOME"]}
									</span><br>
									<i class="fa fa-arrow-right"></i><span style="font-weight:bold"> {$jogador[0]["pontos"]} pontos</span> - <span style="font-size:12px">Lv {$total_level|intval}</span><br>
									<span class="text-muted" style="font-size:13px"><i class="fa fa-clock-o fa-fw"></i> Ultimo jogo - há {mt_rand(1,5)} dias</span>
								</div>
							</a>
							{/foreach}
							{/if}
						</div>
						<!-- //player-rank -->
						<!-- //top-grid-right -->

						<div class="clearfix"> </div>
					</div>
          <div>
            <!-- more-sports -->
            <!-- <div class="more-sports col-md-8">


              <div class="more-sports-heading">
                <h3>More Information</h3>
              </div>
              <div class="more-sports-grids">
                <!-- foreach extra -->
                <!-- <div class="col-md-4 more-sports-grid">
                  <div class="more-grids">
                    <div class="col-md-6 more-grid-left">
                      <a href="index.html"><img src="theme/default/images/f15.jpg" alt="" /></a>
                    </div>
                    <div class="col-md-6 more-grid-right">
                      <div class="more-grid-right-top">
                        <a href="index.html">Lorem ipsum dolor sit amet</a>
                      </div>
                      <div class="more-grid-right-bottom">
                        <a href="index.html">Football</a>
                      </div>
                    </div>
                    <div class="clearfix"> </div>
                  </div>
                </div> -->
                <!-- /foreach extra -->

                <!-- <div class="clearfix"> </div>
              </div>
            </div> -->
            <!-- //more-sports -->

          </div>

				</div>
			</div>


		</div>


      <!-- main content end-->
	<!-- <script src="theme/default/js/modernizr.custom.js"></script> -->
	<!--pop-up-->
	<!-- <script src="theme/default/js/menu_jquery.js"></script> -->
	<!--//pop-up-->
	<script src="theme/default/js/jquery.nicescroll.js"></script>
	<!-- <script src="theme/default/js/scripts.js"></script> -->
	<!-- Bootstrap Core JavaScript -->
	<!-- <script src="theme/default/js/bootstrap.min.js"></script> -->
	<!--pop-up-->
	<!--//pop-up-->
	<!-- clock-bottom -->

	<!-- clock-bottom -->
	<!-- ResponsiveTabs -->
	<!-- <script src="theme/default/js/easyResponsiveTabs.js" type="text/javascript"></script> -->

	<!-- //ResponsiveTabs -->
	<!-- video -->
	<!-- <script src="theme/default/js/simplePlayer.js"></script> -->

	<!-- //video -->
