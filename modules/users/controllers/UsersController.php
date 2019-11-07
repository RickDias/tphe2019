<?php
class UsersController{

    public $id;

    public function UsersInit(){
        global $configDir, $page;
        $tpl = new Template();
        $users = new Users();
        $tplData =
            [
                "title" => "Usuários",
                "listUsers" => $users->getListUsers(),
            ];

        $content = $tpl->output('modules/'.strtolower(Tools::getValue('module')).'/views/list-users', $tplData);
        return $content;
    }

    public function UsersActions(){
        if (Tools::getValue('id')){
            return $this->editUser();
        }else{
            return $this->addUser();
        }
    }


    public function sendReset(){
        $conn = new Connector(true, "TPHE");
        $pdo = $conn->getConnection();
        $config = new PHPAuth\Config($pdo);
        $auth = new PHPAuth\Auth($pdo, $config);
        $res = $auth->requestReset(Tools::getValue('email'));
        // var_dump($res);
        // exit;
        return $res;
    }

    public function changePass($key, $pass){
        $conn = new Connector(true, "TPHE");
        $pdo = $conn->getConnection();
        $config = new PHPAuth\Config($pdo);
        $auth = new PHPAuth\Auth($pdo, $config);
        $res = $auth->resetPass($key, $pass,$pass);
        return $res;
        // exit;

    }

    public function editUser(){
        global $configDir, $page;
        $tpl = new Template();
        $users = new Users();
        $users->id = Tools::getValue('id');
        $tplData =
            [
                "title"     => "Editar Usuário",
                "user"      => $users->getUser(),
                "levels"    => $users->getLevels(),
                "edit"      => true
            ];

        $content = $tpl->output('modules/'.strtolower(Tools::getValue('module')).'/views/user', $tplData);
        return $content;
    }


    public function addUser(){
        global $configDir, $page;
        $tpl = new Template();
        $users = new Users();
        $tplData =
            [
                "title"     => "Adicionar Usuário",
                "levels"    => $users->getLevels()
            ];

        $content = $tpl->output('modules/'.strtolower(Tools::getValue('module')).'/views/user', $tplData);
        return $content;

    }

    public function saveUser(){
        $frmData = extract($_POST);
        $users = new Users();

        $conn = new Connector(true, "TPHE");
        $pdo = $conn->getConnection();
        $config = new PHPAuth\Config($pdo);
        $auth = new PHPAuth\Auth($pdo, $config);
        $user = (object)$auth->getUser($id);
        if ($isactive == 'on'){
            $isactive =  1;
        }else{
            $isactive = 0;
        }
        var_dump($user);
        // exit;
        if (!$id){
            $res = $users->addUser($auth, $name, $email, $password, $level, $isactive);
            if ($res){
                Tools::redirectPage('UsersInit', array("module"=>"Users"));
            }
        }else{
            if ($user->email == $email){
                $res = $users->updateUser($id, $name, $level, $isactive);
                if ($res){
                    Tools::redirectPage('UsersInit', array("module"=>"Users"));
                }
            }else{
                echo 'Email divergente!';
                exit;
            }

        }
        //
        // $users = new Users();
        // $users ->saveUser($frmData);
    }

}

 ?>
