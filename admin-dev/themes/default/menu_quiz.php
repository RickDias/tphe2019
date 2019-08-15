<?php

$smarty = new Smarty;
$smarty->template_dir = 'themes/default/template/';
$smarty->config_dir = 'theme/default/';


  switch ($_POST['enviar']) {
    case 'jogar':
    $smarty->assign(array(
      'texto' => "Prepare-se! Faça a leitura do QRCode gerado com seu app TPhE"
    ));
    include ('themes/default/jogar.php');
      break;

    case 'relat':
    $smarty->assign(array(
      'texto' => "Perguntas do Quiz"
    ));
      include ('_quizperguntas.php');
      break;

    case 'edita':
    $smarty->assign(array(
      'texto' => "Editar Quiz"
    ));
      include ('_editaquiz.php');
      break;

    case 'apaga':
      echo "Apagar";
      break;
    default:
      //no action sent
  }

// $classe_VO = include_VO('usuario');
// $classe_DAO = include_DAO('usuario');

// require $classe_VO;
// require $classe_DAO;


  // $usuarioVO = new usuarioVO();
  // $usuarioDAO = new usuarioDAO();
  // $con = conecta_db();
  // $todos_usuarios = $usuarioDAO->getAll($con);


  $smarty->display('menu_quiz.tpl');
