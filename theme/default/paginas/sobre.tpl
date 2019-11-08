<!-- About Section -->
<section id="about">
    <div class="container">
      <center>
        <h2 class="section-heading">Sobre...</h2>
        <h3 class="section-subheading text-muted">O projeto Tphe.</h3>
      </center>
      <div class="painel_sobre">
        <span style="font-weight:bold"></span>

        Este projeto foi desenvolvido para funcionar com o painel do aluno e do professor trocando dados simultâneamente.
        O Jogo em si <span style="font-weight:bold">precisa de uma interação direta do professor</span>, pois sua tela ficará projetada para toda a turma.
        O aluno apenas responderá as perguntas.
        Ao final da rodada será exibido o placar na tela do professor.

        Como o sistema está em fase de testes, disponibilizei um quiz onde o aluno poderá jogar sem a necessidade do professor,
        porém como o sistema considera a pontuação para formular níveis, este tipo de jogo <span style="font-weight:bold">não distribui pontuação</span>.
      </div>
      <div class="col-md-10">
                <ul class="timeline">
                    <li>
                        <div class="timeline-image">
                            <img class="img-circle img-responsive" src="img/about/1.jpg" alt="">
                            <!-- <img src="http://graph.facebook.com/100002268762791/picture"> -->
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>2016</h4>
                                <h4 class="subheading">O projeto se inicia...</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">Por demanda da professora de educação física que precisava de uma forma de incentivar o conteúdo teórico de educação física em sala de aula surgiu o projeto Tphe!</p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <img class="img-circle img-responsive" src="img/about/2.jpg" alt="">
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Inicio de 2017</h4>
                                <h4 class="subheading">Um projeto nasce</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">Com um projeto definido, foi iniciada a programação. Tivemos dificuldades em encontrar voluntários que pudesse de alguma forma ajudar no desenvolvimento, pois a equipe original possuía outros projetos em desenvolvimento!</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image">
                            <img class="img-circle img-responsive" src="img/about/3.jpg" alt="">
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Inicio de 2018</h4>
                                <h4 class="subheading">Teoria antes do desenvolvimento</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">Desenvolvimento dos diagramas, modelagem do banco e toda a parte teórica do projeto. Com falta de alunos para o desenvolvimento a programção foi se mantendo em segundo plano...</p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <img class="img-circle img-responsive" src="img/about/4.jpg" alt="">
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>E em 2019...</h4>
                                <h4 class="subheading">A fase 2 finalmente se inicia!</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">Com a falta de voluntários o projeto foi ficando cada vez mais próximo da extinção. Foi onde surgiu a proposta de utilizá-lo em meu TCC, e em Maio de 2019 foi iniciada a programação do sistema em tempo integral!</p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>Seja parte
                                <br>De nossa
                                <br>História!</h4>
                        </div>
                    </li>
                </ul>
            </div>
    </div>
</section>


<!-- Team Section -->
<section id="team" class="bg-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Conheça nossa equipe</h2>
                <h3 class="section-subheading text-muted">Campus Santo Ângelo</h3>
            </div>
        </div>
        <div class="row">
        {assign var=cont value=0}
        {foreach from=$usuarios item=usuario}
            <div class="col-sm-4">
                <div class="team-member">
                    <img src="img/users/{$usuario[0]->id_usuario}.jpg" class="img-responsive img-circle" style="width:200px" alt="">
                    <h4> {$usuario[0]->nome} </h4>
                    <p class="text-muted">
                      {$tipo[$cont]}
                    </p>
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        {if $usuario[0]->id_facebook != 0}
                        <li><a href="{$base_facebook}{$usuario[0]->id_facebook}" target="_blank"><i class="fa fa-facebook"></i></a>
                        </li>
                        {/if}
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <input type="hidden" value="{$cont++}">
            {/foreach}
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
            </div>
        </div>
    </div>
</section>
