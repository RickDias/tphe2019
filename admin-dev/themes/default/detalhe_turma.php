<?php

$smarty = new Smarty;
$smarty->template_dir = 'themes/default/template/';
$smarty->config_dir = 'theme/default/';
$smarty->cache_dir = 'cache';
$smarty->error_reporting = E_ALL & ~E_NOTICE;


// Tenta se conectar ao servidor MySQL
$con = conecta_db();
$id_turma= Tools::getValue("id_turma");
//criando a query de consulta à tabela
$sql = mysqli_query($con, "SELECT distinct ta.`ID_TURMA`,ta.`status`, ta.`ID_USUARIO`, t.`codigo_turma`,t.`SIGLA`,t.`NOME` as nome_turma,t.`SEMESTRE`,t.`ANO`,u.`NOME` as nome_aluno, u.`ID_USUARIO`, sa.`pontos_geral`
              FROM `turma_aluno` ta , `turma` t, `usuario` u, `sala_alunos` sa
              WHERE t.`ID_TURMA` = ta.`ID_TURMA`
              AND ta.`ID_USUARIO` = u.`ID_USUARIO`
              AND ta.`ID_USUARIO` = sa.`id_aluno`
              and ta.`ID_TURMA` = ".$id_turma." ");

while($result = mysqli_fetch_assoc($sql)) {
  $dados_turma[] = $result;
}
$smarty->assign(array(
  'dados_turma' => $dados_turma,
));

$smarty->display('detalhe_turma.tpl');
