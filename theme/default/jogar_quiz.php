<?php
if($_SESSION){
// include 'menu.tpl';
$smarty = new Smarty;
$smarty->template_dir = 'theme/default/paginas';
$smarty->config_dir = 'themes/default';
$smarty->caching = false;
// $smarty->assign('menu_lateral', include "lateral_jogador.php");
$con = conecta_db();

$id_quiz= Tools::getValue("id-quiz");
$id_turma= Tools::getValue("id-turma");

// var_dump($id_quiz);
$perguntas = "SELECT pq.`ID_PERGUNTA`
        FROM `pergunta_quiz` pq
        WHERE pq.`ID_QUIZ` = ".$id_quiz." limit 10";

$id_perguntas = mysqli_query($con, $perguntas) or die(mysqli_error($con));
while($aux = mysqli_fetch_assoc($id_perguntas)) {
  $txt_pergunta = "SELECT p.`ID_PERGUNTA`, p.`DESCRICAO`, p.`PONTUACAO`
          FROM `pergunta` p
          WHERE p.`ID_PERGUNTA` = ".$aux["ID_PERGUNTA"];
  $dados_perguntas = mysqli_query($con, $txt_pergunta) or die(mysqli_error($con));

  while($aux2 = mysqli_fetch_assoc($dados_perguntas)) {
    $array_perguntas[]=$aux2;
    $smarty->assign("perguntas", $array_perguntas);
    $respostas = "SELECT r.`ID_RESPOSTA`, r.`RESPOSTA`, r.`TIPO`, r.`ID_PERGUNTA`
    FROM `resposta` r
    WHERE r.`ID_PERGUNTA` = ".$aux2["ID_PERGUNTA"];
    $dados_respostas = mysqli_query($con, $respostas) or die(mysqli_error($con));

  }
  while($aux3 = mysqli_fetch_assoc($dados_respostas)) {
    $array_respostas[]=$aux3;
    $smarty->assign("respostas", $array_respostas);
    // $txt_resposta = $aux3;
  }
  // var_dump($array_respostas);
        }
        // var_dump($txt_pergunta);
//criando a query de consulta à tabela
// session_start();
// if($_SESSION){
//   $user_id = $_SESSION["UsuarioID"];
//
$quiz_sql = "SELECT *
        FROM `quiz`
        WHERE `ID_QUIZ` = ".$id_quiz;
$quiz = mysqli_query($con, $quiz_sql) or die(mysqli_error($con));


  $smarty->assign(array(
    'resultados' => $quiz,
    // 'cessao' => $_SESSION,
  ));
//
// }


$smarty->display('jogar_quiz.tpl');
}else{
  header("Location: index.php?pag=login");

}

?>
