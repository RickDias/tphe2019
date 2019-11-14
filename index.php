<?php
require 'vendor/autoload.php';
$theme = Configuration::get('theme');
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
    <link href="theme/default/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="theme/default/vendor/bootstrap/css/bootstrap-grid.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="theme/default/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="theme/default/vendor/dist/loading-bar.css" rel="stylesheet" type="text/css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css"> -->
    <!-- <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'> -->
    <!-- <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'> -->
    <!-- <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'> -->
    <!-- cruzxadas -->
    <link href="theme/default/paginas/css/main-<?php echo $theme ?>.css" rel="stylesheet">
    <!-- Theme CSS -->
    <link href="theme/default/css/agency.css" rel="stylesheet">

    <link href="theme/default/css/menu.css" rel="stylesheet">

</head>
<body id="page-top" class="index">
  <div class="">
    <?php
    include 'menu_jogador.php';

      include 'menu.php';

    if (Tools::getValue('pag')){
      if($_SESSION){
        $_SESSION['last_activity'] = time();
      }

      $tpl = Tools::getValue('pag');
      if($tpl=='loggout'){
        $loggout = destroiCessao();
      }
      if(Tools::getValue('pag') == 'jogos'){
        if (Tools::getValue('jogo')){
          $jogo = Tools::getValue('jogo');
          require "theme/default/".$jogo.".php";
        }else{
        require "theme/default/home_jogos.php";
        }
      }else{
        require "theme/default/".$tpl.".php"; // onde 'pagina' é a variavel passada pela URL (GET)
      }
    }else{
      require 'theme/default/home.php'; //primeiro acesso, padrao 'home.php'
    }
    ?>
  </div>

  <footer style="margin-top:50px">
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
    <script src="theme/default/vendor/jquery/jquery.min.js"></script>
    <script src="theme/default/vendor/dist/loading-bar.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="theme/default/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function(){
      $(document).bind("contextmenu",function(e) {
     e.preventDefault();
    });
    $(document).keydown(function(e){
        if(e.which === 123){
           return false;
        }
    });
      });
    </script>
    <!-- <script>
    function loadSessionAjax(){
        $.ajax({
                   type:"POST",
                   url: "check_start.php",
                   async:true,
                   dataType : "json",
                   data: {
                     update_atividade:1
                   },
                   success: function( data ) {
                    console.log(data);
                    if(data == "false"){
                      window.location="index.php?pag=loggout";
                    }
                   },
                   error: function( xhr, status) {
                   console.log(xhr);
                   console.log(status);
                   }
                   });
    }

    setInterval(function(){
        loadSessionAjax() // this will run after every 5 seconds
    }, 2000);
    </script> -->
</body>

</html>
