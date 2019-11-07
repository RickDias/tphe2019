
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-green">
      <!-- VER PERGUNTAS -->
			<div class="panel-heading">
				ID_QUIZ: #{Tools::getValue('id-quiz')} - TURMA: #{Tools::getValue('id-turma')}
			</div>
			<!-- .panel-heading -->
			<div class="panel-body">
				<div class="panel-group" id="accordion">
          {foreach from=$resultados item=$aux}
								<!-- <div class='panel panel-red'> -->
								<!-- <div class='panel panel-default'> -->

							<div class="panel-heading">
								<h4 class="panel-title">
											<a data-toggle='collapse' data-parent='#accordion' href='#collapse{$aux['ID_PERGUNTA']}'>
											ID_PERGUNTA: #{$aux['ID_PERGUNTA']}
									</a>
								</h4>
							</div>
							<div id="collapse{$aux['ID_PERGUNTA']}" class="panel-collapse collapse in">
								<div class="panel-body">
									<blockquote>
										{$aux['TEXTO']}


                    {foreach from=$respostas item=$auxResp}

											{if $auxResp['TIPO'] == 'F'}
                      <div class='alert alert-danger'>
												<i class='fa fa-times-circle fa-1x'></i>
											{else}
                      <div class='alert alert-success'>
                        <i class='fa fa-check-circle fa-1x'></i>
                      {/if}
											{$auxResp['RESPOSTA']}
											</div>

										 {/foreach}
									</blockquote>
									<small>
											Categoria: {$aux['DESCRICAO']}
									</small>
								</div>
							</div>
						<!-- </div> -->
					{/foreach}
				</div>
			</div>
			<!-- .panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
