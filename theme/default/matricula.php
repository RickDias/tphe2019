<?php
if($_SESSION){
$smarty = new Smarty;
$smarty->template_dir = 'theme/default/paginas/';
$smarty->config_dir = 'theme/default/';
$smarty->error_reporting = E_ALL & ~E_NOTICE;

$con = conecta_db();
if(Tools::isSubmit("verificar_codigo")){
if(Tools::getValue("cod_turma")){
$codigo_turma = Tools::getValue("cod_turma");
$id_usuario = $_SESSION["UsuarioID"];


  $sql = "SELECT t.`ID_TURMA`, t.`NOME` as nome_turma, t.`SIGLA`, t.`codigo_turma`
  FROM `turma` t
  WHERE t.`codigo_turma` = ".$codigo_turma;

  $resultado = mysqli_query($con, $sql) or die(mysqli_error($con));
  if($resultado->num_rows > 0){
    while ( $rs = mysqli_fetch_array( $resultado) ) {
      $resp_turma_id =$rs["ID_TURMA"] ;
    }
    if($resp_turma_id){
      $query = sprintf('INSERT INTO turma_aluno ( `ID_TURMA`, `ID_USUARIO` )'.'VALUES ("%s","%s")',
               $resp_turma_id, $id_usuario);
      try {
          if (mysqli_query($con, $query)) {
              mysqli_commit($con);
          } else {
              throw new Exception('Erro ao cadastrar!');
          }
      } catch (Exception $e) {
          echo $e->getMessage();
          mysqli_rollback($con);
      }

      header("Location: index.php?pag=minhas_turmas&enviado=1");
    }
  }
}


}

$smarty->display('matricula.tpl');

}else{
  header("Location: index.php?pag=login");

}
?>
