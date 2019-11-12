<?php
if($_SESSION){
$smarty = new Smarty;
$smarty->template_dir = 'theme/default/paginas/';
$smarty->config_dir = 'theme/default/';
$smarty->error_reporting = E_ALL & ~E_NOTICE;
$smarty->assign("upd_pass", 0);
$con = conecta_db();
$smarty->assign("id_user", $_SESSION['UsuarioID']);
// select avatar
$sql_avatar = "SELECT a.*
FROM avatar a
WHERE a.`usuario` = ".$_SESSION['UsuarioID'];

$avatar_salvo = mysqli_query($con,$sql_avatar) or die(mysqli_error($con));

if($avatar_salvo->num_rows > 0){
while ( $rs = mysqli_fetch_array( $avatar_salvo ) ) {
  $avatar_usuario = $rs;
}
$smarty->assign("avatar_usuario", $avatar_usuario);
}


$upd_avatar = Tools::getValue("update_avatar");

if($upd_avatar == 1){
  $usuario_id = $_SESSION['UsuarioID'];

  $base_id = Tools::getValue("base_radio");
  $pele_id = Tools::getValue("pele_radio");
  $cabelo_id = Tools::getValue("cabelo_radio");
  $olho_id = Tools::getValue("olho_radio");
  $boca_id = Tools::getValue("boca_radio");
  $roupa_id = Tools::getValue("roupa_radio");

  if($base_id){
    if($avatar_usuario){
      $base_sql= sprintf('update avatar set base="%s" where usuario = "%s" ', $base_id, $_SESSION['UsuarioID']);
    }else{
      $base_sql= sprintf('insert into avatar (base,usuario) VALUES("%s","%s") ', $base_id, $_SESSION['UsuarioID']);
    }
    try {
      if(!mysqli_query($con, $base_sql)){
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

  if($pele_id){
    if($avatar_usuario){
      $pele_sql= sprintf('update avatar set pele="%s" where usuario = "%s" ', $pele_id, $_SESSION['UsuarioID']);
    }else{
      $pele_sql= sprintf('insert into avatar (pele,usuario) VALUES("%s","%s" ', $pele_id, $_SESSION['UsuarioID']);
    }
    try {
      if(!mysqli_query($con, $pele_sql)){
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

  if($cabelo_id){
    if($avatar_usuario){
      $cabelo_sql= sprintf('update avatar set cabelo="%s" where usuario = "%s" ', $cabelo_id, $_SESSION['UsuarioID']);
    }else{
      $cabelo_sql= sprintf('insert into avatar (cabelo,usuario) VALUES("%s","%s" ', $cabelo_id, $_SESSION['UsuarioID']);
    }
    try {
      if(!mysqli_query($con, $cabelo_sql)){
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

  if($olho_id){
    if($avatar_usuario){
      $olho_sql= sprintf('update avatar set olho="%s" where usuario = "%s" ', $olho_id, $_SESSION['UsuarioID']);
    }else{
      $olho_sql= sprintf('insert into avatar (olho,usuario) VALUES("%s","%s"', $olho_id, $_SESSION['UsuarioID']);
    }
    try {
      if(!mysqli_query($con, $olho_sql)){
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

  if($boca_id){
    if($avatar_usuario){
      $boca_sql= sprintf('update avatar set boca="%s" where usuario = "%s" ', $boca_id, $_SESSION['UsuarioID']);
    }else{
      $boca_sql= sprintf('insert into avatar (boca,usuario) VALUES("%s","%s"', $boca_id, $_SESSION['UsuarioID']);
    }
    try {
      if(!mysqli_query($con, $boca_sql)){
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

  if($roupa_id){
    if($avatar_usuario){
      $roupa_sql= sprintf('update avatar set roupa="%s" where usuario = "%s" ', $roupa_id, $_SESSION['UsuarioID']);
    }else{
      $roupa_sql= sprintf('insert into avatar (roupa,usuario VALUES("%s","%s") VALUES("%s","%s"', $roupa_id, $_SESSION['UsuarioID']);
    }
    try {
      if(!mysqli_query($con, $roupa_sql)){
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
  ?>
  <script language="JavaScript">
  window.location="index.php?pag=profile";
  </script>
  <?php
}

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

$sql_turmas2 = "SELECT distinct t.`NOME` as turma
FROM turma t,turma_aluno ta
WHERE ta.`ID_USUARIO` = ".$usuario_id."
AND ta.`ID_TURMA` = t.`ID_TURMA`";

$turma_res2 = mysqli_query($con,$sql_turmas2) or die(mysqli_error($con));

if($turma_res2->num_rows > 0){
while ( $rs = mysqli_fetch_array( $turma_res2 ) ) {
  $turmas2[] = $rs;
}
$smarty->assign("turmas2", $turmas2);
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
