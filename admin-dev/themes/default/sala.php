<?php

$smarty = new Smarty;
$smarty->template_dir = 'themes/default/template/';
$smarty->config_dir = 'theme/default/';

$con = conecta_db();
$classe_DAO = include_DAO2('quiz');
require $classe_DAO;
$quizDAO = new quizDAO();
$id_quiz = Tools::getValue('id_quiz');
if($id_quiz){
  $smarty->assign(array(
    'id_quiz' => $id_quiz,
  ));
}

// abrir sala
if(Tools::getValue('abrir_sala')){
if($id_quiz){
  $status = "S";
  $update = $quizDAO->updateStatus($id_quiz,$status,$con);
}

$classe_VO = include_VO2('sala_aluno');
$classe_DAO = include_DAO2('sala_aluno');
require $classe_VO;
require $classe_DAO;

  $sala_alunoVO = new sala_alunoVO();
  $sala_alunoDAO = new sala_alunoDAO();
  $todos_alunos = $sala_alunoDAO->getLikeStatus($con,"S");
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
if(Tools::getValue('fechar_sala')){
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
