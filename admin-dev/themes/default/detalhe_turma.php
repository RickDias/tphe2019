<?php

$smarty = new Smarty;
$smarty->template_dir = 'themes/default/template/';
$smarty->config_dir = 'theme/default/';
$smarty->cache_dir = 'cache';
$smarty->error_reporting = E_ALL & ~E_NOTICE;


// Tenta se conectar ao servidor MySQL
$con = conecta_db();
$id_turma= Tools::getValue("id_turma");
if(Tools::getValue("adiciona_aluno") == 1){

  $id_aluno= Tools::getValue("id_aluno");

  $sql = sprintf('update turma_aluno set status="%s"
  where id_usuario = "%s" AND id_turma = "%s" ', "A" , $id_aluno, $id_turma);
  try {
    if(!mysqli_query($con, $sql)){
      throw new Exception ("Erro ao alterar quiz!");
    }
  } catch (Exception $ex) {
    echo $ex->getMessage();
    mysqli_rollback($con);
  }
  mysqli_commit($con);

}
if(Tools::getValue("remove_aluno") == 1){

  $id_aluno= Tools::getValue("id_aluno");

  $sql = sprintf('update turma_aluno set status="%s"
  where id_usuario = "%s" ', "R" , $id_aluno);
  try {
    if(!mysqli_query($con, $sql)){
      throw new Exception ("Erro ao alterar quiz!");
    }
  } catch (Exception $ex) {
    echo $ex->getMessage();
    mysqli_rollback($con);
  }
  mysqli_commit($con);

}
$query = "SELECT distinct ta.`ID_TURMA`,ta.`status`, ta.`ID_USUARIO`, t.`codigo_turma`,t.`SIGLA`,t.`NOME` as nome_turma,t.`SEMESTRE`,t.`ANO`,u.`NOME` as nome_aluno, u.`ID_USUARIO`
              FROM `turma_aluno` ta , `turma` t, `usuario` u, `sala_alunos` sa
              WHERE t.`ID_TURMA` = ta.`ID_TURMA`
              AND ta.`ID_USUARIO` = u.`ID_USUARIO`
              and ta.`ID_TURMA` = ".$id_turma;
              // var_dump($id_turma);
//criando a query de consulta à tabela
$sql = mysqli_query($con, $query);
if($sql->num_rows > 0){
while($result = mysqli_fetch_assoc($sql)) {
  $dados_turma[] = $result;
}
$smarty->assign(array(
  'dados_turma' => $dados_turma,
));
}

$smarty->display('detalhe_turma.tpl');
