<?php
// Utilizar este padrão em todos os PHPs
$smarty = new Smarty;
$smarty->template_dir = 'themes/default/template/';
$smarty->config_dir = 'theme/default/';
$smarty->cache_dir = 'cache';

// Tenta se conectar ao servidor MySQL
$link = conecta_db();
// includes DAO e VO necessarios
// disciplina ---------------------
$classe_VO = include_VO2('disciplina');
$classe_DAO = include_DAO2('disciplina');
require_once $classe_VO;
require_once $classe_DAO;

$disciplinaVO = new disciplinaVO();
$disciplinaDAO = new disciplinaDAO( );
$disciplinaVO = $disciplinaDAO->getAll($link);

// categoria ---------------------
$classe_VO = include_VO2('categoria');
$classe_DAO = include_DAO2('categoria');
require_once $classe_DAO;
require_once $classe_VO;

$categoriaVO = new categoriaVO();
$categoriaDAO = new categoriaDAO( );
$categoriaVO = $categoriaDAO->getAll($link);
// desconecta após utilizar
desconecta_db($link);
// cria variaveis para o TPL
$smarty->assign(array(
    'email' => $_SESSION['UsuarioEmail'],
    'disciplina' => $disciplinaVO,
    'categoria' => $categoriaVO
));
// carrega o TPL
$smarty->display('nova_pergunta.tpl');
