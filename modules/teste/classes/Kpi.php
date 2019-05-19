<?php
namespace Modules\Dashboard;

/**
 * Processamento dos indicadores
 */
class Kpi
{
    public function getKpiList()
    {
        $database = new \Connector();
        $db = $database->getConnection();
        $result = $db->from([getenv('DB_PREFIX').'kpi' => 'kpi'])
                        ->join([getenv('DB_PREFIX').'kpi_unit' => 'unit'], function($join){
                               $join->on('kpi.id_kpi_unit', 'unit.id_kpi_unit');
                            })
                        ->orderBy('id_kpi', 'ASC')
                        ->select(['kpi.*', 'unit.name' => 'unit_name', 'unit.abrev'=>'unit_abrev'])
                        ->all();
        return (object)$result;
    }

    public function getKpi($id_kpi)
    {
        $database = new \Connector();
        $db = $database->getConnection();
        $result = $db->from(getenv('DB_PREFIX').'kpi')
                        ->where('id_kpi')->eq($id_kpi)
                        ->orderBy('id', 'ASC')
                        ->select()
                        ->all();
        return (object)current($result);
    }


    public function getKpiData($id_kpi, $dateStart, $dateEnd)
    {
        $database = new \Connector();
        $db = $database->getConnection();
        $result = $db->from([getenv('DB_PREFIX').'kpi_data' => 'kpi_data'])
                        ->where('kpi_data.id_kpi')->eq($id_kpi)
                        ->andWhere('kpi_data.date_add')->gte($dateStart)
                        ->andWhere('kpi_data.date_add')->lte($dateEnd)
                        ->join([getenv('DB_PREFIX').'kpi' => 'kpi'], function($join){
                               $join->on('kpi.id_kpi', 'kpi_data.id_kpi');
                            })
                        ->orderBy('id', 'ASC')
                        ->select(['kpi_data.*', 'kpi.name' =>'kpi_name'])
                        ->all();
        return (object)$result;
    }

    public function groupKpiDataByInterval($kpi_data, $interval="day")
    {
        return $kpi_data;
    }

    public function getKpiName($id_kpi){
        $database = new \Connector();
        $db = $database->getConnection();
        $result = $db->from(getenv('DB_PREFIX').'kpi')
                        ->where('id_kpi')->eq($id_kpi)
                        ->orderBy('id_kpi', 'ASC')
                        ->select(['name'])
                        ->all();
        return current($result)->name;
    }
}
