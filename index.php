<?php
require 'vendor/autoload.php';
// include_once 'includes.php';
$theme = Configuration::get('theme');
// var_dump($theme);

?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
  <title>TPhE</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap Core CSS -->
    <link href="theme/<?php echo $theme ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="theme/<?php echo $theme ?>/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <!-- cruzxadas -->
    <link href="theme/<?php echo $theme ?>/paginas/css/main.css" rel="stylesheet">
    <!-- Theme CSS -->
    <link href="theme/<?php echo $theme ?>/css/agency.css" rel="stylesheet">

    <link href="theme/<?php echo $theme ?>/css/menu.css" rel="stylesheet">

</head>
<body id="page-top" class="index">

  <?php
  include 'menu.php';

  if (Tools::getValue('pag')){
    $tpl = Tools::getValue('pag');
    if($tpl=='loggout'){
      $loggout = destroiCessao();
    }
    if(Tools::getValue('pag') == 'jogos'){
      if (Tools::getValue('jogo')){
        $jogo = Tools::getValue('jogo');
        require "theme/".$theme."/".$jogo.".php";
      }else{
      require "theme/".$theme."/home_jogos.php";
      }
    }else{
      require "theme/".$theme."/".$tpl.".php"; // onde 'pagina' é a variavel passada pela URL (GET)
    }
  }else{
    require 'theme/'.$theme.'/home.php'; //primeiro acesso, padrao 'home.php'
  }
  ?>

  <footer>
      <div class="container col-md-12">
          <div class="row">
              <div class="col-md-4">
                  <span class="copyright">Copyright &copy; Your Website 2016</span>
              </div>
              <div class="col-md-4">
                  <ul class="list-inline social-buttons">
                      <li><a href="#"><i class="fa fa-twitter"></i></a>
                      </li>
                      <li><a href="#"><i class="fa fa-facebook"></i></a>
                      </li>
                      <li><a href="#"><i class="fa fa-linkedin"></i></a>
                      </li>
                  </ul>
              </div>
              <div class="col-md-4">
                  <ul class="list-inline quicklinks">
                      <li><a href="#">Privacy Policy</a>
                      </li>
                      <li><a href="#">Terms of Use</a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </footer>

  <!-- jQuery -->
    <script src="theme/<?php echo $theme ?>/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="theme/<?php echo $theme ?>/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script> -->

    <!-- Contact Form JavaScript -->
    <!-- <script src="theme/<?php echo $theme ?>/js/jqBootstrapValidation.js"></script> -->
    <!-- <script src="theme/<?php echo $theme ?>/js/contact_me.js"></script> -->

    <!-- Theme JavaScript -->
    <!-- <script src="theme/<?php echo $theme ?>/js/agency.min.js"></script> -->

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script> -->
    <!-- <script src="theme/<?php echo $theme ?>/paginas/js/jquery.crossword.js"></script> -->
    <!-- <script src="theme/<?php echo $theme ?>/paginas/js/script.js"></script> -->


</body>

</html>
