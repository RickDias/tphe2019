<?php

class turma_quizDAO {

    public function insert(turma_quizVO $objVO, $link) {
        $query = sprintf('INSERT INTO turma_quiz (ID_QUIZ, ID_TURMA)'.'VALUES ('.$objVO->getId_quiz().', '.$objVO->getId_turma().')');
        try {
            if (mysqli_query($link, $query)) {
                mysqli_commit($link);
                $objVO->setId_turma_quiz(mysqli_insert_id($link));
                printf('Registro inserido com sucesso.');
                return $objVO;
            } else {
                throw new Exception('Erro ao cadastrar!');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            mysqli_rollback($link);
        }
    }

    public function getAll($link) {
        mysqli_query($link, "SET NAMES 'UTF8'");
        $objVO = new turma_quizVO();
        $return = array();
        $query = 'SELECT * FROM `turma_quiz` ORDER BY `ID_TURMA`';
        $resultado = mysqli_query($link, $query);
        while ($rs = mysqli_fetch_array($resultado)) {
            $objVO->setId_turma_quiz(stripslashes($rs['ID_TURMA_QUIZ']));
            $objVO->setId_turma(stripslashes($rs['ID_TURMA']));
            $objVO->setId_quiz(stripslashes($rs['ID_QUIZ']));


            $return [] = clone $objVO;
        }
        return $return;
    }


    public function delete(turma_quizVO $objVO, $link) {
         if ($objVO->getId_turma() == NULL){
             throw new Exception ("Erro ao tentar excluir a turma, verifique a chave primária.");
         }
         $query = sprintf('DELETE FROM turma_quiz WHERE id_turma = "%s"', $objVO->getId_turma_quiz());
         try {
             if(!mysqli_query($link, $query)){
                 throw new Exception ("Erro ao excluir turma!");
             }
         } catch (Exception $ex) {
             echo $ex->getMessage();
             mysqli_rollback($link);
         }
         mysqli_commit($link);
         return mysqli_query($link, $query);
    }

    public function update(turma_quizVO $objVO, $link) {

    }

    public function updateRodada( $id_quiz,$id_turma, $rodada, $link) {
    if ( !$id_quiz ) {
      throw new Exception( 'Valor da chave primária inválido' );
    }
    $sql = sprintf('update turma_quiz set RODADA="%s"
            where ID_QUIZ = "%s" AND ID_TURMA = "%s"', $rodada, $id_quiz,$id_turma );
            //where ID_QUIZ = "%s" ', $objVO->getDescricao() , $objVO->getDt_inicio(), $objVO->getDt_fim(), $objVO->getPublicacao(), $objVO->getId_quiz()  );
    try {
      if(!mysqli_query($link, $sql)){
                 throw new Exception ("Erro ao alterar quiz!");
      }
    } catch (Exception $ex) {
             echo $ex->getMessage();
             mysqli_rollback($link);
         }
     mysqli_commit($link);

    }

    public function updateEsgotado( $id_quiz,$id_turma, $status, $link) {
    if ( !$id_quiz ) {
      throw new Exception( 'Valor da chave primária inválido' );
    }
    $sql = sprintf('update turma_quiz set ESGOTADO="%s"
            where ID_QUIZ = "%s" AND ID_TURMA = "%s"', $status, $id_quiz,$id_turma );
            //where ID_QUIZ = "%s" ', $objVO->getDescricao() , $objVO->getDt_inicio(), $objVO->getDt_fim(), $objVO->getPublicacao(), $objVO->getId_quiz()  );
    try {
      if(!mysqli_query($link, $sql)){
                 throw new Exception ("Erro ao alterar quiz!");
      }
    } catch (Exception $ex) {
             echo $ex->getMessage();
             mysqli_rollback($link);
         }
     mysqli_commit($link);

    }

    public function updateStatus( $id_quiz,$id_turma, $status, $link) {
		if ( !$id_quiz ) {
			throw new Exception( 'Valor da chave primária inválido' );
		}
		$sql = sprintf('update turma_quiz set ATIVO="%s"
						where ID_QUIZ = "%s" AND ID_TURMA = "%s"', $status, $id_quiz,$id_turma );
						//where ID_QUIZ = "%s" ', $objVO->getDescricao() , $objVO->getDt_inicio(), $objVO->getDt_fim(), $objVO->getPublicacao(), $objVO->getId_quiz()  );
		try {
			if(!mysqli_query($link, $sql)){
                 throw new Exception ("Erro ao alterar quiz!");
			}
		} catch (Exception $ex) {
             echo $ex->getMessage();
             mysqli_rollback($link);
         }
		 mysqli_commit($link);

    }


}
