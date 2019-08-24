<?php
// include 'menu.tpl';
$smarty = new Smarty;
$smarty->template_dir = 'theme/default/paginas';
$smarty->config_dir = 'themes/default';
$smarty->caching = false;
// $smarty->assign('menu_lateral', include "lateral_jogador.php");
$con = conecta_db();

$id_quiz= Tools::getValue("id-quiz");
$id_turma= Tools::getValue("id-turma");

$sql = "SELECT q.`ID_QUIZ`, q.`ID_USUARIO`, q.`DESCRICAO`,
              date_format(q.`DT_INICIO`, '%d-%m-%Y') AS 'DT_INICIO',
              date_format(q.`DT_FIM`, '%d-%m-%Y') AS 'DT_FIM', `PUBLICACAO` ,
              t.`SIGLA`, t.`ID_TURMA`, u.`NOME`, d.`nome` as `disciplina`
              FROM `quiz` q,`turma_quiz`tq, `turma` t, `usuario` u, `disciplina` d
              WHERE q.`ID_QUIZ` = ".$id_quiz."
              AND q.`ID_QUIZ` = tq.`ID_QUIZ`
              AND tq.`ID_TURMA` = t.`ID_TURMA`
              AND t.`ID_DISCIPLINA` = d.`ID_DISCIPLINA`
              AND u.`ID_USUARIO` = ".$_SESSION['UsuarioID']."
              AND q.`ID_USUARIO` = ".$_SESSION['UsuarioID'];

$resultados = mysqli_query($con, $sql) or die(mysqli_error($con));
//criando a query de consulta à tabela
// session_start();
// if($_SESSION){
//   $user_id = $_SESSION["UsuarioID"];
//
  $smarty->assign(array(
    'resultados' => $resultados,
    // 'cessao' => $_SESSION,
  ));
//
// }


$smarty->display('jogar_quiz.tpl');

?>
