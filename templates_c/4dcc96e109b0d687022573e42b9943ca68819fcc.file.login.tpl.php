<?php /* Smarty version Smarty-3.1.19-dev, created on 2019-05-21 03:10:52
         compiled from "theme\default\paginas\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18586677175ce1cf75a71e29-42680102%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4dcc96e109b0d687022573e42b9943ca68819fcc' => 
    array (
      0 => 'theme\\default\\paginas\\login.tpl',
      1 => 1558401049,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18586677175ce1cf75a71e29-42680102',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_5ce1cf75da96d9_93999117',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ce1cf75da96d9_93999117')) {function content_5ce1cf75da96d9_93999117($_smarty_tpl) {?><section id="contact">
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
            <h3 class="section-heading"><a href='#'>OU FAÇA AQUI O SEU CADASTRO</a></h3>
            <h3 class="section-heading"><a href='admin-dev/index.php'>admin-TESTE</a></h3>

                        </div>

        </form>
      </div>

            </div>
        </div>
    </div>
</section>
<?php }} ?>
