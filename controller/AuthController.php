<?php
/*
    - confere se confere a senha e o usuario
    - retorna se está logado ou não.
*/

class AuthController
{
    public $auth;

    public function __construct()
    {
        $conn = new Connector(true, "TPHE");
        $pdo = $conn->getConnection();
        $config = new PHPAuth\Config($pdo);
        $this->auth = new PHPAuth\Auth($pdo, $config);
    }

    public function isAuthorized(){
        global $page, $context, $errors;

        $page = Tools::loadPage();
        if ($page == "logout") {
            $this->logout();
            $result = false;
        }else{
            if ($this->isLogged()) {
                $result = true;
            } else {
                if ($page == "loginCheck") {
                    $login = $this->actionCheckLogin();
                    if ($login->error) {
                        $errors->login=$login;
                        $result = false;
                    } else {
                        $result = true;
                    }
                } else {
                    $result = false;
                }
            }
        }
        return $result;
    }

    public function isLogged()
    {
        if ($this->auth->isLogged()) {
            return true;
        } else {
            return false;
        }
    }

    public function getUser()
    {
        return Tools::getValue('username');
    }

    public function getPassword()
    {
        return Tools::getValue('password');
    }

    public function actionCheckLogin()
    {
        $user = $this->getUser();
        $pass = $this->getPassword();
        $login = (object)$this->auth->login($user, $pass, 1);
        return $login;
    }


    public function logout()
    {
        $userHash = $this->auth->getSessionHash();
        $logout = $this->auth->logout($userHash);
        return $logout;
    }


    public function getUsuario(){
        return $this->auth->getCurrentUser()["email"];
        // return $u["email"];
    }

}
