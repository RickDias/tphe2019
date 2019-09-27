<?php

$smarty = new Smarty;
$smarty->template_dir = 'themes/default/template/';
$smarty->config_dir = 'theme/default/';

$con = conecta_db();
$classe_DAO = include_DAO2('quiz');
require $classe_DAO;
$quizDAO = new quizDAO();
$id_quiz = Tools::getValue('id_quiz');
$id_turma = Tools::getValue('id_turma');
if($id_quiz){
  $smarty->assign(array(
    'id_quiz' => $id_quiz,
  ));
}
// abrir sala
if(Tools::getValue('abrir_sala') == 1){
if($id_quiz){
  $status = "S";
  $update = $quizDAO->updateStatus($id_quiz,$status,$con);
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
  $smarty->display('sala.tpl');
}
// abrir sala

// fechar sala
if(Tools::getValue('fechar_sala')==1){
  if($id_quiz){
    $status = "N";
  $update = $quizDAO->updateStatus($id_quiz,$status,$con);
  }

  ?>
  <script language="JavaScript">
  window.location="../admin-dev/index_base.php";
  </script>
  <?php

}

// fechar sala
