var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab
var clicado = false;
var type, i, pontuacao = 0;

function showTab(n) {
  clicado = false;
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  // console.log(x.length-1);
  if(n == 0){
    for(var y=1;y<x.length;y++){
      x[y].style.display = "none";
    }
  }else{
    // console.log(n);
    for(var y=0;y<=n;y++){
      x[y].style.display = "none";
      document.getElementById("final_jogo").style.display = "none";
    if(y!=n){
      continue;
    }
    x[n].style.display = "block";
  }
  }
  // document.getElementById("resp_errada").style.display = "none";
  // document.getElementById("resp_certa").style.display = "none";


  // ... and fix the Previous/Next buttons:
  if (n == 0 || n == (x.length-1)) {
    // document.getElementById("prevBtn").style.display = "none";
    document.getElementById("all_steps").style.display = "none";
    document.getElementById("score_quiz").style.display = "none";
    document.getElementById("iniciar").style.display = "none";
    if(n==0){
      document.getElementById("description").style.display = "block";
    }else{
      document.getElementById("final_jogo").style.display = "block";
    }
  } else {
    // document.getElementById("prevBtn").style.display = "inline";
    document.getElementById("all_steps").style.display = "block";
    document.getElementById("score_quiz").style.display = "block";
    document.getElementById("iniciar").style.display = "none";
    document.getElementById("description").style.display = "none";

  }
  // console.log(x.length);
  // console.log(n);
  if (n == (x.length-1)) {
    // document.getElementById("nextBtn").innerHTML = "Submit";
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

function confere_resposta(tipo , n, pontos, quiz, turma, pergunta_clicada,usuario,resposta){
  parar();
  $.ajax({
              type:"POST",
              url: "check_start.php",
              async:true,
              dataType : "json",
              data: {
                ver_esgotado:1,
                id_quiz:quiz,
                id_turma:turma
              },
              success: function( data ) {
                // console.log(data.ESGOTADO);
                var esg = data.ESGOTADO.toString();
                // console.log(esg);
                if(esg == 2){
                if(clicado === false){
                  if(tipo == "V"){
                    // document.getElementById("resp_certa").style.display = "block";
                    // pontuacao = parseFloat(pontuacao+Number(pontos));
                    var div_score = parseFloat($("#score_val").val());
                    var ponto_ganho = parseFloat(pontos);
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

                    // document.getElementById("resp_errada").style.display = "block";
                  }
                  mudaCores(n,pergunta_clicada);
                }
                clicado = true;
              }else{
                alert("Tempo esgotado! Aguarde a próxima rodada");
              }
              },
              error: function( xhr, status) {
              console.log(xhr);
              console.log(status);
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
