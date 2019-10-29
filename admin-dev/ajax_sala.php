  <?php
 require '../vendor/autoload.php';
 $con = conecta_db();
 $id_quiz = Tools::getValue('id_quiz');
 $id_turma = Tools::getValue('id_turma');
 $query = "SELECT distinct u.`NOME` as nome_aluno, u.`ID_USUARIO`
               FROM `turma_aluno` ta ,`usuario` u, `sala_alunos` sa, `turma_quiz` tq
               WHERE sa.`id_aluno` = u.`ID_USUARIO`
               AND tq.`ID_TURMA` = ".$id_turma."
               AND sa.`visivel` = 'S'
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
