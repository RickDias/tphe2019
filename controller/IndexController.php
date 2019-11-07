<?php
/*
 - Verificar se está autenticado
 - Montar os TPL Full
 -
 */

class IndexController
{

    public $message_error = '';
    public $isProduction;
    public $moduleOn;

    public function __construct()
    {
        global $page, $errors;

        if(Tools::getValue('version')){
            $this->setVersion(Tools::getValue('version'));
            exit;
        }



      

        // inicia autenticacao
        $auth = new AuthController();
        if ($auth->isAuthorized() == true){
            $page = Tools::loadPage();
            if ($page == "loginCheck"){
                Tools::redirectPage('home');
            }
        }else{
            $page = Tools::loadPage();
            $user = new UsersController();
            if ($page == 'changePass'){
                $errors = $user->changePass(Tools::getValue("key"), Tools::getValue('password'));
                $errors = (object)$errors;
                if ($errors->error){
                    $page = Tools::loadPage('resetP');
                }else{
                    $errors->message = "LogOut";
                    $page = Tools::loadPage('logout');
                }
            }elseif($page == "sendReset"){
                $errors = $user->sendReset(Tools::getValue('password'));
                $page = Tools::loadPage('resetP');
            }elseif ($page == 'resetP'){
                $page = Tools::loadPage('resetP');
            }elseif ($page == 'forgetP'){
                $page = Tools::loadPage('forgetP');
            }else{
                $page = Tools::loadPage('login');
            }
        }

        $errors = (object)$errors;
        $dataAxios = json_decode(file_get_contents('php://input'));
        // exit;
        $ajax = (bool)Tools::getValue('ajax');
        if ($ajax){
            $ajax = true;
        }elseif (isset($dataAxios->ajax)) {
            $ajax = true;
        }

        $processDB = (bool)Tools::getValue('processDB');
        if (!$ajax)
        {
            if($processDB){
                $this->assignView($page);
            }else{
                $this->assignView($page); // deixei a funcção para fazer interceptação futura quando for funcao de banco de dados;
                                            // vai precisar mudar o nome da funcao aqui;
            }
        }else{
            $this->runAjax();
        }

    }


    public function assignView($page = 'index')
    {

        global $smarty, $configDir, $page, $errors;
        $errors = (object)$errors;
        $tpl = new Template();
        $contentController = new ContentController();
        $headerController = new HeaderController();
        $footerController = new FooterController();
        if (isset($errors->login->message)){
            $message_error = $errors->login->message;
        }elseif(isset($errors->message)){
            $message_error = $errors->message;
        }else{
            $message_error = '';
        }

        $tplData = [
            'TPL_DIR'           => $configDir['TPL_DIR'],
            'error_alert_login' => $message_error,
            'HOOK_HEADER'       => $headerController->setHeader(),
            'HOOK_CONTENT'      => $contentController->setContent(),
            'HOOK_FOOTER'       => $footerController->setFooter(),
        ];

        if($page == 'login'){
            $tpl->render('login', $tplData);
        }elseif($page == 'resetP'){
            $tpl->render('resetP', $tplData);
        }elseif($page == 'forgetP'){
            $tpl->render('forgetP', $tplData);

        }else{
            $tpl->render('index', $tplData);
        }
        // $smarty->display('index.tpl');
    }

    public function runAjax(){
        $contentController = new ContentController();
        $contentController->ajax = true;
        return $contentController->setContent();
    }

    public function setVersion($version){
        $database = new Connector();
        $db = $database->getDatabaseConnection();
        $result = $db->update(getenv('DB_PREFIX').'config')
             ->where('nome')->is('VERSION')
             ->set(array(
                'valor' => $version
             ));
    }
}
