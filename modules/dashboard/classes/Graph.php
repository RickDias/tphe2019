<?php
namespace Modules\Dashboard;

class Graph
{
    public function prepareSingleGraphOptions($seriesResult)
    {
        foreach ($seriesResult as $key => $value) {
            $se = $this->getSeries($value);
            $series[] = $se->dados;
            $kpiName = $se->kpi_name;
        }
        $chart = [ chart => [
                    height  => 380,
                    width   => "100%",
                    type    => "area"
                            ],
                 series => $series,
                 title  => [ text => $kpiName, align => 'center', style => [ fontSize => '16px' ],],
                 dataLabels => [ enabled => true, style=> [ colors => [ red ]] ],
                 xaxis => [
                     type => 'datetime' ]
                ];
        return $chart;
    }

    public function getSeries($results)
    {
        foreach ($results as $key => $value) {
            $data[] = [ $value->data_kpi, (int)$value->dados ];
        }

        $s = [ name => utf8_encode($value->id_kpi. ". ". $value->kpi_name),
               data => $data ];

        return (object)['kpi_name' => utf8_encode($value->id_kpi. ". ". $value->kpi_name), 'dados' => $s];
    }
}
