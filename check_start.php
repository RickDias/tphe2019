<?php
require 'vendor/autoload.php';

$con = conecta_db();
$id_quiz = Tools::getValue('id_quiz');
$id_turma = Tools::getValue('id_turma');
$query = "SELECT q.`INICIADO`
              FROM `quiz` q
              WHERE q.`ID_QUIZ` = ".$id_turma;

$sql = mysqli_query($con, $query);
if($sql->num_rows > 0){
  while($result = mysqli_fetch_assoc($sql)) {
    $iniciado = $result;
  }
echo json_encode($iniciado);
}
