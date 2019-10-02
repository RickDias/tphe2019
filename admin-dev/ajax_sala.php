  <?php
  require '../vendor/autoload.php';

  $con = conecta_db();
  $id_quiz = Tools::getValue('id_quiz');
  $id_turma = Tools::getValue('id_turma');
  $query = "SELECT distinct ta.`ID_TURMA`, ta.`ID_USUARIO`, t.`codigo_turma`,t.`SIGLA`,t.`NOME` as nome_turma,t.`SEMESTRE`,t.`ANO`,u.`NOME` as nome_aluno, u.`ID_USUARIO`
                FROM `turma_aluno` ta , `turma` t, `usuario` u, `sala_alunos` sa, `turma_quiz` tq
                WHERE t.`ID_TURMA` = ta.`ID_TURMA`
                AND tq.`ID_TURMA` = ".$id_turma."
                AND tq.`ID_TURMA` = t.`ID_TURMA`
                AND sa.`visivel` = 'S'
                AND sa.`ID_ALUNO` = u.`ID_USUARIO`
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
