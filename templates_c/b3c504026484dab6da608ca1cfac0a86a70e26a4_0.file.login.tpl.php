<?php
/* Smarty version 3.1.33, created on 2019-08-14 01:14:36
  from 'C:\xampp\htdocs\tphe2019\theme\default\paginas\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d53445c154217_34038017',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b3c504026484dab6da608ca1cfac0a86a70e26a4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tphe2019\\theme\\default\\paginas\\login.tpl',
      1 => 1565737761,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d53445c154217_34038017 (Smarty_Internal_Template $_smarty_tpl) {
?><section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="section-heading">Login</h2>
                <!--h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3-->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
      <div class="row">
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

            </div>
        </div>
    </div>
</section>
<?php }
}
