<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Cadastrar uma nova Pergunta!</h1>
  </div>

  <form role="form" action="..\functions\gravar_pergunta.php" method="POST">

    <div class="form-group">
      <label>Pergunta:</label>
      {foreach from=$categoria item=$dados}
      {$dados->getDescricao()}
      {/foreach}
    </div>
    <div class="form-group">
      <label>Disciplina:</label>
      {foreach from=$disciplina item=$dados}
      {$dados->getNome()}
      {/foreach}
    </div>
    <div class="form-group">
      <label>Categoria:</label>
      {foreach from=$categoria item=$dados}
      {$dados->getDescricao()}
      {/foreach}
    </div>
    <div class="form-group">
      <label>Resposta correta:</label>
      {$resp_certa}
    </div>

    <div class="form-group">
      <!-- passando as variaveis abaixo nas inputs hidden para a proxima pagina acessar os dados -->
      <input type="hidden" name="idpergunta" value="{$id_pergunta}">
      <input type="hidden" name="txtrespcerta" value="{$resp_certa}">
      <label>Digite 3 opções de respostas erradas:</label></br>
    </div>
    <div class="form-group">
      <label>Opção 1:</label>
      <input class="form-control" name="txtresperr1">

      <label>Opção 2:</label>
      <input class="form-control" name="txtresperr2">

      <label>Opção 3:</label>
      <input class="form-control" name="txtresperr3">

    </div>

    <button type="submit" class="btn btn-default">Finalizar</button>
    <!--button type="reset" class="btn btn-default">Reset Button</button-->

  </form>

</div>
