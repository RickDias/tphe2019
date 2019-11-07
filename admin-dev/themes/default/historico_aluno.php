<?php
if($_SESSION){
// include 'menu.tpl';
$smarty = new Smarty;
$smarty->template_dir = 'themes/default/template';
$smarty->config_dir = 'themes/default';
$smarty->caching = false;
$smarty->error_reporting = E_ALL & ~E_NOTICE;

$con = conecta_db();
$id_usuario = Tools::getValue("id_aluno");
$id_turma = Tools::getValue("id_turma");
$smarty->assign("id_turma", $id_turma);

$level_aluno = getLevel($id_usuario, $con);
$smarty->assign("level_aluno", $level_aluno);

$sql_turmas="SELECT DISTINCT t.`NOME` as turma,count(p.`pontos`) AS acertos, sum(p.`pontos`) AS pontos , q.`DESCRICAO`,q.`ID_QUIZ`
FROM turma t, turma_aluno ta, usuario u, pontuacao p, quiz q, turma_quiz tq
WHERE ta.`ID_USUARIO` = ".$id_usuario."
AND ta.`ID_TURMA` = tq.`ID_TURMA`
AND ta.`ID_TURMA` = t.`ID_TURMA`
AND tq.`ID_TURMA` = t.`ID_TURMA`
AND u.`ID_USUARIO` = ".$id_usuario."
AND p.`id_usuario` = ".$id_usuario."
AND p.`id_quiz` = tq.`ID_QUIZ`
AND q.`ID_QUIZ` = tq.`ID_QUIZ`
GROUP BY ta.ID_TURMA";
// group BY u.`ID_USUARIO`"; //group BY t.`ID_TURMA`
// var_dump($sql_turmas);
$turma_res = mysqli_query($con,$sql_turmas) or die(mysqli_error($con));
if($turma_res->num_rows > 0){
while ( $rs = mysqli_fetch_array( $turma_res ) ) {
  $turmas[] = $rs;
}
$smarty->assign("turmas", $turmas);
}
// $sql_turmas;


$smarty->display('historico_aluno.tpl');

}else{
  header("Location: index.php");

}

?>
