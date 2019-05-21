<?php
require '../vendor/autoload.php';
$theme = Configuration::get('theme');
?>
<head>
  <title>TPhE - Admin</title>
    <meta charset="utf-8">
    <!-- Bootstrap Core CSS -->
    <link href="theme/<?php echo $theme ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="theme/<?php echo $theme ?>/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <!-- Theme CSS -->
      <link href="theme/<?php echo $theme ?>/css/menu.css" rel="stylesheet">

</head>
<?php
$smarty = new Smarty;
if(!isset($_SESSION)){
  $smarty->display('themes/'.$theme.'/template/login.tpl');
}

  if (Tools::geValue('form_login')==1 && Tools::geValue('email') && Tools::geValue('senha')){
     $conn = conecta_db();
     $email = Tools::geValue('email');
     $senha = Tools::geValue('senha');

     $sql = "SELECT * FROM `usuario` WHERE (`EMAIL` = '". $email ."') AND (`senha` = '". sha1($senha) ."') LIMIT 1";
     // echo "teste: ".$sql."<br/>";

     $query = mysqli_query($conn, $sql) or die(mysqli_error($cx)); //caso haja um erro na consulta
     var_dump(mysqli_fetch_assoc($query));
     if (mysqli_num_rows($query) == 0) {
       return false;
     } else {
       $resultado = mysqli_fetch_assoc($query);
     }

     if (!isset($_SESSION)) session_start();

     $_SESSION['UsuarioID'] = $resultado['ID_USUARIO'];
     $_SESSION['UsuarioNome'] = $resultado['NOME'];
     $_SESSION['UsuarioEmail'] = $resultado['EMAIL'];
     $_SESSION['UsuarioNivel'] = $resultado['ID_TIPO_USUARIO'];
     $_SESSION['IdFacebook'] = $resultado['id_facebook'];
     $_SESSION['Theme'] = $resultado['theme'];
     $_SESSION['ImgPerfil'] = $resultado['img_perfil'];
     $_SESSION['ImgCapa'] = $resultado['img_capa'];

     // var_dump($_SESSION);
     $fecha_conn = desconecta_db($conn);

     $smarty->display('themes/'.$theme.'/index.php');
   }
   ?>

   <!-- jQuery -->
     <script src="vendor/jquery/jquery.min.js"></script>
     <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
