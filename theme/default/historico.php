<?php
if($_SESSION){
// include 'menu.tpl';
$smarty = new Smarty;
$smarty->template_dir = 'theme/default/paginas';
$smarty->config_dir = 'themes/default';
$smarty->caching = false;
$smarty->error_reporting = E_ALL & ~E_NOTICE;

$con = conecta_db();
$id_usuario = $_SESSION["UsuarioID"];

$sql_turmas="SELECT distinct t.`NOME` as turma, u.`NOME` as usuario, p.`pontos`, q.`DESCRICAO`, q.`ID_QUIZ`
FROM turma t, turma_aluno ta, usuario u, pontuacao p, quiz q, turma_quiz tq
WHERE ta.`ID_USUARIO` = ".$id_usuario."
AND ta.`ID_TURMA` = t.`ID_TURMA`
AND ta.`ID_USUARIO` = u.`ID_USUARIO`
AND p.`id_usuario` = ta.`ID_USUARIO`
AND q.`ID_QUIZ` = tq.`ID_QUIZ`
group BY t.`ID_TURMA`"; //group BY t.`ID_TURMA`
// var_dump($sql_turmas);
$turma_res = mysqli_query($con,$sql_turmas) or die(mysqli_error($con));
if($turma_res->num_rows > 0){
while ( $rs = mysqli_fetch_array( $turma_res ) ) {
  $turmas[] = $rs;
  $id_quiz[] = $rs["ID_QUIZ"];
}
$smarty->assign("turmas", $turmas);
foreach($id_quiz as $id){
  $sql_pontos="SELECT distinct p.pontos, p.id_quiz
  FROM pontuacao p
  WHERE p.`id_usuario` = ".$id_usuario."
  AND p.`id_quiz` = ".$id."
  ";
  $pontos_res = mysqli_query($con,$sql_pontos) or die(mysqli_error($con));
  if($pontos_res->num_rows > 0){
  while ( $res = mysqli_fetch_array( $pontos_res ) ) {
    $pontos[] = $res;
  }
  $smarty->assign("pontos", $pontos);
}
}
}

// $sql_turmas;


$smarty->display('historico.tpl');

}else{
  header("Location: index.php?pag=login");

}

?>
