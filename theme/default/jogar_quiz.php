<?php
if($_SESSION){
// include 'menu.tpl';
$smarty = new Smarty;
$smarty->template_dir = 'theme/default/paginas';
$smarty->config_dir = 'themes/default';
$smarty->caching = false;
// $smarty->assign('menu_lateral', include "lateral_jogador.php");
$con = conecta_db();
$id_usuario = $_SESSION["UsuarioID"];
$id_quiz= Tools::getValue("id-quiz");
$id_turma= Tools::getValue("id-turma");

$sala_aluno_VO = include_VO('sala_aluno');
$sala_aluno_DAO = include_DAO('sala_aluno');
require_once $sala_aluno_VO;
require_once $sala_aluno_DAO;

$sala_alunoVO = new sala_alunoVO();
$sala_alunoVO->setId_aluno($id_usuario);
$sala_alunoVO->setVisivel("S");
$sala_alunoVO->setId_pontuacao(1);


$sala_alunoDAO = new sala_alunoDAO();
$aluno_salvo = $sala_alunoDAO->getById($con,$id_usuario);

if(Tools::isSubmit("jogar")){
  if(!$aluno_salvo){
    $insert_aluno = $sala_alunoDAO->insert($sala_alunoVO,$con);
  }else{
    $status = $aluno_salvo[0]->visivel;
    if ($status == "S"){
      $status_aluno = $sala_alunoDAO->updateStatus($id_usuario,"N",$con);
    }else{
      $status_aluno = $sala_alunoDAO->updateStatus($id_usuario,"S",$con);
    }
    // var_dump($status_aluno);
  }
}

if ($id_quiz && $id_turma){
  // pergunta quiz
  $pergunta_quiz_DAO = include_DAO('pergunta_quiz');
  require_once $pergunta_quiz_DAO;
  $pergunta_quizDAO = new pergunta_quizDAO();
  $perguntas_quiz = $pergunta_quizDAO->getPerguntas($con,$id_quiz);
  foreach($perguntas_quiz as $key=>$pergunta_quiz){
    $id_pergunta[$key] = $pergunta_quiz->getId_pergunta();
  }
  // pergunta
  $pergunta_DAO = include_DAO('pergunta');
  require_once $pergunta_DAO;
  $perguntaDAO = new perguntaDAO();
  foreach($id_pergunta as $key=>$id_perg){
    $perguntas[$key] = $perguntaDAO->getPerguntas($con,$id_perg);
  }
  $smarty->assign("perguntas", $perguntas);

  $resposta_DAO = include_DAO('resposta');
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

$smarty->display('jogar_quiz.tpl');
}else{
  header("Location: index.php?pag=login");

}


}
?>
