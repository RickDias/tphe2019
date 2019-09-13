<?php

$smarty = new Smarty;
$smarty->template_dir = 'themes/default/template/';
$smarty->config_dir = 'theme/default/';
$smarty->cache_dir = 'cache';

// Tenta se conectar ao servidor MySQL
$con = conecta_db();
//criando a query de consulta à tabela
$query = "SELECT * FROM `quiz` WHERE `ID_USUARIO` = ".$_SESSION['UsuarioID']." ORDER BY `DESCRICAO`";
$sql = mysqli_query($con, $query) or die(mysqli_error($con)); //caso haja um erro na consulta

while($aux = mysqli_fetch_assoc($sql)) {
  $quizes[] = $aux;
}
$smarty->assign(array(
  'quizes' => $quizes,
));

$turmaqr = "SELECT `ID_TURMA`, `ANO`, `SEMESTRE`, `NOME`, `SIGLA`, `ID_USUARIO`, `ID_DISCIPLINA`  FROM `turma` WHERE `ID_USUARIO` = ".$_SESSION['UsuarioID']." ORDER BY `NOME`";
$sql = mysqli_query($con, $turmaqr) or die(mysqli_error($con)); //caso haja um erro na consulta
				while($auxturma = mysqli_fetch_assoc($sql)) {
          $turmas[] = $auxturma;
        }
        $smarty->assign(array(
          'turmas' => $turmas,
        ));

        $categoriaqr = "SELECT `ID_CATEGORIA`, `DESCRICAO`, `MENU_PAI` FROM `categoria` ORDER BY 3,2 ";
        $sql = mysqli_query($con, $categoriaqr) or die(mysqli_error($con)); //caso haja um erro na consulta

        while($auxcategoria = mysqli_fetch_assoc($sql)) {
          $categorias[] = $auxcategoria;
        }
        $smarty->assign(array(
          'categorias' => $categorias,
        ));

$smarty->display('gerar_perguntas.tpl');
