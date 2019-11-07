<?php
if($_SESSION){

// include 'menu.tpl';
$smarty = new Smarty;
$smarty->template_dir = 'theme/default/paginas';
$smarty->config_dir = 'themes/default';
$smarty->caching = false;
$smarty->error_reporting = E_ALL & ~E_NOTICE;
$id_usuario = $_SESSION["UsuarioID"];

$con = conecta_db();

$classe_VO = include_VO('admensagem');
$classe_DAO = include_DAO('admensagem');

include($classe_VO);
include($classe_DAO);

$classe_VO = include_VO('usuario');
$classe_DAO = include_DAO('usuario');

include($classe_VO);
include($classe_DAO);

$admensagemDAO = new admensagemDAO();
$avisos = $admensagemDAO->getAll($con);
// var_dump($avisos);exit;
if(count($avisos)>0){
  $usuarioDAO = new usuarioDAO();
  foreach($avisos as $key=>$aviso){
    $usuario[] = $usuarioDAO->getLikeUsuario($con,$aviso->getId_usuario());
    $smarty->assign('usuario', $usuario);
  }
  $smarty->assign('avisos', $avisos);
}

$sql = "SELECT distinct q.`ID_QUIZ`, q.`ID_USUARIO`, q.`DESCRICAO`,
              date_format(q.`DT_INICIO`, '%d-%m-%Y') AS 'DT_INICIO',
              date_format(q.`DT_FIM`, '%d-%m-%Y') AS 'DT_FIM', q.`PUBLICACAO` ,
              t.`SIGLA`, t.`ID_TURMA`, u.`NOME`
              FROM `quiz` q,`turma_quiz`tq, `turma` t, `usuario` u
              WHERE q.`ID_QUIZ` = tq.`ID_QUIZ`
              AND tq.`ID_TURMA` = t.`ID_TURMA`
              AND tq.`ATIVO` = '1'
              AND tq.`INICIADO` = '0'
              AND u.`ID_USUARIO` = ".$_SESSION['UsuarioID'];
$resultados = mysqli_query($con, $sql) or die(mysqli_error($con));
$smarty->assign('resultados', $resultados);

// individual
$sql_ind = "SELECT distinct q.`ID_QUIZ`, q.`ID_USUARIO`, q.`DESCRICAO`,
              date_format(q.`DT_INICIO`, '%d-%m-%Y') AS 'DT_INICIO',
              date_format(q.`DT_FIM`, '%d-%m-%Y') AS 'DT_FIM', q.`PUBLICACAO` ,
              u.`NOME`
              FROM `quiz` q,`turma_quiz`tq, `turma` t, `usuario` u
              WHERE q.`publicacao` = 'S'
              AND q.`ID_USUARIO` = 1
              AND u.`ID_USUARIO` = ".$_SESSION['UsuarioID'];
$resultados_ind = mysqli_query($con, $sql_ind) or die(mysqli_error($con));
$smarty->assign('resultados_ind', $resultados_ind);


$sql_jog = "SELECT p.`id_usuario` as id_user, sum(p.`pontos`) as pts
              FROM `pontuacao` p
              WHERE p.`id_usuario` != 0
              group by  p.`id_usuario`
              order by pts DESC LIMIT 10";
$jogadores = mysqli_query($con, $sql_jog) or die(mysqli_error($con));
if($jogadores->num_rows > 0){
  foreach($jogadores as $id){
    $level_aluno[] = getLevel($id["id_user"], $con);
    // var_dump($level_aluno);
  }
  $smarty->assign('jogadores', $level_aluno);
}

$smarty->display('painel_jogador.tpl');
}else{
  header("Location: index.php?pag=login");

}

?>
