<?php
/**
 * <b>CONEXÃO COM O BANCO DE DADOS</b>
 * Função responsável por realizar e retorna a conexão com o banco de dados.
 * Utiliza os parâmetros DBHOST, DBUSER, DBPASS e DBNAME do config.php.
 *
 * @return $link
 */
function conecta_db() {
    $link = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME) or die("Erro ao conectar com o banco de dados. Verifique a configuração e tente novamente.");
    mysqli_autocommit($link, FALSE);

    return $link;
}

function testalogin($email,$senha){
  if (!$email AND !$senha){
     return false;
   }else{
     $conn = conecta_db();
     $sql = "SELECT * FROM `usuario` WHERE (`EMAIL` = '". $email ."') AND (`senha` = '". sha1($senha) ."') LIMIT 1";
     $query = mysqli_query($conn, $sql) or die(mysqli_error($cx)); //caso haja um erro na consulta

     if (mysqli_num_rows($query) == 0) {
       return false;
     } else {
       $resultado = mysqli_fetch_assoc($query);
     }
     $fecha_conn = desconecta_db($conn);
     return $resultado;
   }
   }

function desconecta_db($link) {
    mysqli_close($link);
}

function include_DAO($DAO){
  $string_DAO = 'classes/'.$DAO.'/'.$DAO.'DAO.php';
  return $string_DAO;
}

function include_VO($VO){
  $string_VO = 'classes/'.$VO.'/'.$VO.'VO.php';
  return $string_VO;
}

function include_DAO2($DAO){
  $string_DAO = '../classes/'.$DAO.'/'.$DAO.'DAO.php';
  return $string_DAO;
}

function include_VO2($VO){
  $string_VO = '../classes/'.$VO.'/'.$VO.'VO.php';
  return $string_VO;
}

function destroiCessao(){
  // session_start();
  unset($_SESSION);
  session_destroy();
  ?>

  <script language="JavaScript">
  window.location="index.php";
  </script>
  <?php
  exit;
}
