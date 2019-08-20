<?php
$smarty = new Smarty;
$smarty->template_dir = 'themes/default/template/';
$smarty->config_dir = 'theme/default/';
$smarty->cache_dir = 'cache';
$link = conecta_db();
// pergunta------
$classe_VO = include_VO2('pergunta');
$classe_DAO = include_DAO2('pergunta');
require_once $classe_VO;
require_once $classe_DAO;

$perguntaVO = new perguntaVO();
$perguntaVO->setDescricao($_POST['txtarpergunta']);
$perguntaVO->setId_disciplina($_POST['seldisciplina']);
$perguntaVO->setId_categoria($_POST['categoria']);

$perguntaDAO = new perguntaDAO();
if($perguntaDAO->insert($perguntaVO, $link)){
  printf('Registro inserido com sucesso. O ID cadastrado é '.$perguntaVO->getId_pergunta());
}
$idpergunta = $perguntaVO->getId_pergunta();
$perguntaVO = $perguntaDAO->getPerguntas($link, $idpergunta);

// disciplina----------
$classe_VO = include_VO2('disciplina');
$classe_DAO = include_DAO2('disciplina');
require_once $classe_VO;
require_once $classe_DAO;

$disciplinaVO = new disciplinaVO();
$disciplinaDAO = new disciplinaDAO( );
$id = $_POST['seldisciplina'];
$disciplinaVO = $disciplinaDAO->getDisciplina($link, $id);
// categoria-------
$classe_VO = include_VO2('categoria');
$classe_DAO = include_DAO2('categoria');
require_once $classe_VO;
require_once $classe_DAO;

$categoriaVO = new categoriaVO();
$categoriaDAO = new categoriaDAO( );
$id = $_POST['categoria'];
$categoriaVO = $categoriaDAO->getCategorias($link, $id);

desconecta_db($link);
$smarty->assign(array(
  'pergunta' => $perguntaVO,
  'disciplina' => $disciplinaVO,
  'categoria' => $categoriaVO,
  'id_pergunta' => $idpergunta
));
$smarty->display('define_resp_certa.tpl');
