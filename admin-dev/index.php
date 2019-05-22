<?php
require '../vendor/autoload.php';
$theme = Configuration::get('theme');
?>

<?php
require ('themes/default/template/login.tpl');
  if (Tools::getValue('form_login')==1 && Tools::getValue('email') && Tools::getValue('senha')){

     $email = Tools::getValue('email');
     $senha = Tools::getValue('senha');

     $login = testalogin($email,$senha);

     if($login == true){
       // var_dump($_SESSION["UsuarioID"]);
       header("Location: index_base.php");// exit;
     }else{
       echo 'login incorreto';
     }
     // var_dump($login);
     // require ('index_base.tpl');

   }

   ?>

   <!-- jQuery -->
     <script src="vendor/jquery/jquery.min.js"></script>
     <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
