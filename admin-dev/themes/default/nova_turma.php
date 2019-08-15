<?php

$smarty = new Smarty;
$smarty->template_dir = 'themes/default/template/';
$smarty->config_dir = 'theme/default/';
$smarty->cache_dir = 'cache';

// Tenta se conectar ao servidor MySQL
$con = conecta_db();

//criando a query de consulta à tabela
$sql = mysqli_query($con, "SELECT `disciplina`.`ID_DISCIPLINA`, `disciplina`.`NOME` as 'disciplina' FROM `disciplina`");

while($aux = mysqli_fetch_assoc($sql)) {
$smarty->assign(array(
    'aux' => $aux,

));
}
$smarty->display('nova_turma.tpl');
