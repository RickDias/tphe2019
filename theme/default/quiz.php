<?php
// include 'menu.tpl';
$smarty = new Smarty;
$smarty->template_dir = 'theme/default/paginas';
$smarty->config_dir = 'themes/default';
$smarty->caching = false;
$smarty->error_reporting = E_ALL & ~E_NOTICE;

// $smarty->assign('menu_lateral', include "lateral_jogador.php");
$con = conecta_db();

if(Tools::getValue("sair_quiz") == 1){

  $sala_aluno_VO = include_VO('sala_aluno');
  $sala_aluno_DAO = include_DAO('sala_aluno');
  require_once $sala_aluno_VO;
  require_once $sala_aluno_DAO;

  $sala_alunoDAO = new sala_alunoDAO();
  $sair = $sala_alunoDAO->updateStatus($_SESSION['UsuarioID'],"N",$con);
}
//criando a query de consulta à tabela
$sql = "SELECT distinct q.`ID_QUIZ`, q.`ID_USUARIO`, q.`DESCRICAO`,
              date_format(q.`DT_INICIO`, '%d-%m-%Y') AS 'DT_INICIO',
              date_format(q.`DT_FIM`, '%d-%m-%Y') AS 'DT_FIM', q.`PUBLICACAO` ,
              t.`SIGLA`, t.`ID_TURMA`, u.`NOME`
              FROM `quiz` q,`turma_quiz`tq, `turma` t, `usuario` u, `turma_aluno` ta
              WHERE q.`ID_QUIZ` = tq.`ID_QUIZ`
              AND ta.`ID_TURMA` = tq.`ID_TURMA`
              AND ta.`ID_USUARIO` = u.`ID_USUARIO`
              AND tq.`ID_TURMA` = t.`ID_TURMA`
              AND tq.`ATIVO` = '1'
              AND tq.`INICIADO` = '0'
              AND u.`ID_USUARIO` = ".$_SESSION['UsuarioID'];

$resultados = mysqli_query($con, $sql) or die(mysqli_error($con));

  $smarty->assign(array(
    'resultados' => $resultados,
    'cessao' => $_SESSION,
  ));


  $sql_ind = "SELECT distinct q.`ID_QUIZ`, q.`ID_USUARIO`, q.`DESCRICAO`,
                date_format(q.`DT_INICIO`, '%d-%m-%Y') AS 'DT_INICIO',
                date_format(q.`DT_FIM`, '%d-%m-%Y') AS 'DT_FIM', q.`PUBLICACAO` ,
                u.`NOME`
                FROM `quiz` q,`turma_quiz`tq, `turma` t, `usuario` u
                WHERE q.`publicacao` = 'S'
                AND q.`ID_USUARIO` = 1
                AND u.`ID_USUARIO` = ".$_SESSION['UsuarioID'];
                 // AND tq.`ATIVO` = '1'
                 // AND tq.`INICIADO` = '0'

  $resultados_ind = mysqli_query($con, $sql_ind) or die(mysqli_error($con));
  while ( $rs = mysqli_fetch_array( $resultados_ind ) ) {
    // var_dump($rs);
    $res[]=$rs;
    $smarty->assign(array(
      'jg_ind' => $res,
    ));
}


$smarty->display('quiz.tpl');


?>
