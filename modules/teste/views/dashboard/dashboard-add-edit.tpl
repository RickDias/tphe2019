<div class="col-12 stretch-card grid-margin">
    <div class="card">
        <div class="card-header header-sm d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <h4>{$title}</h4>
            </div>
        </div>
        <div class="card-body">
            <form class="forms-sample" name="act" method="post" action="index.php?page=saveDashboard&module=Dashboard&processDB=true">
                {if $dashboard->id_dashboard}
                <input type='hidden' name='id_dashboard' value="{$dashboard->id_dashboard}">
                {/if}
                <div class="form-group row">
                    <label for="inputNome" class="col-sm-2 col-form-label">Nome do Dashboard</label>
                    <div class="col-sm-4">
                        <input type="name" class="form-control" id="inputNome" placeholder="Digite o Nome" data-cip-id="inputNome" name="name" value="{$dashboard->name}">
                    </div>
                </div>
                <div class="form-group row">
                    {foreach from=$kpiList item=kpi}
                    <div for="inputNome" class="col-2 col-sm-2"></div>
                    <div class="col-9 col-sm-9 m-1">
                        {if $kpi->checked == true}
                        <input type="checkbox" name="kpi[]" value="{$kpi->id_kpi}" checked="checked" />
                        {else}
                        <input type="checkbox" name="kpi[]" value="{$kpi->id_kpi}" />
                        {/if}
                        {$kpi->name|unescape:"entity"}
                    </div>
                    {/foreach}                </div>
                <label class="col-sm-2 col-form-label"></label>
                <button type="submit" class="btn btn-success mr-2">Gravar</button>
                <a href="index.php?page=dashboardList&module=Dashboard" class="btn btn-light">
                    <i class="mdi mdi-keyboard-backspace"></i>Voltar
                </a>

            </form>
        </div>
    </div>
</div>
