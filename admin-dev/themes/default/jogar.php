<?php

$smarty = new Smarty;
$smarty->template_dir = 'themes/default/template/';
$smarty->config_dir = 'theme/default/';

$turma = $_POST['id-turma'];
$quiz = $_POST['id-quiz'];

// QRcode::png($turma.";".$quiz, "QR_code.png");

$con = conecta_db();
//SQL que consulta as perguntas geradas para um quiz
//Considerando o ID_QUIZ, e ID_TURMA

//criando a query de consulta à tabela
// $query  = "SELECT distinct(`pergunta`.`ID_PERGUNTA`), `pergunta`.`DESCRICAO` as 'TEXTO', `categoria`.`DESCRICAO` ";
// $query .= " FROM `pergunta`, `pergunta_quiz`,`categoria` ";
// $query .= " WHERE `pergunta`.`ID_PERGUNTA` = `pergunta_quiz`.`ID_PERGUNTA` ";
// $query .= " AND `pergunta`.`ID_CATEGORIA` = `categoria`.`ID_CATEGORIA`";
// $query .= " AND `pergunta_quiz`.`ID_PERGUNTA` in (SELECT `ID_PERGUNTA` FROM `pergunta_quiz` where `ID_QUIZ`=".$_POST['id-quiz'];
// $query .= " and `ID_TURMA`=".$_POST['id-turma'].")";
$perguntas = "SELECT pq.`ID_PERGUNTA`
        FROM `pergunta_quiz` pq
        WHERE pq.`ID_QUIZ` = ".$quiz." limit 10";
        if($perguntas){
          $id_perguntas = mysqli_query($con, $perguntas) or die(mysqli_error($con));
          while($aux = mysqli_fetch_assoc($id_perguntas)) {
            $txt_pergunta = "SELECT p.`ID_PERGUNTA`, p.`DESCRICAO`, p.`PONTUACAO`
                    FROM `pergunta` p
                    WHERE p.`ID_PERGUNTA` = ".$aux["ID_PERGUNTA"];
            $dados_perguntas = mysqli_query($con, $txt_pergunta) or die(mysqli_error($con));

            while($aux2 = mysqli_fetch_assoc($dados_perguntas)) {
              $array_perguntas[]=$aux2;
              $smarty->assign("perguntas", $array_perguntas);
              $respostas = "SELECT r.`ID_RESPOSTA`, r.`RESPOSTA`, r.`TIPO`, r.`ID_PERGUNTA`
              FROM `resposta` r
              WHERE r.`ID_PERGUNTA` = ".$aux2["ID_PERGUNTA"];
              $dados_respostas = mysqli_query($con, $respostas) or die(mysqli_error($con));

            }
            while($aux3 = mysqli_fetch_assoc($dados_respostas)) {
              $array_respostas[]=$aux3;
              $smarty->assign("respostas", $array_respostas);
            }
                  }
          $quiz_sql = "SELECT *
                  FROM `quiz`
                  WHERE `ID_QUIZ` = ".$quiz;
          $quiz = mysqli_query($con, $quiz_sql) or die(mysqli_error($con));
            $smarty->assign(array(
              'resultados' => $quiz,
            ));
        }

// echo $query;
// $retorno = mysqli_query($con, $query) or die(mysqli_error($con)); //caso haja um erro na consulta
//
// var_dump($query);
// echo "ID_QUIZ: ".$_POST['id-quiz']." - TURMA: #".$_POST['id-turma']."</br>";
//
// while($aux = mysqli_fetch_assoc($retorno)) {
//   //percorrendo os registros da consulta.
// echo ("Pergunta: ".$aux['TEXTO']);
//   //criando a query de consulta à tabela
//   $queryResp  = "SELECT `ID_RESPOSTA`, `RESPOSTA`, `TIPO`, `ID_PERGUNTA`";
//   $queryResp .= " FROM `resposta` WHERE `ID_PERGUNTA`=".$aux['ID_PERGUNTA'];
//
//   $sqlResp = mysqli_query($con, $queryResp) or die(mysqli_error($con)); //caso haja um erro na consulta
//
//
//   while($auxResp = mysqli_fetch_assoc($sqlResp)) {
//     //percorrendo os registros da consulta.
//     if ($auxResp['TIPO'] == 'F') {
//       echo "<div class='alert alert-danger'>";
//       echo "<i class='fa fa-times-circle fa-1x'></i>  ";
//     } else {
//       echo "<div class='alert alert-success'>";
//       echo "<i class='fa fa-check-circle fa-1x'></i>  ";};
//     echo $auxResp['RESPOSTA'];
//     echo "</div>";
//   }
  // var_dump($sqlResp);

// }

// $classe_VO = include_VO('usuario');
// $classe_DAO = include_DAO('usuario');

// require $classe_VO;
// require $classe_DAO;

  // $usuarioVO = new usuarioVO();
  // $usuarioDAO = new usuarioDAO();
  // $con = conecta_db();
  // $todos_usuarios = $usuarioDAO->getAll($con);


  $smarty->display('jogar.tpl');
