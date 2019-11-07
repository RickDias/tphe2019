<!-- Navigation -->
<nav id="mainNav" style="background:black">
    <div class="container" id="container_menu">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll" style="color:#fed136">
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
                {if $cessao == false}
                <li>
                    <a class="page-scroll" href="index.php?pag=login">Login</a>
                </li>
                {/if}
                {if $cessao == true}
                {assign var=firstname value=explode(" ", $usuario["UsuarioNome"])}
                <div class="navbar-header page-scroll" id="text_welcome_mobile" style="margin-top:10px;color:#666">
                  Bem vindo, <span style="font-size:18px;font-weight:bold;color:#fed136">{$firstname[0]}!</span>
                </div>
                <div id="menu_mobile">
                  <li class="itens_mobile"><a class="page-scroll" href="index.php?pag=painel_jogador"><span>Painel</span></a></li>
                  <li class="itens_mobile"><a class="page-scroll" href="index.php?pag=jogo&jogo=quiz"><span>Jogos</span></a></li>
                  <li class="itens_mobile"><a class="page-scroll" href="index.php?pag=matricula"><span>Matricular-se</span></a></li>
                  <li class="itens_mobile"><a class="page-scroll" href="index.php?pag=minhas_turmas"><span>Minhas turmas</span></a></li>
                  <li class="itens_mobile"><a class="page-scroll" href="index.php?pag=historico"><span>Histórico</span></a></li>
                  <li class="itens_mobile"><a class="page-scroll" href="index.php?pag=profile"><span>Meu Perfil</span></a></li>
                  <li class="itens_mobile"><a class="page-scroll" href="index.php?pag=sobre"><span>Sobre nós</span></a></li>
                  <li class="itens_mobile"><a class="page-scroll" href="index.php?pag=loggout"><span>Sair</span></a></li>
                </div>

                {/if}
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<!-- ---------------------------------- sidebar -->
{if $cessao}
<div class="navbar-default sidebar col-md-2 col-sm-12" id="menu_sidebar" role="navigation" style="margin-bottom:30px;">
	<div class="sidebar-nav navbar-collapse">
    <div class="logo">
    </div>
		<ul class="nav lateral" id="side-menu">

      <li><a class="li_menu_lat" href="index.php?pag=painel_jogador"><img src="theme/default/images/home.png" alt="" /><span class="txt_menu_lat">Painel</span></a></li>
      <li><a class="li_menu_lat" href="index.php?pag=jogo&jogo=quiz"><img src="theme/default/images/9.png" alt="" /><span class="txt_menu_lat">Jogos</span></a></li>
      <li><a class="li_menu_lat" href="index.php?pag=matricula"><img src="theme/default/images/2.png" alt="" /><span class="txt_menu_lat">Matricular-se</span></a></li>
      <li><a class="li_menu_lat" href="index.php?pag=minhas_turmas"><img src="theme/default/images/3.png" alt="" /><span class="txt_menu_lat">Minhas turmas</span></a></li>
      <li><a class="li_menu_lat" href="index.php?pag=historico"><img src="theme/default/images/4.png" alt="" /><span class="txt_menu_lat">Histórico</span></a></li>
      <li><a class="li_menu_lat" href="index.php?pag=profile"><img src="admin-dev/themes/default/img/module-profile.png" alt="" /><span class="txt_menu_lat">Meu Perfil</span></a></li>
      <li><a class="li_menu_lat" href="index.php?pag=sobre"><img src="theme/default/images/17.png" alt="" /><span class="txt_menu_lat">Sobre nós</span></a></li>
      <li><a class="li_menu_lat" href="index.php?pag=loggout"><img src="admin-dev/themes/default/img/icon-cancel.png" alt="" /><span class="txt_menu_lat">Sair</span></a></li>
		</ul>
	</div>
</div>
<!-- /.navbar-static-side -->
{/if}
