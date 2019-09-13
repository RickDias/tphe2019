<?php
// include 'menu.tpl';
$smarty = new Smarty;
$smarty->template_dir = 'theme/default/paginas';
$smarty->config_dir = 'themes/default';
$smarty->caching = false;
// $smarty->assign('menu_lateral', include "lateral_jogador.php");
$con = conecta_db();

//criando a query de consulta à tabela
$sql = "SELECT q.`ID_QUIZ`, q.`ID_USUARIO`, q.`DESCRICAO`,
              date_format(q.`DT_INICIO`, '%d-%m-%Y') AS 'DT_INICIO',
              date_format(q.`DT_FIM`, '%d-%m-%Y') AS 'DT_FIM', `PUBLICACAO` ,
              t.`SIGLA`, t.`ID_TURMA`, u.`NOME`
              FROM `quiz` q,`turma_quiz`tq, `turma` t, `usuario` u
              WHERE q.`ID_QUIZ` = tq.`ID_QUIZ`
              AND tq.`ID_TURMA` = t.`ID_TURMA`
              AND q.`PUBLICACAO` = 'S'
              AND u.`ID_USUARIO` = ".$_SESSION['UsuarioID']."
              AND q.`ID_USUARIO` = ".$_SESSION['UsuarioID'];

$resultados = mysqli_query($con, $sql) or die(mysqli_error($con));

$sql = sprintf("select sa.`id_aluno`, u.`NOME`, sa.`id_pontuacao`
from sala_alunos sa
LEFT JOIN usuario u on (sa.`id_aluno` = u.`ID_USUARIO`)
where `visivel` = 'S' ");
$resultado = mysqli_query($con,$sql) or die(mysqli_error($con));
while ( $rs = mysqli_fetch_array( $resultado ) ) {
   $todos_alunos[] =$rs ;
}
// session_start();
// if($_SESSION){
//   $user_id = $_SESSION["UsuarioID"];
//
  $smarty->assign(array(
    'resultados' => $resultados,
    'cessao' => $_SESSION,
    'alunos' => $todos_alunos
  ));
//
// }


$smarty->display('quiz.tpl');


?>
