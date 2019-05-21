<?php /* Smarty version Smarty-3.1.19-dev, created on 2019-05-22 01:15:13
         compiled from "themes\default\template\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10240950035ce483473a2898-45037315%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b4b72db47881638d993adcf07ecdbd8f9eceeffc' => 
    array (
      0 => 'themes\\default\\template\\login.tpl',
      1 => 1558480237,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10240950035ce483473a2898-45037315',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_5ce483473dcf25_58365267',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ce483473dcf25_58365267')) {function content_5ce483473dcf25_58365267($_smarty_tpl) {?><section id="contact">
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
         <form name="loginAdmin" name="loginAdmin" action="index.php?pag=login&form_login=1" method="post">
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
                        </div>
        </form>
      </div>

            </div>
        </div>
    </div>
</section>
<?php }} ?>
