<?php

class quizVO {

    private $id_quiz;
    private $descricao;
    private $dt_inicio;
    private $dt_fim;
    private $publicacao;
    private $id_usuario;
    
    function getId_quiz() {
        return $this->id_quiz;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getDt_inicio() {
        return $this->dt_inicio;
    }

    function getDt_fim() {
        return $this->dt_fim;
    }

    function getPublicacao() {
        return $this->publicacao;
    }
	function getIdUsuario() {
        return $this->id_usuario;
    }
    function setId_quiz($id_quiz) {
        $this->id_quiz = $id_quiz;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setDt_inicio($dt_inicio) {
        $this->dt_inicio = $dt_inicio;
    }

    function setDt_fim($dt_fim) {
        $this->dt_fim = $dt_fim;
    }

    function setPublicacao($publicacao) {
        $this->publicacao = $publicacao;
    }
	function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

   
}
