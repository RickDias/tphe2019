
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab
var clicado = false;

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
  }
}

function nextPrev(n) {
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

function confere_resposta(tipo){
  console.log(tipo);
  if(clicado === false){
    if(tipo == "V"){
      document.getElementById("resp_certa").style.display = "block";
    }else{
      document.getElementById("resp_errada").style.display = "block";
    }
    clicado = true;
  }
}
