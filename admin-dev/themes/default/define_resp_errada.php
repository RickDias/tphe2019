<?php

$smarty = new Smarty;
$smarty->template_dir = 'themes/default/template/';
$smarty->config_dir = 'theme/default/';
$smarty->cache_dir = 'cache';

$idpergunta = $_POST['idpergunta'];

$classe_VO = include_VO2('pergunta');
$classe_DAO = include_DAO2('pergunta');

require $classe_VO;
require $classe_DAO;

$link = conecta_db();
$perguntaDAO = new perguntaDAO( );
$perguntaVO = $perguntaDAO->getPerguntas($link, $idpergunta);

// $resultados = $sql->num_rows;

$classe_VO = include_VO2('disciplina');
$classe_DAO = include_DAO2('disciplina');

require $classe_VO;
require $classe_DAO;

$disciplinaVO = new disciplinaVO();
$disciplinaDAO = new disciplinaDAO( );
foreach ($perguntaVO as $dados){
  $iddisciplina = $dados->getId_disciplina();
  $idcategoria = $dados->getId_categoria();
}

$disciplinaVO = $disciplinaDAO->getDisciplina($link, $iddisciplina);

$classe_VO = include_VO2('categoria');
$classe_DAO = include_DAO2('categoria');

require $classe_VO;
require $classe_DAO;

$categoriaVO = new categoriaVO();
$categoriaDAO = new categoriaDAO( );
$id = $_POST['categoria'];
$categoriaVO = $categoriaDAO->getCategorias($link, $idcategoria);

desconecta_db($link);

$smarty->assign(array(
  'pergunta' => $perguntaVO,
  'disciplina' => $disciplinaVO,
  'categoria' => $categoriaVO,
  'resp_certa' => $_POST['txtrespcerta'],
  'id_pergunta' => $idpergunta

));

$smarty->display('define_resp_errada.tpl');
