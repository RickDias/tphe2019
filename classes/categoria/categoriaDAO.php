<?php

class categoriaDAO {

    public function insert(categoriaVO $objVO, $link) {
        $query = ("INSERT INTO `categoria` (`DESCRICAO`, `MENU_PAI`) VALUES ('{$objVO->getDescricao()}', null)");
		
		try {
            if (mysqli_query($link, $query)) {
                $objVO->setId_categoria(mysqli_insert_id($link));
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
        $objVO = new categoriaVO();
        $return = array();
        $query = 'SELECT * FROM categoria ORDER BY ID_categoria';
        $resultado = mysqli_query($link, $query);
        while ($rs = mysqli_fetch_array($resultado)) {
            $objVO->setId_categoria(stripslashes($rs['ID_CATEGORIA']));
            $objVO->setDescricao(stripslashes($rs['DESCRICAO']));
            $objVO->setMenu_pai(stripslashes($rs['MENU_PAI']));
            
            $return [] = clone $objVO;
        }
        return $return;
    }

/*     * ************** FIM GetAll ******************* */

    public function getCategorias($link, $id) {
        $objVO = new categoriaVO();
        $return = array();
        $query = "SELECT * FROM categoria WHERE ID_CATEGORIA = {$id}";
        $resultado = mysqli_query($link, $query);
        while ($rs = mysqli_fetch_array($resultado)) {
            $objVO->setId_categoria(stripslashes($rs['ID_CATEGORIA']));
            $objVO->setDescricao(stripslashes($rs['DESCRICAO']));
            $objVO->setMenu_pai(stripslashes($rs['MENU_PAI']));
            
            $return [] = clone $objVO;
        }
        return $return;
    }

}
