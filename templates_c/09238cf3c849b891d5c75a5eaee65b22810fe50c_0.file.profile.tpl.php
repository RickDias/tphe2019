<?php
/* Smarty version 3.1.33, created on 2019-08-29 01:53:23
  from 'C:\xampp\htdocs\tphe2019\theme\default\paginas\profile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d6713f3499b59_87325460',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '09238cf3c849b891d5c75a5eaee65b22810fe50c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tphe2019\\theme\\default\\paginas\\profile.tpl',
      1 => 1567036382,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d6713f3499b59_87325460 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container" id="user_front_container">
  <div class="fb-profile">
    <!-- capa -->
    <img align="left" class="fb-image-lg" src="<?php echo $_smarty_tpl->tpl_vars['img_capa']->value;?>
" alt="Profile image example"/>
    <!-- perfil -->
    <img align="left" class="fb-image-profile thumbnail" src="<?php echo $_smarty_tpl->tpl_vars['img_perfil']->value;?>
" alt="Profile image example"/>

    <div class="fb-profile-text">
      <!-- nome -->
        <h1><?php echo $_smarty_tpl->tpl_vars['usuario']->value[0]->nome;?>
</h1>
        <!-- <a href="#" style="color:red">editar</a> -->
      <!-- status -->
      <div class="col-md-4">
        <p><?php echo $_smarty_tpl->tpl_vars['usuario']->value[0]->email;?>
 <a href="#" style="color:red">alterar</a></p>
        <button id="alt_senha">Alterar senha</button>
        <ul class="list-inline social-buttons">
          <li>
            <a href="<?php echo $_smarty_tpl->tpl_vars['base_facebook']->value;
echo $_smarty_tpl->tpl_vars['usuario']->value[0]->id_facebook;?>
"><i class="fa fa-facebook"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<br>
<br>
<br>
<br>
<br>
<!-- <?php echo var_dump($_smarty_tpl->tpl_vars['usuario']->value);?>
 -->
<?php }
}
