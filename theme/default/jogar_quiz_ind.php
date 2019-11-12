<?php
if($_SESSION){
// include 'menu.tpl';
$smarty = new Smarty;
$smarty->template_dir = 'theme/default/paginas';
$smarty->config_dir = 'themes/default';
$smarty->caching = false;
$smarty->error_reporting = E_ALL & ~E_NOTICE;

// $smarty->assign('menu_lateral', include "lateral_jogador.php");
$con = conecta_db();
$id_usuario = $_SESSION["UsuarioID"];
$id_quiz= Tools::getValue("id-quiz");
//get PONTOS
// if($id_quiz && $id_usuario){
// $level_aluno = getLevel($id_usuario, $con);
// $smarty->assign("level", $level_aluno);
// $smarty->assign("score", 0);
// }


if($id_quiz){
  $smarty->assign(array(
    'id_quiz' => $id_quiz,
    'id_usuario' => $id_usuario,

  ));
}

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

if(Tools::isSubmit("enviar")){
  if(!$aluno_salvo){
    $insert_aluno = $sala_alunoDAO->insert($sala_alunoVO,$con);
  }else{
    $status = $aluno_salvo[0]->visivel;
    if ($status == "S"){
      // $status_aluno = $sala_alunoDAO->updateStatus($id_usuario,"N",$con);
    }else{
      $status_aluno = $sala_alunoDAO->updateStatus($id_usuario,"S",$con);
    }
    // var_dump($status_aluno);
  }
}

if ($id_quiz){
  // pergunta quiz
  // $pergunta_quiz_DAO = include_DAO('pergunta_quiz');
  // require_once $pergunta_quiz_DAO;
  // $pergunta_quizDAO = new pergunta_quizDAO();
  // $perguntas_quiz = $pergunta_quizDAO->getPerguntas($con,$id_quiz);
  // foreach($perguntas_quiz as $key=>$pergunta_quiz){
  //   $id_pergunta[$key] = $pergunta_quiz->getId_pergunta();
  // }
  // pergunta
  $freq = [];
  for($x = 0; $x < 10; $x++){
    $number = mt_rand(10,608);
    if(!in_array($number, $freq)){
      $freq[] = $number;
    }
}
// var_dump($freq);
$id_pergunta = $freq;

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

$sql = sprintf("select sa.`id_aluno` as id_aluno, u.`NOME`, sa.`pontos_geral`, u.`img_perfil`
from sala_alunos sa
LEFT JOIN usuario u on (sa.`id_aluno` = u.`ID_USUARIO`)
where `visivel` = 'S' ");
$resultado = mysqli_query($con,$sql) or die(mysqli_error($con));
if($resultado->num_rows > 0){

while ( $rs = mysqli_fetch_array( $resultado ) ) {
   $todos_alunos[] =$rs ;
   $level_aluno = getLevel($rs["id_aluno"], $con);
}
$smarty->assign("level", $level_aluno);
$smarty->assign("score", 0);
$smarty->assign("alunos", $todos_alunos);

}

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
      //where ID_QUIZ = "%s" ', $objVO->getDescricao() , $objVO->getDt_inicio(), $objVO->getDt_fim(), $objVO->getPublicacao(), $objVO->getId_quiz()  );
      try {
        if(!mysqli_query($link, $sql2)){
          throw new Exception ("Erro ao alterar quiz!");
        }
      } catch (Exception $ex) {
        echo $ex->getMessage();
        mysqli_rollback($link);
      }
      mysqli_commit($link);
    }else{
      $query = sprintf('INSERT INTO pontuacao ( id_ususario, pontuacao )'.'VALUES ("%s","%s")',
               $id_usuario, $pontuacao);
      try {
          if (mysqli_query($link, $query)) {
              mysqli_commit($link);
              $objVO->setId_quiz(mysqli_insert_id($link));
              return $objVO;
          } else {
              throw new Exception('Erro ao cadastrar!');
          }
      } catch (Exception $e) {
          echo $e->getMessage();
          mysqli_rollback($link);
      }
    }


    $status_aluno = $sala_alunoDAO->updateStatus($id_usuario,"N",$con);
    header("Location: index.php?pag=login");
  }

$smarty->display('jogar_quiz_ind.tpl');
}else{
  header("Location: index.php?pag=login");

}


}
?>
