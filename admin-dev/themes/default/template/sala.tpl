<div class="container-sala">
<h4> Aguardando Alunos...</h4>
<div class="col-md-12" id="item-sala">
  <div class="col-md-12" id="div_alunos_sala">
    <div class="col-md-9" >
      <h3 id="turma_nome">Turma - {$nome_turma}, {$semestre}° Semestre</h3>
    </div>
    <!-- {$alunos|var_dump} -->
    {if $alunos}
    <div class="col-md-3" id="div_alunos_true">
      <h3>Jogadores na sala</h3>
      {foreach from=$alunos key=$key item=$aluno}
      <div class="col-md-12 bloco_aluno" id="bloco_aluno_{$aluno["ID_USUARIO"]}">
        <div class="col-md-3">
          <div class="icon_aluno" style="background:rgb({mt_rand(0,255)},{mt_rand(0,255)},{mt_rand(0,255)})">
            {$aluno["nome_aluno"][0]}
          </div>
        </div>
        <div class="col-md-9" id="teste">
          <h5 id="aluno_nome_{$key}" class="nome_aluno">{$aluno["nome_aluno"]}</h5>
        </div>
      </div>
      {/foreach}
    </div>
  </div>
    {else}
    <div class="col-md-3" id="sem_alunos">
      <h3>Jogadores na sala</h3>
      Sem Alunos na Sala!
    </div>
    {/if}
  </div>

  <div class="col-md-12">
    <form id="form_alunos" action="index_base.php?pag=sala" method="POST">
      <input type="hidden" id="id_quiz" name="id_quiz" value="{$id_quiz}">
      <input type="hidden" id="fechar_sala" name="fechar_sala" value="{$id_quiz}">
      <i class="icon-chevron-sign-right" style="font-size:30px"></i>
    </form>
    <center>
    <a href="index_base.php?pag=sala&fechar_sala=1&id_quiz={$id_quiz}&id_turma={$id_turma}" class="btn btn-outline btn-danger" name="fechar_sala">
      Fechar Sala
    </a>
      <a href="index_base.php?pag=quiz_admin&iniciar_quiz=1&id_quiz={$id_quiz}&id_turma={$id_turma}" class="btn btn-outline btn-success">
      Iniciar Quiz
    </a>
  </center>
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
                   console.log(val["nome_aluno"]);
                   var nome_aluno = $('#aluno_nome_'+i);
                   nome_aluno.html(val["nome_aluno"]);
                   // console.log($('#div_alunos_true').length == 0);
                   if(total_element_html == i){
                     if ($('#div_alunos_true').length == 0){
                     // $('#teste').append('Gerson');
                       $('#div_alunos_sala').append('<div class="col-md-3" id="div_alunos_true"><h3>Jogadores na sala</h3><div class="col-md-12 bloco_aluno" id="bloco_aluno_'+i+'"><div class="col-md-3"><div class="icon_aluno" style="background:rgb({mt_rand(0,255)},{mt_rand(0,255)},{mt_rand(0,255)})">'+val["nome_aluno"][0]+'</div></div><div class="col-md-9" id="teste"><h5 id="aluno_nome_'+i+'" class="nome_aluno">'+data[i]["nome_aluno"]+'</h5></div></div></div></div>');
                     $('#sem_alunos').remove();
                   }else{
                     $('#div_alunos_true').append('<div class="col-md-12 bloco_aluno" id="bloco_aluno_'+i+'"><div class="col-md-3"><div class="icon_aluno" style="background:rgb({mt_rand(0,255)},{mt_rand(0,255)},{mt_rand(0,255)})">'+val["nome_aluno"][0]+'</div></div><div class="col-md-9" id="teste"><h5 id="aluno_nome_'+i+'" class="nome_aluno">'+data[i]["nome_aluno"]+'</h5></div></div>');
                   }
                   }
                   if( total_element < total_element_html){
                     $('#div_alunos_true').remove();
                     $('#div_alunos_sala').append('<div class="col-md-3" id="div_alunos_true"><h3>Jogadores na sala</h3><div class="col-md-12 bloco_aluno" id="bloco_aluno_'+i+'"><div class="col-md-3"><div class="icon_aluno" style="background:rgb({mt_rand(0,255)},{mt_rand(0,255)},{mt_rand(0,255)})">'+val["nome_aluno"][0]+'</div></div><div class="col-md-9" id="teste"><h5 id="aluno_nome_'+i+'" class="nome_aluno">'+data[i]["nome_aluno"]+'</h5></div></div></div></div>');
                     // $('#teste').append('Sem Alunos na Sala!');
                   }
               });
                 // alert(data);
               },
               error: function( xhr, status) {
               console.log( "Desculpe, não foi possivel encontrar alunos!" );
               $('.bloco_aluno').remove();
               // console.log(xhr);
               // console.log(status);
               }
               });
}

// loadlink(); // This will run on page load
setInterval(function(){
    loadlink() // this will run after every 5 seconds
}, 2000);


</script>
