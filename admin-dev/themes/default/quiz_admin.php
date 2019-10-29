<?php

$smarty = new Smarty;
$smarty->template_dir = 'themes/default/template/';
$smarty->config_dir = 'theme/default/';
$smarty->caching = false;
$smarty->error_reporting = E_ALL & ~E_NOTICE;

$con = conecta_db();

$id_usuario = $_SESSION["UsuarioID"];
$id_quiz= Tools::getValue("id_quiz");
$id_turma= Tools::getValue("id_turma");
$smarty->assign("id_turma", $id_turma);
$rodada = Tools::getValue("rodada");
$esgotado = Tools::getValue("esgotado");

  if($id_quiz && $rodada != FALSE){
    $quiz_DAO = include_DAO2('turma_quiz');
    require_once $quiz_DAO;
    $quizDAO = new turma_quizDAO();
    $updateRodada = $quizDAO->updateRodada($id_quiz,$id_turma,$rodada,$con);
    }

    if($id_quiz && $esgotado != NULL){
      $tquiz_DAO = include_DAO2('turma_quiz');
      require_once $tquiz_DAO;
      $tquizDAO = new turma_quizDAO();
      $updateEsgotado = $tquizDAO->updateEsgotado($id_quiz,$id_turma,$esgotado,$con);
    }

if ($id_quiz && $id_turma){
  // pergunta quiz
  $pergunta_quiz_DAO = include_DAO2('pergunta_quiz');
  require_once $pergunta_quiz_DAO;
  $pergunta_quizDAO = new pergunta_quizDAO();
  $perguntas_quiz = $pergunta_quizDAO->getPerguntas($con,$id_quiz);
  foreach($perguntas_quiz as $key=>$pergunta_quiz){
    $id_pergunta[$key] = $pergunta_quiz->getId_pergunta();
  }
  // pergunta
  $pergunta_DAO = include_DAO2('pergunta');
  require_once $pergunta_DAO;
  $perguntaDAO = new perguntaDAO();
  foreach($id_pergunta as $key=>$id_perg){
    $perguntas[$key] = $perguntaDAO->getPerguntas($con,$id_perg);
  }
  $smarty->assign("perguntas", $perguntas);

  $resposta_DAO = include_DAO2('resposta');
  require $resposta_DAO;
  $respostaDAO = new respostaDAO();
  foreach($id_pergunta as $key=>$id){
    $respostas[] = $respostaDAO->getRespostas($con,$id);
  }
  $smarty->assign("respostas", $respostas);

$quiz_sql = "SELECT *
        FROM `quiz`
        WHERE `ID_QUIZ` = ".$id_quiz;
$quiz = mysqli_query($con, $quiz_sql) or die(mysqli_error($con));

  $smarty->assign(array(
    'resultados' => $quiz,
  ));


if(Tools::getValue("iniciar_quiz") == 1){
  $iniciar = sprintf('update turma_quiz set INICIADO="1"
  where ID_QUIZ = "%s"  AND ID_TURMA = "%s" ', $id_quiz,$id_turma);

  $rodada = sprintf('update turma_quiz set RODADA="1"
  where ID_QUIZ = "%s"  AND ID_TURMA = "%s"', $id_quiz,$id_turma);
  $upRodada = mysqli_query($con, $rodada);

  try {
    if(!mysqli_query($con, $iniciar)){
      $iniciado= 0;
      throw new Exception ("Erro ao iniciar!");
    }else{
      $iniciado= 1;
    }
  } catch (Exception $ex) {
    echo $ex->getMessage();
    mysqli_rollback($con);
  }
  mysqli_commit($con);

  $smarty->assign("iniciado", $iniciado);

}



$smarty->display('quiz_admin.tpl');

}
?>
