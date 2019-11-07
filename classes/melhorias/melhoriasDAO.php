<?php

class melhoriasDAO {
    
    public function insert(melhoriasVO $objVO, $link) {
        $query = sprintf('INSERT INTO `melhorias`(`DESCRICAO`, `EMAIL`, `DT_SOLICITACAO`, `DT_ATUALIZACAO`, `SITUACAO`, `ID_USUARIO`) 
							VALUES ("%s", "%s",now(),null,"S","%s")', 
                 $objVO->getDescricao(),$objVO->getEmail(), $objVO->getIdUsuario());
        try {
            if (mysqli_query($link, $query)) {
                mysqli_commit($link);
                $objVO->setId_melhoria(mysqli_insert_id($link));
                return $objVO;
            } else {
                throw new Exception('Erro ao cadastrar!');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            mysqli_rollback($link);
        }
    }
    
}
