<div class="col-12 col-sm-12 grid-margin">
    <div class="card">
        <div class="card-header header-sm d-flex align-items-top">
            <div class="d-flex align-items-center">
                <h4>{$title}</h4>
            </div>
            <a href="index.php?page=dashboardActions&module=Dashboard" class="btn btn-xs btn-primary ml-auto">Criar Novo Dashboard  </a>
        </div>
        <div class="card-body">
            <div>
                <table class="table table-hover table-striped table-condensed-carrot">
                    <thead>
                        <tr class="bg-light d-flex rounded">
                            <th class="col-10 col-sm-10">Dashboard</th>
                            <th class="col-2 col-sm-2">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach from=$dashboardList item=dashboard}
                        <tr class="d-flex">
                            <td class="col-5 col-sm-5 align-middle">
                                {$dashboard->id_dashboard}. {$dashboard->name|unescape:"entity"}
                            </td>
                            <td class="col-7 col-sm-7 text-center align-middle">
                                <a href="index.php?page=dashboardInit&module=Dashboard&id_dashboard={$dashboard->id_dashboard}" class="btn btn-xs btn-success">Exibir</a>
                                <a href="index.php?page=dashboardActions&module=Dashboard&id_dashboard={$dashboard->id_dashboard}" class="btn btn-xs btn-primary">Editar</a>
                            </td>
                        </tr>
                        {/foreach}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
