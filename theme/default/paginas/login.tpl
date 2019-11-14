<section id="contact">
    <div class="container">
            <div class="col-md-12">
              {if $txt_cad}
              <div class="alert alert-success" role="alert" style="margin:10px">
                {$txt_cad}
              </div>
              {/if}
                <h2 class="section-heading">Faça login para continuar...</h2>

                <!--h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3-->
            </div>
        <form action="index.php?pag=login&form_login=1" method="post">
          <div class="col-md-6" >
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Seu Email *" id="email" name="email"
              required data-validation-required-message="Por favor, digite seu e-mail.">
              <p class="help-block text-danger"></p>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Sua senha *" id="senha" name="senha"
              required data-validation-required-message="Por favor, digite sua senha.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="col-lg-12">
            <div id="success"></div>
            <button type="submit" class="btn btn-xl">Entrar</button>
            <h3 class="section-heading"><a href='index.php?pag=cadastro'>OU FAÇA AQUI O SEU CADASTRO</a></h3>
          </div>

        </form>
    </div>
</section>
