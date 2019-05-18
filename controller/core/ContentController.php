<?php
class ContentController{

    public $message_error;
    public $page;
    public $isProduction;

    public function setContent()
    {
        global $configDir, $page, $errors;

        $urlQ = Tools::getUrlQuery();
        $alert = Tools::getAlert();

        $version = new SebastianBergmann\Version(
            '1.0.0', getenv('ROOT_FOLDER')
        );

        $tpl = new \Template();
            if(isset($errors->login->message)){
                $message_error = $errors->login->message;
            }else{
                $message_error = "";
            }

            $pageQ = (isset($urlQ->page)) ? ($urlQ->page): NULL;
            $moduleQ = (isset($urlQ->module)) ? ($urlQ->module): NULL;
            $actionQ = (isset($urlQ->action)) ? ($urlQ->action): NULL;

            $conn = new \Connector(true, "TPHE");
            $pdo = $conn->getConnection();
            $config = new PHPAuth\Config($pdo);
            $auth = new PHPAuth\Auth($pdo, $config);

        $tplData =
            [
                "TPL_DIR" => $configDir['TPL_DIR'],
                "error_alert_login" => $message_error,
                "moduleJS" => $this->addModuleJS(),
                "nameLogin" => $auth->getCurrentUser()["name"],
                "version" => " - ".$version->getVersion(),
                'modulesOn' => $this->getActiveModules(),
                "HOOK_MODULE_MIDDLE_CONTENT" => $tpl->renderModuleView($pageQ, $moduleQ, $actionQ),
                "HOOK_ALERT_CONTENT" => $tpl->renderAlert($alert)
            ];
            if ($this->ajax == true){
                $output = $tpl->output('home', $tplData);
            }else{
                $output = $tpl->output('home', $tplData);
            }
        return $output;
    }

    public function getVersion(){
        $database = new Connector();
        $db = $database->getDatabaseConnection();
        $return = $db->from(getenv('DB_PREFIX').'config')
                    ->where('nome')->is('VERSION')
                    ->limit(1)
                    ->select(['valor'])
                    ->all();
        return $return[0]->valor;
    }

    public function getActiveModules(){

        if (getenv('PRODUCTION') == 1){
            $activeModules = explode(",", getenv('ACTIVE_MODULES'));
            foreach ($activeModules as $key => $value) {
                $moduleOn[] = trim($value);
            }
        }else{
            $activeModules = explode(",", getenv('ALL_MODULES'));
            foreach ($activeModules as $key => $value) {
                $moduleOn[] = trim($value);
            }
        }
        return $moduleOn;
    }

    public function addModuleJS(){

        $jsURL = "./modules/".strtolower(Tools::getValue("module"))."/js/".strtolower(Tools::getValue("module")).".js";
        if (file_exists($jsURL))
        {
            return $jsURL;
        }else{
            return false;
        }
    }
}
