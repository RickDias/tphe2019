<?php
class Users{

    public function getListUsers(){
            $database = new Connector();
            $db = $database->getDatabaseConnection();
            $list = $db->from('phpauth_users')
                    ->orderBy('id', 'desc')
                    ->select()
                    ->all();
            return $list;
        }

    public function getUser(){
        $database = new Connector();
        $db = $database->getDatabaseConnection();
        $list = $db->from('phpauth_users')
                ->where('id')->eq($this->id)
                ->orderBy('id', 'desc')
                ->select()
                ->all();
        return $list[0];
    }


    public function getLevels(){
        $database = new Connector();
        $db = $database->getDatabaseConnection();
        $res = $db->from('phpauth_level')
                ->where('isactive')->eq(1)
                ->orderBy('id', 'asc')
                ->select()
                ->all();
        return (object)$res;
    }


    public function updateUser($id, $name, $level, $isactive){
        $database = new Connector();
        $db = $database->getDatabaseConnection();
        $res = $db->update('phpauth_users')
                     ->where('id')->is($id)
                     ->set(array(
                        'name' => $name,
                        'level' => $level,
                        'isactive' => $isactive,
                     ));
                     return (object)$res;
    }

    public function addUser($auth, $name, $email, $password, $level, $isactive){

                $params = array("name" => "{$name}", "level" => "{$level}");
                $res = $auth->register($email, $password, $password, $params);
                var_dump($res);


                     return (object)$res;
    }

}

 ?>
