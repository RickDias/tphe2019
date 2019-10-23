<?php
if($_SESSION){
$smarty = new Smarty;
$smarty->template_dir = 'theme/default/paginas/';
$smarty->config_dir = 'theme/default/';
$smarty->error_reporting = E_ALL & ~E_NOTICE;
$smarty->assign("upd_pass", 0);
$usuario_id = $_SESSION['UsuarioID'];

$classe_VO = include_VO('usuario');
$classe_DAO = include_DAO('usuario');

require $classe_VO;
require $classe_DAO;

  // $usuarioVO = new usuarioVO();
  $usuarioDAO = new usuarioDAO();
  $con = conecta_db();
  $usuario = $usuarioDAO->getLikeUsuario($con,$_SESSION['UsuarioID']);
  $base_facebook = "https://facebook.com/profile.php?id=";
  $img_perfil = 'admin-dev/img/'.$_SESSION['ImgPerfil'].'.jpg';
  $img_capa = 'admin-dev/img/'.$_SESSION['ImgCapa'].'.jpg';

  $upd_pass = Tools::getValue("update_pass");
  if($upd_pass == 1){
    $smarty->assign("upd_pass", 1);
    $senha_form = Tools::getValue("atual_pass");
    $senha_banco = $usuario[0]->senha;
    if(sha1($senha_form) === $senha_banco){
      $new_pass = Tools::getValue("new_pass");
      if($usuarioDAO->updatePass($id_user,sha1($new_pass),$con)){
        $smarty->assign("upd_ok", 1);
      }else{
        $smarty->assign("upd_ok", 2);
      }
    }
  }

  $sql_pt = "SELECT distinct sum(p.`pontos`) as total
                FROM pontuacao p
                WHERE p.`id_usuario` = ".$usuario_id."
                group by p.`pontos`";
  $resultado_pt = mysqli_query($con,$sql_pt) or die(mysqli_error($con));
if($resultado_pt->num_rows > 0){
  while ( $rs = mysqli_fetch_array( $resultado_pt ) ) {
    $aqui = $rs[0];
  }
  if($aqui < 5){
    $level = 1;
  }elseif($aqui >=5 && $aqui < 15){
    $level = 2;
  }elseif($aqui >=15 && $aqui < 20){
    $level = 3;
  }elseif($level >= 20){
    $level = ">3, criar foreach!";
  }
}


  $smarty->assign(array(
      'usuario' => $usuario,
      'base_facebook' => $base_facebook,
      'img_perfil' => $img_perfil,
      'img_capa' => $img_capa,
      'pt_user' => $level
  ));

  $smarty->display('profile.tpl');

}else{
  header("Location: index.php?pag=login");

}
