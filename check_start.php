<?php
require 'vendor/autoload.php';

$con = conecta_db();
if(Tools::getValue("confere_tempo")==1){
  $id_quiz = Tools::getValue('id_quiz');
  $id_turma = Tools::getValue('id_turma');
  $query = "SELECT tq.`ESGOTADO`
  FROM `turma_quiz` tq
  WHERE tq.`ID_TURMA` = ".$id_turma."
  AND tq.`ID_QUIZ` = ".$id_quiz;

  $sql = mysqli_query($con, $query);
  if($sql->num_rows > 0){
    while($result = mysqli_fetch_assoc($sql)) {
      $esgotado = $result;
    }
    echo json_encode($esgotado);
  }
}

if(Tools::getValue("ver_rodada")==1){
  $id_quiz = Tools::getValue('id_quiz');
  $id_turma = Tools::getValue('id_turma');
  $query = "SELECT tq.`RODADA`
  FROM `turma_quiz` tq
  WHERE tq.`ID_TURMA` = ".$id_turma."
  AND tq.`ID_QUIZ` = ".$id_quiz;

  $sql = mysqli_query($con, $query);
  if($sql->num_rows > 0){
    while($result = mysqli_fetch_assoc($sql)) {
      $iniciado = $result;
    }
    echo json_encode($iniciado);
  }
}

if(Tools::getValue("ver_esgotado")==1){
  $id_quiz = Tools::getValue('id_quiz');
  $id_turma = Tools::getValue('id_turma');

  $query2 = "SELECT tq.`ESGOTADO`
  FROM `turma_quiz` tq
  WHERE tq.`ID_TURMA` = ".$id_turma."
  AND tq.`ID_QUIZ` = ".$id_quiz;

  $sql2 = mysqli_query($con, $query2);
  if($sql2->num_rows > 0){
    while($result = mysqli_fetch_assoc($sql2)) {
      echo json_encode($result);
    }
  }
}

if(Tools::getValue("update_pontos")==1){
  $id_quiz = Tools::getValue('id_quiz');
  $id_usuario = Tools::getValue('usuario');
  $pontos = Tools::getValue('pontuacao');
  $resposta = Tools::getValue('resposta');
  $insert = true;

  // $resp_bd = 0;

  $pontuacao = "SELECT p.`pontos`, p.`id_resposta`
  FROM `pontuacao` p,`usuario` u
  WHERE (p.`id_usuario` = u.`ID_USUARIO`)
  AND p.`id_quiz` = ".$id_quiz."
  AND u.`ID_USUARIO` = ".$id_usuario;
  $ret_pont = mysqli_query($con, $pontuacao);
  if($ret_pont->num_rows > 0){
      while($result = mysqli_fetch_assoc($ret_pont)) {
        $resp_bd = $result["id_resposta"];
        if($resp_bd == $resposta){
          $insert = false;
        }
      }
    }

  if($insert == true){
    if(Tools::getValue('teste') != 1){
    $ins_term = "insert into pontuacao (`id_usuario`,`pontos`,`id_quiz`,`id_resposta`) VALUES('".$id_usuario."','".$pontos."','".$id_quiz."','".$resposta."')";
    $ins = mysqli_query($con, $ins_term);
    mysqli_commit($con);
    echo json_encode($ins_term);
  }
}else{
  echo json_encode("Pergunta ja respondida!");
}

if(Tools::getValue("busca_aluno")==1){
  $id_quiz = Tools::getValue('id_quiz');
  $id_turma = Tools::getValue('id_turma');
  $query = "SELECT distinct u.`NOME` as nome_aluno, u.`ID_USUARIO`
                FROM `turma_aluno` ta ,`usuario` u, `sala_alunos` sa, `turma_quiz` tq
                WHERE sa.`id_aluno` = u.`ID_USUARIO`
                AND tq.`ID_TURMA` = ".$id_turma."
                AND sa.`visivel` = 'N'
                AND tq.`ID_QUIZ` = ".$id_quiz."
                AND ta.`ID_USUARIO` = u.`ID_USUARIO`" ;
  $sql = mysqli_query($con, $query);
  if($sql->num_rows > 0){
    while($result = mysqli_fetch_assoc($sql)) {
      $todos_alunos[] = $result;
    }
    $retorno = $todos_alunos;
  echo json_encode($retorno);
}

}
}
