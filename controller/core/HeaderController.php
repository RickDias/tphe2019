<?php

class HeaderController
{
    public function setHeader()
    {
        global $configDir;
        $tplData = [
                'title' => self::setTitle(),
                'TPL_DIR' => $configDir['TPL_DIR'],
                'moduleCSS' => $this->addModuleCSS()
            ];

        $tpl = new Template();
        $content = $tpl->render('header', $tplData);
        // $content = [ 'header' ,"asdfasdfasd"];
        // return $content;
        // $smarty->display('h eader.tpl');
    }


    public static function setTitle(){
        return getenv('APP_ADMIN_TITLE');
    }


    public function addModuleCSS(){

        $cssURL = "./modules/".strtolower(Tools::getValue("module"))."/css/".strtolower(Tools::getValue("module")).".css";
        if (file_exists($cssURL))
        {
            return $cssURL;
        }else{
            return false;
        }
    }



}
