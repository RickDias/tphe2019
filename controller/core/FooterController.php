<?php
class FooterController
{
    public $tplData;

    public function setFooter()
    {
        $tpl = new Template();
        $tplData = '';
        $content = $tpl->render('footer', $tplData);
        // return ['footer' => $content];
    }
}
