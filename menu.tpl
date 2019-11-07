<!-- Navigation -->
<nav id="mainNav" style="background:black">
    <div class="container" id="container_menu">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="index.php?pag=painel_jogador">Projeto TPhE</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <!-- <li>
                    <a class="page-scroll" href="index.php?pag=sobre">Sobre nós</a>
                </li> -->
                {if $cessao == false}
                <li>
                    <a class="page-scroll" href="index.php?pag=login">Login</a>
                </li>
                {/if}
                {if $cessao == true}
                {assign var=firstname value=explode(" ", $usuario["UsuarioNome"])}
                <div class="navbar-header page-scroll" style="margin-top:10px;color:#666">
                  Bem vindo, <span style="font-size:18px;font-weight:bold;color:#fed136">{$firstname[0]}!</span>
                </div>

                <!-- <li>
                  <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                      <i class="fa fa-bars"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="index.php?pag=profile">Perfil</a>
                      <a class="dropdown-item" href="index.php?pag=painel_jogador">Painel do Jogador</a>
                      <a class="dropdown-item" href="index.php?pag=home_jogos">Jogos</a>
                      <a class="dropdown-item" href="index.php?pag=loggout">Sair</a>
                    </div>
                  </div>
                </li> -->

                {/if}
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<!-- ---------------------------------- sidebar -->
{if $cessao}
<div class="navbar-default sidebar col-md-2" role="navigation">
	<div class="sidebar-nav navbar-collapse">
    <div class="logo">
    </div>
		<ul class="nav lateral" id="side-menu">

      <li><a href="index.php?pag=painel_jogador"><img src="theme/default/images/home.png" alt="" /><span>Painel</span></a></li>
      <li><a href="index.php?pag=jogo&jogo=quiz"><img src="theme/default/images/9.png" alt="" /><span>Jogos</span></a></li>
      <li><a href="index.php?pag=matricula"><img src="theme/default/images/2.png" alt="" /><span>Matricular-se</span></a></li>
      <li><a href="index.php?pag=minhas_turmas"><img src="theme/default/images/3.png" alt="" /><span>Minhas turmas</span></a></li>
      <li><a href="index.php?pag=historico"><img src="theme/default/images/4.png" alt="" /><span>Histórico</span></a></li>
      <li><a href="index.php?pag=profile"><img src="admin-dev/themes/default/img/module-profile.png" alt="" /><span>Meu Perfil</span></a></li>
      <li><a href="index.php?pag=sobre"><img src="theme/default/images/17.png" alt="" /><span>Sobre nós</span></a></li>
      <li><a href="index.php?pag=loggout"><img src="admin-dev/themes/default/img/icon-cancel.png" alt="" /><span>Sair</span></a></li>
		</ul>
	</div>
</div>
<!-- /.navbar-static-side -->
{/if}
