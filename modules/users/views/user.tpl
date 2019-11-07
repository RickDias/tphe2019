<div class="col-12 stretch-card grid-margin">
    <div class="card">
        <div class="card-header header-sm d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <h4>{$title}</h4>
            </div>
        </div>
        <div class="card-body">
            <form class="forms-sample" name="edit" method="post" action="index.php?page=saveUser&module=Users&processDB=true">
                <input type='hidden' name='id' value="{$user->id}">
                <div class="form-group row">
                    <label for="inputNome" class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-4">
                        <input type="name" class="form-control" id="inputNome" placeholder="Digite o Nome" data-cip-id="inputNome" name="name" value="{$user->name}"> </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">E-Mail</label>
                    <div class="col-sm-4">
                        {if ($edit eq 'true')}
                            <input type="email" class="form-control" id="inputEmail" placeholder="Digite o seu E-mail" data-cip-id="inputEmail" name="email" value="{$user->email}" readonly="readonly"> </div>
                        {else}
                            <input type="email" class="form-control" id="inputEmail" placeholder="Digite o seu E-mail" data-cip-id="inputEmail" name="email" value="{$user->email}" > </div>
                        {/if}
                </div>
                {if (!empty($id) or ($id eq NULL))}
                <div class="form-group row">
                    <label for="inputPass" class="col-sm-2 col-form-label">Senha</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" id="inputPass" placeholder="Digite sua senha" data-cip-id="inputPass" name="password" value=""> </div>
                </div>
                {/if}
                <div class="form-group row">
                    <label for="inputLevel" class="col-sm-2 col-form-label">Nível</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="level" id="inputLevel" data-cip-id="inputLevel">
                            {foreach from=$levels item=level}
                            {if $user->level == $level->id}
                                <option value="{$level->id}" selected="selected">{$level->id}. {$level->level|unescape:"entity"}</option>
                            {else}
                                <option value="{$level->id}">{$level->id}. {$level->level|unescape:"entity"}</option>
                            {/if}
                            {/foreach}
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputLevel" class="col-sm-2 col-form-label">Ativo</label>
                    <div class="col-sm-4">
                        <div class="form-check form-check-flat col-sm-4">
                            {if $user->isactive == 1}
                            <label class="form-check-label">&nbsp;<input type="checkbox" name="isactive" class="form-check-input" checked="checked"><i class="input-helper"></i></label>
                            {else}
                            <label class="form-check-label">&nbsp;<input type="checkbox" name="isactive" class="form-check-input"><i class="input-helper"></i></label>
                            {/if}
                        </div>
                    </div>
                </div>



                <label class="col-sm-2 col-form-label"></label>
                <button type="submit" class="btn btn-success mr-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>
