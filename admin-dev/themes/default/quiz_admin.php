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

  if(Tools::getValue("terminar")==1){

    $sql = sprintf("select p.`id_pontuacao`, p.`id_usuario`, p.`pontuacao`
    from pontuacao p
    where p.`id_usuario` = '.$id_usuario.' ");
    $resultado = mysqli_query($con,$sql) or die(mysqli_error($con));
    $pontuacao = Tools::getValue("score_val");

    if($resultado){
      $sql2 = sprintf('update pontuacao set pontuacao="%s"
      where id_usuario = "%s" ', $pontuacao , $id_usuario);
      try {
        if(!mysqli_query($con, $sql2)){
          throw new Exception ("Erro ao alterar quiz!");
        }
      } catch (Exception $ex) {
        echo $ex->getMessage();
        mysqli_rollback($con);
      }
      mysqli_commit($con);
    }else{
      $query = sprintf('INSERT INTO pontuacao ( id_ususario, pontuacao )'.'VALUES ("%s","%s")',
               $id_usuario, $pontuacao);
      try {
          if (mysqli_query($con, $query)) {
              mysqli_commit($con);
              $objVO->setId_quiz(mysqli_insert_id($con));
              return $objVO;
          } else {
              throw new Exception('Erro ao cadastrar!');
          }
      } catch (Exception $e) {
          echo $e->getMessage();
          mysqli_rollback($con);
      }
    }

    $status_aluno = $sala_alunoDAO->updateStatus($id_usuario,"N",$con);
    header("Location: index.php?pag=login");
  }

if(Tools::getValue("iniciar_quiz") == 1){
  $iniciar = sprintf('update quiz set INICIADO="1"
  where ID_QUIZ = "%s" ', $id_quiz);
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
