<div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header">Cadastrar uma nova Pergunta!</h1>
              </div>

      <form role="form" action="index_base.php?pag=define_resp_errada" method="POST">

        <div class="form-group">
          <label>Pergunta:</label>
          {foreach from=$pergunta item=$dados}
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
              <input type="hidden" id="categoria" name="categoria" value="{$dados->getId_categoria()}">
          {/foreach}
        </div>

        <div class="form-group">
          <label>Digite a resposta correta:</label>
              <!-- passando as variaveis abaixo nas inputs hidden para a proxima pagina acessar os dados -->
              <input type="hidden" name="idpergunta" value="{$id_pergunta}">
          <input class="form-control" name="txtrespcerta">
        </div>

        <button type="submit" class="btn btn-default">Avançar >></button>

      </form>

          </div>
