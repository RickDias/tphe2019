<?php
class Template
{
    private $_smarty;
    public $data;

    public function __construct(){
        global $configDir;
        $this->configureSmarty();
        $configDir = $this->setConfigDir();
    }

    private function configureSmarty()
    {
        $this->_smarty = new Smarty();
        $this->_smarty->setTemplateDir(getenv('SMARTY_TEMPLATE_DIR'))
               ->setCompileDir(getenv('SMARTY_COMPILE_DIR'))
               ->setCacheDir(getenv('SMARTY_CACHE_DIR'));

        $this->_smarty->force_compile = getenv('SMARTY_COMPILE');
        $this->_smarty->debugging = getenv('SMARTY_DEBUG');
        $this->_smarty->caching = getenv('SMARTY_CACHE');
        $this->_smarty->cache_lifetime = getenv('SMARTY_CACHE_LIFETIME');
        // return $this->$_smarty;
    }


    private function setConfigDir()
    {
        $configDir = [
                    'TPL_DIR' => getenv('SMARTY_TEMPLATE_DIR'),
                     ];
        return $configDir;
    }

    public function render($template, $data){
        if (is_array($data)){
            foreach($data as $key => $value){
                $this->_smarty->assign($key, $value);
            }
        }
        $this->_smarty->display($template. '.tpl');
    }

    public function renderToVar($template, $data){
        if (is_array($data)){
            foreach($data as $key => $value){
                $this->_smarty->assign($key, $value);
            }
        }
        $fet = $this->_smarty->fetch($template. '.tpl');
        return $fet;
    }

    public function output($template, $data = array()){
        $this->_smarty->createTemplate($template. '.tpl');
        foreach($data as $key => $value){
            $this->_smarty->assign($key, $value);
        }
        $output = $this->_smarty->fetch($template.'.tpl');
        return $output;
    }

    public function renderModuleView($page=NULL, $module=NULL, $action=NULL){
        if ($this->isModule($module)){
            $controller = $module."Controller";
            $module = new $controller();
            // if(!$module){
            //     $controller = "\\".$namespace."\\".$module."Controller";
            //     $module = new $controller();
            // }
            // var_dump($module);
            // exit;
            // return $cont;
            $cont = $module->$page();
            return $cont;
        }
    }

    public function isModule($module=NULL){
        if(!is_null($module)){
            return true;
        }else{
            return false;
        }
    }

    public function renderAlert($alert = false){
        $alert = Tools::getValue('alert');
        $database = new Connector();
        $db = $database->getDatabaseConnection();
        $results = $db->from(getenv('DB_PREFIX').'msg_alerta')
                    ->where('abrev')->eq($alert)
                    ->limit(1)
                    ->select()
                    ->all();
        $alertObj = (object)$results[0];
        if (($alertObj->pub == "true")){
            return $this->output('extra/alert', ['alert' => $alertObj]);
        }
    }



}
