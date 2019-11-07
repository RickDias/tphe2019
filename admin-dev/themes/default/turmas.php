<?php

$smarty = new Smarty;
$smarty->template_dir = 'themes/default/template/';
$smarty->config_dir = 'theme/default/';
$smarty->cache_dir = 'cache';

// Tenta se conectar ao servidor MySQL
$con = conecta_db();

//criando a query de consulta à tabela
$sql = mysqli_query($con, "SELECT `turma`.`ID_TURMA`, `turma`.`codigo_turma`, `turma`.`ANO`, `turma`.`SEMESTRE`, `turma`.`NOME`, `turma`.`SIGLA`,
              `turma`.`ID_USUARIO`, `disciplina`.`NOME` as 'disciplina'
              FROM `turma` , `disciplina`
              WHERE `turma`.`ID_DISCIPLINA` = `disciplina`.`ID_DISCIPLINA`
              and `turma`.`ID_USUARIO` = ".$_SESSION['UsuarioID']) or die(mysqli_error($con));

while($result = mysqli_fetch_assoc($sql)) {
  $turma[] = $result;
}
$smarty->assign(array(
  'result' => $turma,
));

$smarty->display('turmas.tpl');
