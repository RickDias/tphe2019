<?php
if($_SESSION){
$smarty = new Smarty;
$smarty->template_dir = 'theme/default/paginas/';
$smarty->config_dir = 'theme/default/';

$jogo = Tools::getValue("jogo");
if($jogo!= NULL){
  include "$jogo.php";
}
}else{
  header("Location: index.php?pag=login");

}
?>
