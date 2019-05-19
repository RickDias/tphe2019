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

/**
 * <b>FECHA CONEXÃO</b>
 * <br />Fecha uma conexão com o banco de dados aberta anteriormente.
 *
 */
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
