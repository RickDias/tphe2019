<div class="container-sala">
<h1> Aguardando Alunos...</h1>
<div class="col-md-12" id="item-sala">
  <div class="col-md-12" id="div_alunos_sala">
    <div class="col-md-9" >
      <h3 id="turma_nome">Turma - ?</h3>
    </div>
    {if $alunos}
    <div class="col-md-3" id="teste">
      <h3>Alunos na sala</h3>
      Aluno:<br>
      {foreach from=$alunos key=$key item=$aluno}
        <span id="aluno_nome_{$key}" class="nome_aluno">{$aluno["nome_aluno"]}</span><br>
      {/foreach}
    </div>
    {else}
    <div class="col-md-3" id="sem_alunos">
      <h3>Alunos na sala</h3>
      Sem Alunos na turma!
    </div>
    {/if}
  </div>

  <div class="col-md-12">
    <form id="form_alunos" action="index_base.php?pag=sala" method="POST">
      <input type="hidden" id="id_quiz" name="id_quiz" value="{$id_quiz}">
      <input type="hidden" id="fechar_sala" name="fechar_sala" value="{$id_quiz}">
      <i class="icon-chevron-sign-right" style="font-size:30px"></i>
    </form>
    <a href="index_base.php?pag=sala&fechar_sala=1&id_quiz={$id_quiz}&id_turma={$id_turma}" class="btn btn-outline btn-danger" name="fechar_sala">
      Fechar Sala
    </a>
      <a href="index_base.php?pag=quiz_admin&iniciar_quiz=1&id_quiz={$id_quiz}&id_turma={$id_turma}" class="btn btn-outline btn-success">
      Iniciar Quiz
    </a>
  </div>

</div>
</div>
<script>

function loadlink(){
  // $('#div_alunos_sala').load(self);
    // $('#div_alunos_sala').load('index_base.php?pag=sala&update_alunos=1&id_quiz={$id_quiz}&id_turma={$id_turma}',function () {
         // $(this).unwrap();
         // console.log( $(this));
    // });
    $.ajax({
               type:"POST",
               url: "ajax_sala.php",
               async:true,
               dataType : "json",
               data: {
                 id_quiz:{$id_quiz},
                 id_turma:{$id_turma}
               },
               success: function( data ) {
                 var total_element = data.length;
                 var total_element_html =  $('.nome_aluno').length;

                 $.each(data, function(i, val){
                   var nome_aluno = $('#aluno_nome_'+i);
                   // Append tem a função de inserir
                   nome_aluno.html(data[i]["nome_aluno"]);
                   console.log(nome_aluno.html());
                   console.log(data[i]["nome_aluno"]);
                   if( total_element < total_element_html){
                       $('#aluno_nome_'+(i)).remove();
                   }
                   if(i == total_element_html){
                     // i++;
                     $('#teste').append('<span id="aluno_nome_'+i+'" class="nome_aluno">'+data[i]["nome_aluno"]+'</span><br>');
                   }
               });
                 // alert(data);
               },
               error: function( xhr, status) {
               // alert( "Desculpe, não foi possivel encontrar alunos!" );
               console.log(xhr);
               console.log(status);
               }
               });
}

// loadlink(); // This will run on page load
setInterval(function(){
    loadlink() // this will run after every 5 seconds
}, 2000);


</script>
