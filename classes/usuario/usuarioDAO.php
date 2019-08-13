<?php

class usuarioDAO {

    public function insert(usuarioVO $objVO, $link) {
        $query = sprintf("INSERT INTO usuario (NOME, EMAIL, SENHA, ID_TIPO_USUARIO) VALUES ('".$objVO->getNome()."', '".$objVO->getEmail()."', '".$objVO->getSenha()."', ".$objVO->getId_tipo_usuario().")");

		try {
            if (mysqli_query($link, $query)) {
                mysqli_commit($link);
                $objVO->setId_usuario(mysqli_insert_id($link));
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
        $objVO = new usuarioVO();
        $return = array();
        $query = 'SELECT * FROM `usuario` ORDER BY `ID_USUARIO`';
        $resultado = mysqli_query($link, $query);
        while ($rs = mysqli_fetch_array($resultado)) {
            $objVO->setId_usuario(stripslashes($rs['ID_USUARIO']));
            $objVO->setNome(stripslashes($rs['NOME']));
            $objVO->setEmail(stripslashes($rs['EMAIL']));
            $objVO->setSenha(stripslashes($rs['SENHA']));
            $objVO->setId_tipo_usuario(stripslashes($rs['ID_TIPO_USUARIO']));
            $objVO->setId_facebook(stripslashes($rs['id_facebook']));


            $return [] = clone $objVO;
        }
        return $return;
    }

    public function getLikeUsuario($link,$id)
        {
            mysqli_query($link,"SET NAMES 'utf8'");
            $objVO = new usuarioVO();
            $return = array();
            $sql = sprintf("select * from usuario where `ID_USUARIO`= ".$id);
            $resultado = mysqli_query($link,$sql);
            while ( $rs = mysqli_fetch_array( $resultado ) ) {
            $objVO->setId_usuario(stripslashes($rs['ID_USUARIO']));
            $objVO->setNome(stripslashes($rs['NOME']));
            $objVO->setEmail(stripslashes($rs['EMAIL']));
            $objVO->setSenha(stripslashes($rs['SENHA']));
            $objVO->setId_tipo_usuario(stripslashes($rs['ID_TIPO_USUARIO']));
            $objVO->setId_facebook(stripslashes($rs['id_facebook']));

            $return[] = clone $objVO;
            }
           return $return;
        }


    public function delete(usuarioVO $objVO, $link) {
         if ($objVO->getId_usuario() == NULL){
             throw new Exception ("Erro ao tentar excluir a usuario, verifique a chave primária.");
         }
         $query = sprintf('DELETE FROM usuario WHERE id_usuario = "%s"', $objVO->getId_usuario());
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

    public function update(usuarioVO $objVO, $link) {

    }

}
