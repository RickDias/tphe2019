
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab
var clicado = false;
var type, i, pontuacao = 0;

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  document.getElementById("resp_errada").style.display = "none";
  document.getElementById("resp_certa").style.display = "none";
  clicado = false;

  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    // document.getElementById("prevBtn").style.display = "none";
    document.getElementById("all_steps").style.display = "none";
    document.getElementById("timer_count").style.display = "none";
    document.getElementById("score_quiz").style.display = "none";
    document.getElementById("iniciar").style.display = "block";
  } else {
    // document.getElementById("prevBtn").style.display = "inline";
    document.getElementById("all_steps").style.display = "block";
    document.getElementById("timer_count").style.display = "block";
    document.getElementById("score_quiz").style.display = "block";
    document.getElementById("iniciar").style.display = "none";
  }
  console.log(n);
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    if (n == 0) {
      document.getElementById("nextBtn").innerHTML = "Iniciar";
    }else{
      if(n == 10){
        document.getElementById("nextBtn").innerHTML = "Concluir";
      }else{
        document.getElementById("nextBtn").innerHTML = "Next";
      }
    }
  }
  // ... and run a function that displays the correct step indicator:
  if(n > 0){
    fixStepIndicator(n-1)
    remove_fill_resp(4);//total de respostas
  }

}

function nextPrevInd(n) {
  tempo(1);
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 2 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  // console.log(currentTab);
  // console.log(x.length);
  if (currentTab >= x.length) {
    parar();
    document.getElementById("resp_errada").style.display = "none";
    document.getElementById("resp_certa").style.display = "none";
    document.getElementById("timer_count").style.display = "none";
    document.getElementById("score_quiz").style.display = "none";
    document.getElementById("nextBtn").style.display = "none";
    document.getElementById("final_jogo").style.display = "block";
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function updateEsgotado(status,turma,quiz)
{
  console.log(status,turma,quiz);
        $.post('index_base.php?pag=quiz_admin&id_turma='+turma+'&id_quiz='+quiz+'&esgotado='+status, function(d)
        {
          if(status == 1){
            console.log('ESGOTADO');
          }
          if(status == 0){
            console.log('REINICIADO');
          }
            // $(answer).after("<span>Score Updated!</span>").remove();
        });
}

function updateRodada(rodada,quiz,turma)
{
  // alert("RODADA");
        $.post('index_base.php?pag=quiz_admin&id_turma='+turma+'&id_quiz='+quiz+'&rodada='+rodada, function(d)
        {
            console.log('Update rodada');
            // $(answer).after("<span>Score Updated!</span>").remove();
        });
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  // console.log(x);
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
    $("#num_step_"+i).html(i+1);
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}

function remove_fill_resp(n){
  var aux = 0;
  var aux2 = 4;
  if(n>0){
    aux= (aux+4)*n;
    aux2 = (aux2+4)*n;
  }

  for (i = aux; i < aux2; i++) {
    type = $("#tipo_resp_"+i).val();
    if(type == "F"){
      $("#div_resposta_"+i).removeClass("result_resposta_err");
    }else{
      $("#div_resposta_"+i).removeClass("result_resposta_certa");
    }
    $("#tab_"+i+" div").addClass("respostas_quiz");
  }
}

function confere_resposta_ind(tipo , n, pontos,quiz,usuario,resposta,pc){
  parar();
  // console.log();
  // if(clicado === false){
  //   if(tipo == "V"){
  //     document.getElementById("resp_certa").style.display = "block";
  //     pontuacao = pontuacao+Number(pontos);
  //     $("#score_val").val(pontuacao);
  //   }else{
  //     document.getElementById("resp_errada").style.display = "block";
  //   }
  //   mudaCores(n);
  // }
  if(clicado === false){
    if(tipo == "V"){
      document.getElementById("resp_certa").style.display = "block";
      pontuacao = parseFloat(pontuacao+Number(pontos));
      var div_score = parseFloat($("#score_val").val());
      var p_total = parseFloat(div_score+pontuacao);
      $.ajax({
                  type:"POST",
                  url: "check_start.php",
                  async:true,
                  dataType : "json",
                  data: {
                    update_pontos:1,
                    id_quiz:quiz,
                    usuario:usuario,
                    pontuacao:pontos,
                    resposta:resposta
                  },
                  success: function( data ) {
                    console.log(data);
                    if(data == "Pergunta ja respondida!"){
                      alert(data);
                    }else{
                      $("#score_val").val(p_total);
                    }
                  },
                    error: function( xhr, status) {
                    console.log(xhr);
                    console.log(status);
                    }
                    });
    }else{
      document.getElementById("resp_errada").style.display = "block";
    }
  }
  mudaCores(n,pc);
  clicado = true;
}

function mudaCores(n,pc){
  var aux = 0;
  var aux2 = 4;
  if(n>0){
    aux= (aux+4)*n;
    aux2 = (aux2+4)*n;
  }

  for (i = 0; i < aux2; i++) {
    $("#tab_"+n+" #div_resposta_"+i).removeClass("respostas_quiz");
    if(i == pc){
      $("#tab_"+n+" #div_resposta_"+i).addClass("result_resposta_sel");
      continue;
    }
    type = $("#tab_"+n+" #tipo_resp_"+i).val();
    if(type == "F"){
      $("#tab_"+n+" #div_resposta_"+i).addClass("result_resposta_err");
    }
    if(type == "V"){
      $("#tab_"+n+" #div_resposta_"+i).addClass("result_resposta_certa");
    }
  }
}

// cronometro
var intervalo;
function tempo(op) {
	var s = 29;
  // var s = 2;

	intervalo = window.setInterval(function() {
		if (s == 0) {s = 30; parar(); confere_resposta_ind("F");}
		if (s < 10) document.getElementById("segundo").innerHTML = "0" + s; else document.getElementById("segundo").innerHTML = s;
		s--;
	},1000);
}



function parar() {
	window.clearInterval(intervalo);
}
