<div class="col-md-10">
  <div class="col-md-12">
    <h1 class="page-header">Cadastrar uma nova Pergunta!</h1>
    <p>
      Ao iniciar o cadastro, é necessário ir até o final, caso contrário as perguntas serão salvas sem respostas.
    </p>
  </div>

  <form role="form" action="index_base.php?pag=define_resp_certa" method="POST">
    <div class="form-group">
      <label>Digite o texto da pergunta:</label>
      <textarea class="form-control" rows="3" name="txtarpergunta"></textarea>
    </div>
    <div class="form-group">
      <label>Selecione a Disciplina</label>
      <select class="form-control" name="seldisciplina">
        {foreach from=$disciplina item=$dados}
        <option value='{$dados->getId_disciplina()}'>{$dados->getNome()}</option>
        {/foreach}
      </select>
    </div>
    <div class="form-group">
      <label>Selecione a Categoria</label>
      <select class="form-control" name="categoria">
        {foreach from=$categoria item=$dados}
          <option value='{$dados->getId_categoria()}'>'{$dados->getDescricao()}'</option>
        {/foreach}
      </select>
    </div>
    <button type="submit" class="btn btn-default">Avançar >></button>
  </form>
</div>
