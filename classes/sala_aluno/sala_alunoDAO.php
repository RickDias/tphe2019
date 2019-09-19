<?php

class sala_alunoDAO {

    public function insert(sala_alunoVO $objVO, $link) {
        $query = sprintf("INSERT INTO sala_alunos (id, id_aluno, visivel, id_pontuacao) VALUES ('".$objVO->getId()."', '".$objVO->getId_aluno()."', '".$objVO->getVisivel()."', ".$objVO->getId_pontuacao().")");

		try {
            if (mysqli_query($link, $query)) {
                mysqli_commit($link);
                $objVO->setId(mysqli_insert_id($link));
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
        $objVO = new sala_alunoVO();
        $return = array();
        $query = 'SELECT * FROM `sala_alunos` ORDER BY `id`';
        $resultado = mysqli_query($link, $query);
        while ($rs = mysqli_fetch_array($resultado)) {
            $objVO->setId(stripslashes($rs['id']));
            $objVO->setId_aluno(stripslashes($rs['id_aluno']));
            $objVO->setVisivel(stripslashes($rs['visivel']));
            $objVO->setId_pontuacao(stripslashes($rs['id_pontuacao']));

            $return [] = clone $objVO;
        }
        return $return;
    }

    public function getLikeStatus($link,$status)
        {
            mysqli_query($link,"SET NAMES 'utf8'");
            $objVO = new sala_alunoVO();
            $return = array();
            $sql = sprintf("select * from sala_alunos where `visivel` = '$status' ");
            $resultado = mysqli_query($link,$sql);
            if($resultado){
            while ( $rs = mysqli_fetch_array( $resultado ) ) {
              $objVO->setId(stripslashes($rs['id']));
              $objVO->setId_aluno(stripslashes($rs['id_aluno']));
              $objVO->setVisivel(stripslashes($rs['visivel']));
              $objVO->setId_pontuacao(stripslashes($rs['pontos_geral']));

            $return[] = clone $objVO;
          }}
           return $return;
        }

        public function getById($link,$id)
            {
                mysqli_query($link,"SET NAMES 'utf8'");
                $objVO = new sala_alunoVO();
                $return = array();
                $sql = sprintf("select * from sala_alunos where `id_aluno` = '$id' ");
                $resultado = mysqli_query($link,$sql);
                if($resultado){
                while ( $rs = mysqli_fetch_array( $resultado ) ) {
                  $objVO->setId(stripslashes($rs['id']));
                  $objVO->setId_aluno(stripslashes($rs['id_aluno']));
                  $objVO->setVisivel(stripslashes($rs['visivel']));
                  $objVO->setId_pontuacao(stripslashes($rs['id_pontuacao']));

                $return[] = clone $objVO;
              }}
               return $return;
            }

            public function updateStatus($id_usuario,$status,$link) {
              $query = sprintf('UPDATE sala_alunos
                SET `visivel` =  "%s"
                WHERE `id_aluno` = "%s" ', $status, $id_usuario);
                try {
                    if(!mysqli_query($link, $query)){
                        throw new Exception ("Erro ao excluir usuario!");
                    }
                } catch (Exception $ex) {
                    echo $ex->getMessage();
                    mysqli_rollback($link);
                }
                mysqli_commit($link);
                return mysqli_query($link, $query);
              // return "ok";
            }


    public function delete(sala_alunoVO $objVO, $link) {
         if ($objVO->getId() == NULL){
             throw new Exception ("Erro ao tentar excluir a usuario, verifique a chave primária.");
         }
         $query = sprintf('DELETE FROM sala_alunos WHERE id = "%s"', $objVO->getId());
         try {
             if(!mysqli_query($link, $query)){
                 throw new Exception ("Erro ao excluir usuario!");
             }
         } catch (Exception $ex) {
             echo $ex->getMessage();
             mysqli_rollback($link);
         }
         mysqli_commit($link);
         return mysqli_query($link, $query);
    }

    public function update(sala_alunoVO $objVO, $link) {

    }

}
