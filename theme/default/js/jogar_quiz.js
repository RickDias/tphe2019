var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab
var clicado = false;
var type, i, pontuacao = 0;

function showTab(n) {
  clicado = false;

  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  if(n == 0){
    for(var y=1;y<x.length;y++){
      x[y].style.display = "none";
    }
  }else{
    for(var y=0;y<=n;y++){
      x[y].style.display = "none";
      document.getElementById("final_jogo").style.display = "none";
    if(y!=n){
      continue;
    }
    x[n].style.display = "block";
  }
  }

  // ... and fix the Previous/Next buttons:
  if (n == 0 || n == (x.length-1)) {
    document.getElementById("all_steps").style.display = "none";
    document.getElementById("score_quiz").style.display = "none";
    document.getElementById("iniciar").style.display = "none";
    if(n==0){
      document.getElementById("description").style.display = "block";
    }else{
      document.getElementById("final_jogo").style.display = "block";
    }
  } else {
    document.getElementById("all_steps").style.display = "block";
    document.getElementById("score_quiz").style.display = "block";
    document.getElementById("iniciar").style.display = "none";
    document.getElementById("description").style.display = "none";

  }
  if (n == (x.length-1)) {
    document.getElementById("resp_errada").style.display = "none";
    document.getElementById("resp_certa").style.display = "none";
    document.getElementById("timer_count").style.display = "none";
    document.getElementById("score_quiz").style.display = "none";
    document.getElementById("nextBtn").style.display = "none";
    document.getElementById("final_jogo").style.display = "block";
    // return false;
  } else {
    if (n == 0) {
      document.getElementById("nextBtn").innerHTML = "Iniciar";
    }else{
      document.getElementById("nextBtn").innerHTML = "Next";
    }
  }
  // ... and run a function that displays the correct step indicator:
  if(n > 0){
    fixStepIndicator(n-1)
    remove_fill_resp(4);//total de respostas
  }

}

function nextPrev(n) {
  tempo(1);
  var x = document.getElementsByClassName("tab");
  if (n == 2 && !validateForm()) return false;
  x[currentTab].style.display = "none";
  currentTab = currentTab + n;
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
  showTab(currentTab);
}

function validateForm() {
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  for (i = 0; i < y.length; i++) {
    if (y[i].value == "") {
      y[i].className += " invalid";
      valid = false;
    }
  }
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
    $("#num_step_"+i).html(i+1);
  }
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

function confere_resposta(id_pergunta, n, quiz, turma, resposta_clicada,usuario,id_resposta){
  parar();
  $.ajax({
              type:"POST",
              url: "check_start.php",
              async:true,
              dataType : "json",
              data: {
                ver_esgotado:1,
                id_quiz:quiz,
                id_turma:turma,
                id_resposta:id_resposta
              },
              success: function( data ) {
                var esg = data.ESGOTADO.toString();
                var tipo_resp_banco = data.TIPO;
                if(esg == 2){
                if(clicado === false){
                  if(data.TIPO == "V"){
                    var div_score = parseFloat($("#score_val").val());
                    var ponto_ganho = "0.5";
                    var p_total = parseFloat(div_score+ponto_ganho);
                    $.ajax({
                                type:"POST",
                                url: "check_start.php",
                                async:true,
                                dataType : "json",
                                data: {
                                  update_pontos:1,
                                  id_quiz:quiz,
                                  usuario:usuario,
                                  pontuacao:ponto_ganho,
                                  resposta:id_resposta,
                                  pergunta:id_pergunta
                                },
                                success: function( data ) {
                                  if(data == "Pergunta ja respondida!"){
                                    alert(data);
                                  }else{
                                    if(data == "Resposta não encontrada!"){
                                      alert(data);
                                    }else{
                                      $("#score_val").val(p_total);
                                    }
                                  }
                                },
                                  error: function( xhr, status) {
                                  console.log(xhr);
                                  console.log(status);
                                  }
                                  });
                  }else{

                    // document.getElementById("resp_errada").style.display = "block";
                  }
                  // console.log(tipo_resp_banco);
                  mudaCores(n,resposta_clicada,tipo_resp_banco);
                }
                clicado = true;
              }else{
                alert("Tempo esgotado! Aguarde a próxima rodada");
              }
              },
              error: function( xhr, status) {
              // console.log(xhr);
              // console.log(status);
              }
              }); //= checkEsgotado(quiz,turma);

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
    if(type == "o"){
      $("#tab_"+n+" #div_resposta_"+i).addClass("result_resposta_err");
    }
    if(type == "0"){
      $("#tab_"+n+" #div_resposta_"+i).addClass("result_resposta_certa");
    }
  }
}

// cronometro
var intervalo;
function tempo(op) {
	var s = 29;
	intervalo = window.setInterval(function() {
		if (s == 0) { s = 30; parar(); confere_resposta("F") }
    console.log(s);
		// if (s < 10) document.getElementById("segundo").innerHTML = "0" + s; else document.getElementById("segundo").innerHTML = s;
		s--;
	},1000);
}

function parar() {
	window.clearInterval(intervalo);
}
