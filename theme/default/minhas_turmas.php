<?php
if($_SESSION){
$smarty = new Smarty;
$smarty->template_dir = 'theme/default/paginas/';
$smarty->config_dir = 'theme/default/';
$smarty->error_reporting = E_ALL & ~E_NOTICE;
$user_id = $_SESSION["UsuarioID"];
$smarty->assign('user_id', $user_id);
$con = conecta_db();


if(Tools::getValue("enviado")==1){
  $smarty->assign('enviado', "Sua matrícula foi enviada ao professor, aguarde aprovação para ver sua turma!");
}
if(Tools::isSubmit("ver_turma")){
if(Tools::getValue("id-turma")){
$id_turma = Tools::getValue("id-turma");
  $sql = "SELECT distinct t.`ID_TURMA`, t.`NOME` as nome_turma, t.`SIGLA`, u.`NOME` as nome_aluno, u.`ID_USUARIO` as id_aluno
  FROM `turma` t,`turma_aluno`ta, `usuario` u
  WHERE t.`ID_TURMA` = ta.`ID_TURMA`
  AND ta.`ID_USUARIO` = u.`ID_USUARIO`
  AND ta.`ID_TURMA` = ".$id_turma;
  $resultados = mysqli_query($con, $sql) or die(mysqli_error($con));
  if($resultados->num_rows > 0){
    while ( $rs = mysqli_fetch_array( $resultados ) ) {
      $level_aluno[] = getLevel($rs["id_aluno"], $con);
      $toda_turma[] =$rs ;
    }
    $smarty->assign("level_aluno", $level_aluno);
    $smarty->assign('toda_turma', $toda_turma);
  }
}
}else{
  $sql = "SELECT distinct t.`ID_TURMA`, ta.`status`, t.`NOME` as nome_turma, t.`SIGLA`, u.`NOME` as nome_aluno
                FROM `turma` t,`turma_aluno`ta, `usuario` u
                WHERE t.`ID_TURMA` = ta.`ID_TURMA`
                AND ta.`ID_USUARIO` = u.`ID_USUARIO`
                AND ta.`status` = 'A'
                AND u.`ID_USUARIO` = ".$_SESSION['UsuarioID'];

  $resultados = mysqli_query($con, $sql) or die(mysqli_error($con));
  if($resultados->num_rows > 0){
    while ( $rs = mysqli_fetch_array( $resultados ) ) {
      $todas_turmas[] =$rs ;
    }
    $smarty->assign('turmas', $todas_turmas);
  }else{
    $smarty->assign('alerta', "Você não está matriculado em nenhuma turma!");
  }
}
// $resultados = NULL;


$smarty->display('minhas_turmas.tpl');

}else{
  header("Location: index.php?pag=login");

}
?>
