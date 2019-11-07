<?php

$smarty = new Smarty;
$smarty->template_dir = 'theme/default/paginas/';
$smarty->config_dir = 'theme/default/';
$smarty->cache_dir = 'cache';

$classe_VO = include_VO('usuario');
$classe_DAO = include_DAO('usuario');

require $classe_VO;
require $classe_DAO;

if(Tools::getValue("salva_cadastro")==1){

  // var_dump("salvar_enviado");

  if ($_POST['confirm_password'] == $_POST['user_password']) {
		// require_once '../config/config.php';
		// require_once '../functions/functions.php';
		// require_once '../class/usuario/usuarioDAO.php';
		// require_once '../class/usuario/usuarioVO.php';

		$link = conecta_db();

		$usuarioVO = new usuarioVO();

		$usuarioVO->setNome($_POST['nome_user']);
		$usuarioVO->setEmail($_POST['email']);
		$usuarioVO->setSenha(sha1($_POST['user_password']));
		$usuarioVO->setId_tipo_usuario($_POST['optionsRadios']);

		$usuarioDAO = new usuarioDAO();

		//set mysql/false autocomit false
		//inicia transacao

		$usuarioDAO->insert($usuarioVO, $link);

		printf('Registro inserido com sucesso.');
    header("Location: index.php?pag=login");


		//commita

		desconecta_db($link);
	} else  {
		echo "Senhas não conferem";
	}

}

  $smarty->display('cadastro.tpl');

  // $usuarioVO = new usuarioVO();
  // $usuarioDAO = new usuarioDAO();
  // $con = conecta_db();
  // $todos_usuarios = $usuarioDAO->getAll($con);
  // $base_facebook = 'https://facebook.com/profile.php?id=';
  //
  //
  // foreach($todos_usuarios as $usuario){
  //   if($usuario->id_tipo_usuario==1){
  //     $tipo[] ='Administrador';
  //   }elseif($usuario->id_tipo_usuario==2){
  //     $tipo[] ='Professor';
  //   }else{
  //     $tipo[] ='Aluno';
  //   }
  // }
  // $smarty->assign(array(
  //     'usuarios' => $todos_usuarios,
  //     'tipo' => $tipo,
  //     'base_facebook' => $base_facebook
  //
  // ));
