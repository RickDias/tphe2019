<?php

class usuarioVO {

    public $id_usuario;
    public $nome;
    public $email;
    public $senha;
    public $id_tipo_usuario;
    public $id_facebook;
    public $img_capa;
    public $img_perfil;



    function getId_facebook() {
        return $this->id_facebook;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function getId_tipo_usuario() {
        return $this->id_tipo_usuario;
    }
    function getImg_perfil() {
        return $this->img_perfil;
    }
    function getImg_capa() {
        return $this->img_capa;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setId_tipo_usuario($id_tipo_usuario) {
        $this->id_tipo_usuario = $id_tipo_usuario;
    }

    function setId_facebook($id_facebook) {
        $this->id_facebook = $id_facebook;
    }
    function setImg_perfil($img_perfil) {
        $this->img_perfil = $img_perfil;
    }
    function setImg_capa($img_capa) {
        $this->img_capa = $img_capa;
    }



}
