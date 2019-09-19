<div class="container-sala">
<h1> Aguardando Alunos...</h1>
<div class="col-md-12" id="item-sala">

  <div class="col-md-12">
    {foreach from=$alunos item=$aluno}
    <div class="col-md-9">
      <h3>Turma - {$aluno["nome_turma"]}</h3>
    </div>
    <div class="col-md-3">
      <h3>Alunos na sala</h3>
      Aluno: {$aluno["nome_aluno"]}
    </div>
    {/foreach}
  </div>

  <div class="col-md-12">
    <form action="index_base.php?pag=sala" method="POST">
      <input type="hidden" id="id_quiz" name="id_quiz" value="{$id_quiz}">
      <input type="hidden" id="fechar_sala" name="fechar_sala" value="{$id_quiz}">
      <i class="icon-chevron-sign-right" style="font-size:30px"></i>
      <button class="" name="fechar_sala">
        Fechar Sala
      </button>
      <button class="" name="iniciar_quiz">
        Iniciar Quiz
      </button>
    </form>
  </div>


</div>
</div>
