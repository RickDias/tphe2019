<?php
namespace Modules\Dashboard;

class Dashboard
{
    public function getDashboardList()
    {
        $database = new \Connector();
        $db = $database->getConnection();
        $result = $db->from(getenv('DB_PREFIX').'dashboard')
                        ->orderBy('id_dashboard', 'ASC')
                        ->select()
                        ->all();
        return (object)$result;
    }

    public function getDashboardKpiIds($id_dashboard)
    {
        $database = new \Connector();
        $db = $database->getConnection();
        $result = $db->from(getenv('DB_PREFIX').'dashboard_kpi')
                        ->where('id_dashboard')->eq($id_dashboard)
                        ->orderBy('id_dashboard', 'ASC')
                        ->select()
                        ->all();
        return (object)$result;
    }


    public function getDashboardKpis($id_dashboard)
    {
        $kpiClass = new \Modules\Dashboard\Kpi();
        $dashs = $this->getDashboardKpiIds($id_dashboard);
        $dateStart = '2019-01-01';
        $dateEnd = date("Y-m-d");
        foreach ($dashs as $key => $kpi) {
            $dados[] = $kpi->id_kpi;
        }
        return (object)$dados;
    }


    public function getDashboard($id_dashboard){
        $database = new \Connector();
        $db = $database->getConnection();
        $result = $db->from(getenv('DB_PREFIX').'dashboard')
                        ->where('id_dashboard')->eq($id_dashboard)
                        ->orderBy('id_dashboard', 'ASC')
                        ->select()
                        ->all();
        return (object)$result;

    }

}
