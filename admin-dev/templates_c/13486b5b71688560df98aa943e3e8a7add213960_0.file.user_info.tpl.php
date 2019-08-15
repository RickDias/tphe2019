<?php
/* Smarty version 3.1.33, created on 2019-08-14 02:53:02
  from 'C:\xampp\htdocs\tphe2019\admin-dev\themes\default\template\user_info.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d535b6e9a7e83_34243329',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '13486b5b71688560df98aa943e3e8a7add213960' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tphe2019\\admin-dev\\themes\\default\\template\\user_info.tpl',
      1 => 1565046197,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d535b6e9a7e83_34243329 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container" id="user_info_container">
  <div class="fb-profile">
    <!-- capa -->
    <img align="left" class="fb-image-lg" src="<?php echo $_smarty_tpl->tpl_vars['img_capa']->value;?>
" alt="Profile image example"/>
    <!-- perfil -->
    <img align="left" class="fb-image-profile thumbnail" src="<?php echo $_smarty_tpl->tpl_vars['img_perfil']->value;?>
" alt="Profile image example"/>

    <div class="fb-profile-text">
      <!-- nome -->
      <h1><?php echo $_smarty_tpl->tpl_vars['nome_usuario']->value;?>
</h1>
      <!-- status -->
      <p><?php echo $_smarty_tpl->tpl_vars['desc_perfil']->value;?>
</p>
    </div>
  </div>
</div>
<?php }
}
