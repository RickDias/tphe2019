<?php

class sala_alunoVO {

    public $id;
    public $id_aluno;
    public $visivel;
    public $id_pontuacao;


    function getId() {
        return $this->id;
    }

    function getId_aluno() {
        return $this->id_aluno;
    }

    function getVisivel() {
        return $this->visivel;
    }

    function getId_pontuacao() {
        return $this->id_pontuacao;
    }


    function setId($id) {
        $this->id = $id;
    }

    function setId_aluno($id_aluno) {
        $this->id_aluno = $id_aluno;
    }

    function setVisivel($visivel) {
        $this->visivel = $visivel;
    }

    function setId_pontuacao($id_pontuacao) {
        $this->id_pontuacao = $id_pontuacao;
    }

}
