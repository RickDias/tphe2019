<!-- Navigation -->
<nav id="mainNav" style="background:black">
    <div class="container" id="container_menu">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="index.php?pag=home">Projeto TPhE</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li>
                    <a class="page-scroll" href="index.php?pag=teste&get=gerson">testes</a>
                </li>
                <li>
                    <a class="page-scroll" href="#">Link 2</a>
                </li>
                <li>
                    <a class="page-scroll" href="index.php?pag=sobre">Sobre nós</a>
                </li>
                {if $cessao == false}
                <li>
                    <a class="page-scroll" href="index.php?pag=login">Login</a>
                </li>
                {/if}
                {if $cessao == true}
                <li>
                  <a class="page-scroll" href="index.php?pag=painel_jogador">Painel do Jogador</a>
                </li>
                <li>
                  <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                      <i class="fa fa-bars"></i>
                  </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item disabled" href="index.php?pag=profile">Perfil</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                      <a class="dropdown-item" href="index.php?pag=loggout">Sair</a>
                    </div>
                  </div>
                </li>
                
                {/if}
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
