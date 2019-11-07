<?php

/**
* Exibir informações e dados relevantes
*/
class TesteController
{
    public function testeInit()
    {
      $smarty = new Smarty;
      $smarty->template_dir = 'modules/teste/views';
      $smarty->config_dir = 'modules/teste/controllers';
      $smarty->cache_dir = 'cache';
      $variavel= Tools::getValue('get');
      $smarty->assign('name',$variavel);
      $smarty->display('index.tpl');
    }

    public function kpiListInit()
    {
        global $configDir, $page;
        $tpl = new \Template();
        $kpi = new \Modules\Dashboard\Kpi();
        $tplData =
            [
                "title" => '<i class="mdi mdi-credit-card-multiple mr-2"></i>Lista de Indicadores',
                "kpiList" => $kpi->getKpiList()
            ];

        $content = $tpl->output('modules/'.strtolower(Tools::getValue('module')).'/views/kpi-list', $tplData);
        return $content;
    }

    public function kpiGraphInit()
    {
        return $this->dashboardInit();
    }


    public function graphLoad($id_kpi = false, $id_dashboard=false)
    {
        global $configDir, $page;
        $tpl = new \Template();
        $kpi = new \Modules\Dashboard\Kpi();
        $graph = new \Modules\Dashboard\Graph();
        if ($id_dashboard){
            $dash = new \Modules\Dashboard\Dashboard();
            $dasboard = $dash->getDashboardKpiIds($id_dashboard);
        }else{
            $dasboard->posicao_linha = 1;
            $dasboard->posicao_coluna = 1;
        }



        if (!$dateStart or !$dateEnd) {
            $dateStart = '2019-01-01';
            $dateEnd = date("Y-m-d");
        } else {
            $dateStart = date("Y-m-d", strtotime($dateStart));
            $dateEnd = date("Y-m-d", strtotime($dateEnd));
        }
        $kpis[] = $id_kpi;

        foreach ($kpis as $key => $id_kpi) {
            $dados[$id_kpi] = $kpi->getKpiData($id_kpi, $dateStart, $dateEnd);
            $kpiName[$id_kpi] = $kpi->getKpiName($id_kpi);
        }
        $tplData =
                [
                    "idKpi" => $id_kpi,
                    "kpiName" => $kpiName,
                    "rowPosition"   => $dashboard->posicao_linha,
                    "colPosition"   => $dashboard->posicao_coluna,
                    "graphOptions" => json_encode($graph->prepareSingleGraphOptions($dados))
                ];
        $content = $tpl->renderToVar('modules/'.strtolower(Tools::getValue('module')).'/views/graph', $tplData);
        return $content;
    }


    public function dashboardActions(){
        global $configDir, $page;
        $tpl = new \Template();
        $kpi = new \Modules\Dashboard\Kpi();
        $dash = new \Modules\Dashboard\Dashboard();
        $id_dashboard = \Tools::getValue('id_dashboard');
        if($id_dashboard){
            $dashboard = current($dash->getDashboard($id_dashboard));
            $kpisSelected = (array)$dash->getDashboardKpis($id_dashboard);
            $title = "Editar Dashboard";
        }else{
            $kpis = false;
            $dashboard = false;
            $title = "Novos Dashboard";
        }

        $kpiList = $kpi->getKpiList();
        foreach ($kpiList as $key => $kpi) {
            $key_search = in_array($kpi->id_kpi, $kpisSelected);
            if ($key_search){
                $kpi->checked = true;
                $kpiListNew[] = $kpi;
            }else{
                $kpi->checked = false;
                $kpiListNew[] = $kpi;
            }
            unset($key_search);
        }

        $tplData =
            [
                "title" => '<i class="mdi mdi-credit-card-multiple mr-2"></i> '.$title,
                "dashboard" => $dashboard,
                "kpiList" => $kpiListNew
            ];
        $content = $tpl->output('modules/'.strtolower(Tools::getValue('module')).'/views/dashboard/dashboard-add-edit', $tplData);
        return $content;
    }

    public function dashboardList(){
        global $configDir, $page;
        $tpl = new \Template();
        $dashboard = new \Modules\Dashboard\Dashboard();
        $tplData =
            [
                "title" => '<i class="mdi mdi-credit-card-multiple mr-2"></i>Lista de Dashboards',
                "dashboardList" => $dashboard->getDashboardList()
            ];
        $content = $tpl->output('modules/'.strtolower(Tools::getValue('module')).'/views/dashboard/dashboard-list', $tplData);
        return $content;
    }


}
