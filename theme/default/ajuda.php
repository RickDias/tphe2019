<?php

// include 'menu.tpl';
$smarty = new Smarty;
$smarty->template_dir = 'theme/default/paginas';
$smarty->config_dir = 'themes/default';
$smarty->caching = false;
$smarty->error_reporting = E_ALL & ~E_NOTICE;

$con = conecta_db();

$id_usuario = $_SESSION["UsuarioID"];

$sql_problem='select c.valor, c.id_img from configuration c where c.campo = "problema" ';

$problemas = mysqli_query($con,$sql_problem) or die(mysqli_error($con));

if($problemas->num_rows > 0){
while ( $rs = mysqli_fetch_array( $problemas ) ) {
  $problema[] = $rs;
}

$smarty->assign("problemas", $problema);
}

$smarty->display('ajuda.tpl');


?>
