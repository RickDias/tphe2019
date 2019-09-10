<div class="container-sala">
<h1> Aguardando Alunos...</h1>
<div class="col-md-12" id="item-sala">
  <div class="col-md-6">
    <h3>Alunos na sala</h3>
    {foreach from=$alunos item=$aluno}
    ID={$aluno->getId()}
    {/foreach}
  </div>
  <div class="col-md-12">
    <form action="index_base.php?pag=sala" method="POST">
      <input type="hidden" id="id_quiz" name="id_quiz" value="{$id_quiz}">
      <input type="hidden" id="fechar_sala" name="fechar_sala" value="{$id_quiz}">
      <i class="icon-chevron-sign-right" style="font-size:30px"></i>
      <button class="">
        Fechar Sala
      </button>
  </form>
  </div>
</div>
</div>
