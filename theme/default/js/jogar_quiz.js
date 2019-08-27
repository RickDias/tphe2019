
var currentTab = 1; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab
var clicado = false;
var type, i;

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
    document.getElementById("iniciar").style.display = "block";
  } else {
    // document.getElementById("prevBtn").style.display = "inline";
    document.getElementById("all_steps").style.display = "block";
    document.getElementById("iniciar").style.display = "none";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
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

  // console.log(n);
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 2 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();
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

function confere_resposta(tipo , n){
  // console.log();

  if(clicado === false){
    if(tipo == "V"){
      document.getElementById("resp_certa").style.display = "block";
    }else{
      document.getElementById("resp_errada").style.display = "block";
    }
  }

  var aux = 0;
  var aux2 = 4;
  if(n>0){
    aux= (aux+4)*n;
    aux2 = (aux2+4)*n;
  }
console.log(n);
  for (i = aux; i < aux2; i++) {
    $("#tab_"+n+" #div_resposta_"+i).removeClass("respostas_quiz");
    type = $("#tipo_resp_"+i).val();
    if(type == "F"){
      $("#div_resposta_"+i).addClass("result_resposta_err");
    }
    if(type == "V"){
      $("#div_resposta_"+i).addClass("result_resposta_certa");
    }
  }
  clicado = true;
}


var intervalo;

function tempo(op) {
    if (op == 1) {
		// document.getElementById('parar').style.display = "block";
		// document.getElementById('comeca').style.display = "none";
	}
	var s = 5;
	// var m = 0;
	// var h = 0;
	intervalo = window.setInterval(function() {

		if (s == 0) { s = 30; parar(); confere_resposta("F",0) }
		// if (m == 60) { h++; s = 0; m = 0; }
		// if (h < 10) document.getElementById("hora").innerHTML = "0" + h + "h"; else document.getElementById("hora").innerHTML = h + "h";
		if (s < 10) document.getElementById("segundo").innerHTML = "0" + s; else document.getElementById("segundo").innerHTML = s;
		// if (m < 10) document.getElementById("minuto").innerHTML = "0" + m + "m"; else document.getElementById("minuto").innerHTML = m + "m";
		s--;
	},1000);
}

function parar() {
	window.clearInterval(intervalo);
	// document.getElementById('parar').style.display = "none";
	// document.getElementById('comeca').style.display = "block";
}

function volta() {
	// document.getElementById('voltas').innerHTML += document.getElementById('hora').firstChild.data + "" + document.getElementById('minuto').firstChild.data + "" + document.getElementById('segundo').firstChild.data + "<br>";
}

function limpa() {
	// document.getElementById('voltas').innerHTML = "";
}
window.onload=tempo;
