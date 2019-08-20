<?php
session_start();

include('functions.php');
include('../config/config.php');

$id_usuario = $_POST['usuario'];
$txt_mensagem = $_POST['texto_mensagem'];

$classe_VO = include_VO2('resposta');
$classe_DAO = include_DAO2('resposta');

include($classe_VO);
include($classe_DAO);

	$link = conecta_db();

  $respostaVO= new respostaVO();

  $respostaVO->setResposta($_POST['txtrespcerta']);
  $respostaVO->setTipo('V');
  $respostaVO->setId_pergunta($_POST['idpergunta']);

  $respostaDAO = new respostaDAO();
  $respostaDAO->insert($respostaVO, $link);

  $respostaVO= new respostaVO();

  $respostaVO->setResposta($_POST['txtresperr1']);
  $respostaVO->setTipo('F');
  $respostaVO->setId_pergunta($_POST['idpergunta']);

  $respostaDAO = new respostaDAO();
  $respostaDAO->insert($respostaVO, $link);

  $respostaVO= new respostaVO();

  $respostaVO->setResposta($_POST['txtresperr2']);
  $respostaVO->setTipo('F');
  $respostaVO->setId_pergunta($_POST['idpergunta']);

  $respostaDAO = new respostaDAO();
  $respostaDAO->insert($respostaVO, $link);

  $respostaVO= new respostaVO();

  $respostaVO->setResposta($_POST['txtresperr3']);
  $respostaVO->setTipo('F');
  $respostaVO->setId_pergunta($_POST['idpergunta']);

  $respostaDAO = new respostaDAO();
  $respostaDAO->insert($respostaVO, $link);
  printf('Registros inseridos com sucesso. ');

	//commita

	desconecta_db($link);
?>

<html lang="pt-br">
    </br></br><a href="../admin-dev/index_base.php" class="alert-link">Voltar para a tela administrativa</a>
</html>
