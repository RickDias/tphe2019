<?php /* Smarty version Smarty-3.1.19-dev, created on 2019-05-21 04:18:58
         compiled from "themes\default\template\user_info.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16085873845ce3419fd25358-10065865%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a39c35b7ec5c9f1ecf562b645bfa66280a9ad54f' => 
    array (
      0 => 'themes\\default\\template\\user_info.tpl',
      1 => 1558405136,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16085873845ce3419fd25358-10065865',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_5ce3419fd5ff55_32905923',
  'variables' => 
  array (
    'nome_usuario' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ce3419fd5ff55_32905923')) {function content_5ce3419fd5ff55_32905923($_smarty_tpl) {?><div class="container" id="user_info_container">
  <div class="fb-profile">
    <!-- capa -->
    <img align="left" class="fb-image-lg" src="http://lorempixel.com/850/280/nightlife/5/" alt="Profile image example"/>
    <!-- perfil -->
    <img align="left" class="fb-image-profile thumbnail" src="http://lorempixel.com/180/180/people/9/" alt="Profile image example"/>

    <div class="fb-profile-text">
      <!-- nome -->
      <h1><?php echo $_smarty_tpl->tpl_vars['nome_usuario']->value;?>
</h1>
      <!-- status -->
      <p>Girls just wanna go fun.</p>
    </div>
  </div>
</div>
<?php }} ?>
