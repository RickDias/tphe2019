<?php
$smarty = new Smarty;
$smarty->template_dir = 'themes/default/template/';
$smarty->config_dir = 'theme/default/';
$smarty->error_reporting = E_ALL & ~E_NOTICE;


$con = conecta_db();
$classe_DAO = include_DAO2('turma_quiz');
require $classe_DAO;
$quizDAO = new turma_quizDAO();
$id_quiz = Tools::getValue('id_quiz');
$id_turma = Tools::getValue('id_turma');

$sql_turma = "SELECT t.`NOME`, t.`SEMESTRE`
              FROM `turma` t
              WHERE t.`ID_TURMA` = ".$id_turma;
$nome_turma = mysqli_query($con, $sql_turma);
if($nome_turma->num_rows > 0){
  while($result = mysqli_fetch_assoc($nome_turma)) {
    $smarty->assign("nome_turma", $result["NOME"]);
    $smarty->assign("semestre", $result["SEMESTRE"]);

}}
if($id_quiz){
  $smarty->assign(array(
    'id_quiz' => $id_quiz,
    'id_turma' => $id_turma,
  ));
}
// abrir sala
if(Tools::getValue('fechar_sala') == 1){
  if($id_quiz){
    $status = "0";
    $update = $quizDAO->updateStatus($id_quiz,$id_turma,$status,$con);
    ?>
    <script language="JavaScript">
    window.location="index_base.php";
    </script>
    <?php

  }
}
if(Tools::getValue('abrir_sala') == 1){
if($id_quiz){
  $status = "1";
  $update = $quizDAO->updateStatus($id_quiz,$id_turma,$status,$con);
  if(Tools::getValue("rodada") != null){
    $rodada = Tools::getValue("rodada");
    $update = $quizDAO->updateRodada($id_quiz,$id_turma,$rodada,$con);
  }else{
    $update = $quizDAO->updateRodada($id_quiz,$id_turma,"0",$con);
  }
}
if(Tools::getValue("fechar_quiz")==1){
  $fechar = sprintf('update turma_quiz set INICIADO="0"
  where ID_QUIZ = "%s" AND ID_TURMA = "%s" ', $id_quiz,$id_turma);
  try {
    if(!mysqli_query($con, $fechar)){
      $iniciado= 1;
      throw new Exception ("Erro ao iniciar!");
    }else{
      $iniciado= 0;
    }
  } catch (Exception $ex) {
    echo $ex->getMessage();
    mysqli_rollback($con);
  }
  mysqli_commit($con);

  $smarty->assign("iniciado", $iniciado);
}
$query = "SELECT distinct ta.`ID_TURMA`, ta.`ID_USUARIO`, t.`codigo_turma`,t.`SIGLA`,t.`NOME` as nome_turma,t.`SEMESTRE`,t.`ANO`,u.`NOME` as nome_aluno, u.`ID_USUARIO`
              FROM `turma_aluno` ta , `turma` t, `usuario` u, `sala_alunos` sa, `turma_quiz` tq
              WHERE t.`ID_TURMA` = ta.`ID_TURMA`
              AND tq.`ID_TURMA` = ".$id_turma."
              AND tq.`ID_TURMA` = t.`ID_TURMA`
              AND sa.`visivel` = 'S'
              AND sa.`ID_ALUNO` = u.`ID_USUARIO`
              AND tq.`ID_QUIZ` = ".$id_quiz."
              AND ta.`ID_USUARIO` = u.`ID_USUARIO`" ;
$sql = mysqli_query($con, $query);
if($sql->num_rows > 0){
  while($result = mysqli_fetch_assoc($sql)) {
    $todos_alunos[] = $result;
  }
  if($todos_alunos){
    // while($aux = mysqli_fetch_assoc($id_perguntas)) {
    $smarty->assign(array(
      'alunos' => $todos_alunos,
    ));

  }else{
    $smarty->assign(array(
      'alerta' => "Sem dados"
    ));
  }
}
  $smarty->display('sala.tpl');
}
// abrir sala
// fechar sala
