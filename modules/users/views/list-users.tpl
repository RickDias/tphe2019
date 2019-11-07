<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header header-sm align-items-center" >
            <div class="d-flex align-items-center">
                <h4>{$title}</h4>
                {include file="modules/users/views/actions-users.tpl"}
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="bg-light rounded">
                            <th>#</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Nível</th>
                            <th>Ativo</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>

                        {foreach from=$listUsers item=user}
                        <tr class='products_ml_sync' data-id-sync="{$product->id}">
                            <td>{$user->id}</td>
                            <td>{$user->name}</td>
                            <td>{$user->email}</td>
                            <td>{$user->level}</td>
                            <td>{$user->isactive}</td>                            
                            <td class="text-right">
                                <a href="index.php?page=UsersActions&module=Users&id={$user->id}" class="btn btn-info btn-xs">
                                    <i class="fa fa-edit"></i>Editar</a>
                                    <a href="index.php?page=sendReset&module=Users&email={$user->email}" class="btn btn-info btn-xs">
                                        <i class="fa fa-edit"></i>Enviar Senha</a>

                            </td>
                        </tr>
                        {/foreach}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
