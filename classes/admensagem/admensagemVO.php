<?php
class admensagemVO {

    private $id_mensagem;
    private $id_usuario;
    private $mensagem;
    private $data;

    function getId_mensagem() {
		return $this->id_mensagem;
	}

  function getId_usuario() {
    return $this->id_usuario;
  }
    function getMensagem() {
		return $this->mensagem;
	}

	function getData() {
		return $this->data;
	}


    function setId_mensagem($id_mensagem) {
		$this->id_mensagem = $id_mensagem;
	}

  function setId_usuario($id_usuario) {
		$this->id_usuario = $id_usuario;
	}

    function setMensagem($mensagem) {
		$this->mensagem = $mensagem;
	}

	function setData($data) {
		$this->data = $data;
	}

}
