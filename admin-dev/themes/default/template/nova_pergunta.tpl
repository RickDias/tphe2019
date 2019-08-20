<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Cadastrar uma nova Pergunta!</h1>
    <p> Digite o texto da pergunta que deseja cadastrar, informe a disciplina a que pertence e sua respectiva categoria. Clique em Avançar.
      Na próxima tela, informe a opção que representa a resposta certa, clique em Avançar. Em seguida, informe as 3 opções que representarão
      as opções de resposta erradas. Ao iniciar o cadastro, vá até o fim.
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
