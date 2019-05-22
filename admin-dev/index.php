<?php
require '../vendor/autoload.php';
$theme = Configuration::get('theme_admin');
?>

<?php
require ('themes/default/template/login.tpl');
  if (Tools::getValue('form_login')==1 && Tools::getValue('email') && Tools::getValue('senha')){

     $email = Tools::getValue('email');
     $senha = Tools::getValue('senha');

     $resultado = testalogin($email,$senha);
     // var_dump($resultado);

     if($resultado != false){
       if (!isset($_SESSION)) session_start();

       $_SESSION['UsuarioID'] = $resultado['ID_USUARIO'];
       $_SESSION['UsuarioNome'] = $resultado['NOME'];
       $_SESSION['UsuarioEmail'] = $resultado['EMAIL'];
       $_SESSION['UsuarioNivel'] = $resultado['ID_TIPO_USUARIO'];
       $_SESSION['IdFacebook'] = $resultado['id_facebook'];
       $_SESSION['Theme'] = $resultado['theme'];
       $_SESSION['ImgPerfil'] = $resultado['img_perfil'];
       $_SESSION['ImgCapa'] = $resultado['img_capa'];
       // var_dump($_SESSION["UsuarioID"]);
       header("Location: index_base.php");// exit;
     }else{
       echo 'login incorreto';
     }
     // var_dump($login);
     // require ('index_base.tpl');

   }

   ?>
