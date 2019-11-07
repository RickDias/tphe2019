<?php

$smarty = new Smarty;
$smarty->template_dir = 'themes/default/template';
$smarty->config_dir = 'themes/default';
$smarty->caching = false;

$nome = $_SESSION['UsuarioNome'];
$img_perfil = 'img/'.$_SESSION['ImgPerfil'].'.jpg';
$img_capa = 'img/'.$_SESSION['ImgCapa'].'.jpg';
$desc_perfil = $_SESSION['DescPerfil'];

// img/15582713665ce1558679583jpg


$smarty->assign(array(
    'nome_usuario' => $nome,
    'img_perfil' => $img_perfil,
    'img_capa' => $img_capa,
    'desc_perfil' => $desc_perfil,

    // 'tipo' => $tipo,
    // 'base_facebook' => $base_facebook

));


$smarty->display('user_info.tpl');
