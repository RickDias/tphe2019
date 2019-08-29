<?php
if($_SESSION){

// include 'menu.tpl';
$smarty = new Smarty;
$smarty->template_dir = 'theme/default/paginas';
$smarty->config_dir = 'themes/default';
$smarty->caching = false;
// $smarty->assign('menu_lateral', include "lateral_jogador.php");

// session_start();
// if($_SESSION){
//   $user_id = $_SESSION["UsuarioID"];
//
//   $smarty->assign(array(
//     'id_usuario' => $user_id,
//     'cessao' => true,
//   ));
//
// }
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

$sql = "SELECT q.`ID_QUIZ`, q.`ID_USUARIO`, q.`DESCRICAO`,
              date_format(q.`DT_INICIO`, '%d-%m-%Y') AS 'DT_INICIO',
              date_format(q.`DT_FIM`, '%d-%m-%Y') AS 'DT_FIM', `PUBLICACAO` ,
              t.`SIGLA`, t.`ID_TURMA`, u.`NOME`
              FROM `quiz` q,`turma_quiz`tq, `turma` t, `usuario` u
              WHERE q.`ID_QUIZ` = tq.`ID_QUIZ`
              AND tq.`ID_TURMA` = t.`ID_TURMA`
              AND u.`ID_USUARIO` = ".$_SESSION['UsuarioID']."
              AND q.`ID_USUARIO` = ".$_SESSION['UsuarioID'];

$resultados = mysqli_query($con, $sql) or die(mysqli_error($con));

$smarty->assign('resultados', $resultados);



$smarty->display('painel_jogador.tpl');
}else{
  header("Location: index.php?pag=login");

}

?>
