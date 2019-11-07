<?php
class admensagemDAO {
    public function insert(admensagemVO $objVO, $link) {
        $query = ("INSERT INTO `ad_mensagem`(`id_usuario`, `mensagem`, `data`) VALUES ('{$objVO->getId_usuario()}','{$objVO->getMensagem()}','{$objVO->getData()}')");

		try {
            if (mysqli_query($link, $query)) {
				$last_id = mysqli_insert_id($link);
                mysqli_commit($link);
				$objVO->setId_mensagem($last_id);

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
        $objVO = new admensagemVO();
        $return = array();
        $query = 'SELECT * FROM `ad_mensagem` ORDER BY `id_mensagem`';
        $resultado = mysqli_query($link, $query);
        while ($rs = mysqli_fetch_array($resultado)) {
            $objVO->setId_mensagem(stripslashes($rs['id_mensagem']));
            $objVO->setId_usuario(stripslashes($rs['id_usuario']));
            $objVO->setMensagem(stripslashes($rs['mensagem']));
            $objVO->setData(stripslashes($rs['data']));

            $return [] = clone $objVO;
        }
        return $return;
    }
/*     * ************** FIM GetAll ******************* */

    public function getPerguntas($link, $id) {
        $objVO = new admensagemVO();
        $return = array();
        $query = "SELECT * FROM `ad_mensagem` WHERE `id_mensagem` = {$id}";
        $resultado = mysqli_query($link, $query);
        while ($rs = mysqli_fetch_array($resultado)) {
          $objVO->setId_mensagem(stripslashes($rs['id_mensagem']));
          $objVO->setId_usuario(stripslashes($rs['id_usuario']));
          $objVO->setMensagem(stripslashes($rs['mensagem']));
          $objVO->setData(stripslashes($rs['data']));

            $return [] = clone $objVO;
        }
        return $return;
    }
}
