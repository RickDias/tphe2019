<?php

class quizDAO {
    
    public function insert(quizVO $objVO, $link) {
        $query = sprintf('INSERT INTO quiz ( DESCRICAO, DT_INICIO, DT_FIM, PUBLICACAO, ID_USUARIO)'.'VALUES ("%s", "%s","%s","%s","%s")', 
                 $objVO->getDescricao(),$objVO->getDt_inicio(), $objVO->getDt_fim(), $objVO->getPublicacao(), $objVO->getIdUsuario());
        try {
            if (mysqli_query($link, $query)) {
                mysqli_commit($link);
                $objVO->setId_quiz(mysqli_insert_id($link));
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
        $objVO = new quizVO();
        $return = array();
        $query = 'SELECT * FROM `quiz` ORDER BY `ID_QUIZ`';
        $resultado = mysqli_query($link, $query);
        while ($rs = mysqli_fetch_array($resultado)) {
            $objVO->setId_quiz(stripslashes($rs['ID_QUIZ']));
            $objVO->setDescricao(stripslashes($rs['DESCRICAO']));
            $objVO->setDt_inicio(stripslashes($rs['DT_INICIO']));
            $objVO->setDt_fim(stripslashes($rs['DT_FIM']));
            $objVO->setPublicacao(stripslashes($rs['PUBLICACAO']));
            $objVO->setIdUsuario(stripslashes($rs['ID_USUARIO']));           
            $return [] = clone $objVO;
        }
        return $return;
    }   
    
    public function delete(quizVO $objVO, $link) {
         if ($objVO->getId_quiz() == NULL){
             throw new Exception ("Erro ao tentar excluir a quiz, verifique a chave primária.");
         }
         $query = sprintf('DELETE FROM quiz WHERE id_quiz = "%s"', $objVO->getId_quiz());
         try {
             if(!mysqli_query($link, $query)){
                 throw new Exception ("Erro ao excluir quiz!");
             }
         } catch (Exception $ex) {
             echo $ex->getMessage();
             mysqli_rollback($link);
         }
         mysqli_commit($link);
         return mysqli_query($link, $query);
    }
    
    public function update(quizVO $objVO, $link) {
		if ( !$objVO->getId_quiz( ) ) {
			throw new Exception( 'Valor da chave primária inválido' );
		}
		//$sql = sprintf('update quiz set DESCRICAO="%s" , DT_INICIO="%s", DT_FIM="%s", PUBLICACAO="%s"
		$sql = sprintf('update quiz set DESCRICAO="%s" , PUBLICACAO="%s"
						where ID_QUIZ = "%s" ', $objVO->getDescricao() , $objVO->getPublicacao(), $objVO->getId_quiz()  );                            
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
