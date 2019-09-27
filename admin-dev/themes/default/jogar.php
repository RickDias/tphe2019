<?php
$smarty = new Smarty;
$smarty->template_dir = 'themes/default/template/';
$smarty->config_dir = 'theme/default/';
$smarty->error_reporting = E_ALL & ~E_NOTICE;

$id_turma = Tools::getValue("id-turma");
$id_quiz = Tools::getValue("id-quiz");
$smarty->assign("id_quiz", $id_quiz);
$smarty->assign("id_turma", $id_turma);

$con = conecta_db();

$perguntas = "SELECT pq.`ID_PERGUNTA`
        FROM `pergunta_quiz` pq
        WHERE pq.`ID_QUIZ` = ".$id_quiz." limit 10";
        $id_perguntas = mysqli_query($con, $perguntas) or die(mysqli_error($con));
        if($id_perguntas->num_rows > 0){
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
        }
        $turma_sql = "SELECT `nome` FROM turma WHERE `ID_TURMA` = ".$id_turma." ";
        $arr_turma = mysqli_query($con, $turma_sql) or die(mysqli_error($con));
        while($aux3 = mysqli_fetch_assoc($arr_turma)) {
          $turma = $aux3;
        }
        $quiz_sql = "SELECT * FROM `quiz` WHERE `ID_QUIZ` = ".$id_quiz;
        $quiz = mysqli_query($con, $quiz_sql) or die(mysqli_error($con));

        $smarty->assign(array(
          'quiz_arr' => $quiz,
          'turma_arr' => $turma,

        ));

  $smarty->display('jogar.tpl');
