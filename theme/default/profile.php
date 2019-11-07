<?php
if($_SESSION){
$smarty = new Smarty;
$smarty->template_dir = 'theme/default/paginas/';
$smarty->config_dir = 'theme/default/';
$smarty->error_reporting = E_ALL & ~E_NOTICE;
$smarty->assign("upd_pass", 0);
$con = conecta_db();

$upd_cover = Tools::getValue("update_cover");
if($upd_cover == 1){

  $usuario_id = $_SESSION['UsuarioID'];

  $cover_id = Tools::getValue("cover_radio");
  $prof_id = Tools::getValue("profile_radio");

  if($cover_id){
    $cover_after = $cover_id.".2";
    $cover_sql= sprintf('update usuario set img_capa="%s" where ID_USUARIO = "%s" ', $cover_after, $_SESSION['UsuarioID']);
    // var_dump($cover_sql);
    try {
      if(!mysqli_query($con, $cover_sql)){
                 $smarty->assign("msge", "Erro ao salvar imagem!");
      }else{
        $smarty->assign("msg", "Imagem alterada com sucesso!");
      }
    } catch (Exception $ex) {
             echo $ex->getMessage();
             mysqli_rollback($con);
         }
     mysqli_commit($con);
  }

  if($prof_id){
    $prof_sql= sprintf('update usuario set img_perfil="%s" where ID_USUARIO = "%s" ', $prof_id, $_SESSION['UsuarioID']);
    // var_dump($cover_sql);
    try {
      if(!mysqli_query($con, $prof_sql)){
                 $smarty->assign("msge", "Erro ao salvar imagem!");
      }else{
        $smarty->assign("msg", "Imagem alterada com sucesso!");
      }
    } catch (Exception $ex) {
             echo $ex->getMessage();
             mysqli_rollback($con);
         }
     mysqli_commit($con);
  }
}

if(Tools::getValue("visita")==1){

  $usuario_id = Tools::getValue("id_user");
  $smarty->assign("visita", 1);

  $sql_turmas="SELECT DISTINCT t.`NOME` as turma,count(p.`pontos`) AS acertos, sum(p.`pontos`) AS pontos , q.`DESCRICAO`,q.`ID_QUIZ`
  FROM turma t, turma_aluno ta, usuario u, pontuacao p, quiz q, turma_quiz tq
  WHERE ta.`ID_USUARIO` = ".$usuario_id."
  AND ta.`ID_TURMA` = tq.`ID_TURMA`
  AND ta.`ID_TURMA` = t.`ID_TURMA`
  AND tq.`ID_TURMA` = t.`ID_TURMA`
  AND u.`ID_USUARIO` = ".$usuario_id."
  AND p.`id_usuario` = ".$usuario_id."
  AND p.`id_quiz` = tq.`ID_QUIZ`
  AND q.`ID_QUIZ` = tq.`ID_QUIZ`
  GROUP BY ta.ID_TURMA";
  // group BY u.`ID_USUARIO`"; //group BY t.`ID_TURMA`
  // var_dump($sql_turmas);
  $turma_res = mysqli_query($con,$sql_turmas) or die(mysqli_error($con));
  if($turma_res->num_rows > 0){
  while ( $rs = mysqli_fetch_array( $turma_res ) ) {
    $turmas[] = $rs;
  }
  $smarty->assign("turmas", $turmas);
  }


}else{
  $usuario_id = $_SESSION['UsuarioID'];
}

$theme = Configuration::get('theme');
if($theme == "default"){
  $color = "#fed136";
}
$smarty->assign("color", $color);


$classe_VO = include_VO('usuario');
$classe_DAO = include_DAO('usuario');

require $classe_VO;
require $classe_DAO;
  // $usuarioVO = new usuarioVO();
  $usuarioDAO = new usuarioDAO();
  $con = conecta_db();
  $usuario = $usuarioDAO->getLikeUsuario($con,$usuario_id);
  $base_facebook = "https://facebook.com/profile.php?id=";
  $img_perfil = 'admin-dev/img/'.$usuario[0]->img_perfil.'.jpg';
  $img_capa = 'admin-dev/img/'.$usuario[0]->img_capa.'.jpg';
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


$level_aluno = getLevel($usuario_id, $con);
$smarty->assign("pt_user", $level_aluno);

$conquistas = getConquista($usuario_id,$con);
$smarty->assign("conquistas", $conquistas);


  $smarty->assign(array(
      'usuario' => $usuario,
      'base_facebook' => $base_facebook,
      'img_perfil' => $img_perfil,
      'img_capa' => $img_capa,
  ));

  $smarty->display('profile.tpl');

}else{
  header("Location: index.php?pag=login");

}
