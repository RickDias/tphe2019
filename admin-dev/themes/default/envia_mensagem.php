<?php
// session_start();

// include('../functions/functions.php');
// include('../config/config.php');

$id_usuario = $_POST['usuario'];
$txt_mensagem = trim(addslashes($_POST['texto_mensagem']));
$today = date("Y-m-d H:i:s");
// var_dump($txt_mensagem);exit;
$classe_VO = include_VO2('admensagem');
$classe_DAO = include_DAO2('admensagem');

include($classe_VO);
include($classe_DAO);

	$link = conecta_db();

  $admensagemVO= new admensagemVO();

	$admensagemVO->setId_usuario($id_usuario);
  $admensagemVO->setMensagem($txt_mensagem);
  $admensagemVO->setData($today);

  $admensagemDAO = new admensagemDAO();
  $admensagemDAO->insert($admensagemVO, $link);

  printf('Registros inseridos com sucesso. ');

	//commita

	desconecta_db($link);
?>
<script language="JavaScript">
window.location="../admin-dev/index_base.php";
</script>
