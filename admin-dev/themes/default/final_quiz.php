<?php

$smarty = new Smarty;
$smarty->template_dir = 'themes/default/template/';
$smarty->config_dir = 'theme/default/';
$smarty->caching = false;
$smarty->error_reporting = E_ALL & ~E_NOTICE;

$con = conecta_db();

$id_usuario = $_SESSION["UsuarioID"];
$id_quiz= Tools::getValue("id_quiz");
$id_turma= Tools::getValue("id_turma");
$smarty->assign("id_turma", $id_turma);

if(Tools::getValue("terminar")==1){
  // echo("PARABENS");exit;
  $sala_aluno_VO = include_VO2('sala_aluno');
  $sala_aluno_DAO = include_DAO2('sala_aluno');
  require_once $sala_aluno_VO;
  require_once $sala_aluno_DAO;
  $sala_alunoVO = new sala_alunoVO();
  $sala_alunoDAO = new sala_alunoDAO();

  $sql = sprintf("select sum(p.`pontos`) as pontos_geral, p.`id_usuario`, p.`id_quiz`, u.`NOME`
  from pontuacao p, usuario u
  where (p.`id_usuario` = u.`ID_USUARIO`)
  AND p.`id_quiz` = '".$id_quiz."'
  GROUP BY p.id_usuario order by pontos_geral DESC
  ");
  $resultado = mysqli_query($con,$sql) or die(mysqli_error($con));
  // update RODADA
  $up_rod = sprintf("update turma_quiz set rodada=0,iniciado=0,ativo='0'
  where ID_QUIZ = '".$id_quiz."' AND ID_TURMA='".$id_turma."'
  ");
  $res_rod = mysqli_query($con,$up_rod) or die(mysqli_error($con));

  if($resultado->num_rows > 0){
    while($aux = mysqli_fetch_assoc($resultado)) {
      $aluno[]=$aux;
      // var_dump($aux);
      $smarty->assign("result", $aluno);
      $pontos_t = $aux["pontos_geral"];
      $sql2 = sprintf('update sala_alunos set pontos_geral="%s"
      where id_aluno = "%s" ', $aux["pontos_geral"] , $aux["id_usuario"]);
      try {
        if(!mysqli_query($con, $sql2)){
          throw new Exception ("Erro ao alterar quiz!");
        }
      } catch (Exception $ex) {
        echo $ex->getMessage();
        mysqli_rollback($con);
      }
      mysqli_commit($con);
    }
  }else{
    echo("Erro ao gerar lista, entre em contato com o Desenvolvedor!");
  }

  // $status_aluno = $sala_alunoDAO->updateStatus($id_usuario,"N",$con);
  // header("Location: index.php?pag=login");
}

$smarty->display('final_quiz.tpl');
