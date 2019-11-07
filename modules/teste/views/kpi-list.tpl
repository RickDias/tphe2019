<div class="col-12 col-sm-12 grid-margin">
    <div class="card">
        <div class="card-header header-sm d-flex align-items-top">
            <div class="d-flex align-items-center">
                <h4>{$title}</h4>
            </div>
        </div>
        <div class="card-body">
            <div>
                <form class="forms-sample" name="generate" method="post"  action="index.php?page=kpiGraphInit&module=Dashboard">
                    <table class="table table-hover table-striped table-condensed-carrot">
                        <thead>
                            <tr class="bg-light d-flex rounded">
                                <th class="col-1 col-sm-1 text-left">Id</th>
                                <th class="col-8 col-sm-8">Indicador/Kpi</th>
                                <th class="col-1 col-sm-1 text-center">Unidade</th>
                                <th class="col-2 col-sm-2">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            {foreach from=$kpiList item=kpi}
                            <tr class="d-flex">
                                <td class="col-1 col-sm-1 text-left align-middle">
                                    <input type="checkbox" name="id_kpi[]" value="{$kpi->id_kpi}" />
                                    {$kpi->id_kpi}
                                </td>
                                <td class="col-8 col-sm-8 align-middle">
                                    {$kpi->name|unescape:"entity"}
                                </td>
                                <td class="col-1 col-sm-1 text-center align-middle">{$kpi->unit_abrev}</td>
                                <td class="col-2 col-sm-2 text-center align-middle">
                                    <a href="return false;" onclick="javascript:alert('buuuu'); return false;" class="btn btn-xs btn-primary">Editar</a>
                                    <a href="index.php?page=kpiGraphInit&module=Dashboard&id_kpi[]={$kpi->id_kpi}" class="btn btn-xs btn-primary">Gráfico</a>
                                </td>
                            </tr>
                            {/foreach}
                        </tbody>
                    </table>
                    <div class="form-group row mt-3">
                        <label for="dataInicial" class="col-1 col-sm-1 col-form-label">Início</label>
                        <div class="col-2 col-sm-2">
                            <div id="datepicker-popup-inicial" class="datepicker-popup input-group date datepicker align:center" data-date-format="dd/mm/yyyy">
                                <input type="text" class="form-control" data-cip-id="cIPJQ999" name="dataInicial" autocomplete="off">
                                <span class="input-group-addon input-group-append border-left">
                                    <span class="mdi mdi-calendar input-group-text"></span>
                                </span>
                            </div>
                        </div>
                        <label for="dataFinal" class="col-1 col-sm-1 col-form-label">Final</label>
                        <div class="col-2 col-sm-2">
                            <div id="datepicker-popup-final" class="datepicker-popup input-group date datepicker align:center" data-date-format="dd/mm/yyyy">
                                <input type="text" class="form-control"  data-cip-id="cIPJQ998" name="dataFinal" autocomplete="off">
                                <span class="input-group-addon input-group-append border-left">
                                    <span class="mdi mdi-calendar input-group-text"></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-2 col-sm-2">
                            <button type="submit" class="btn btn-sm btn-primary">Gerar Gráficos</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
