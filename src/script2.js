/* dentist drop down function  DENTIST */
function myFunctionDentist() {
  document.getElementById("myDropdownDentist").classList.toggle("show");
 document.getElementById("myDropdownClinic").classList.remove("show");
  document.getElementById("myDropdownAppointment").classList.remove("show");
  document.getElementById("myDropdownBill").classList.remove("show");
}

/* dentist drop down function  CLINIC */
function myFunctionClinic() {
  document.getElementById("myDropdownClinic").classList.toggle("show");
  document.getElementById("myDropdownDentist").classList.remove("show");
  document.getElementById("myDropdownAppointment").classList.remove("show");
  document.getElementById("myDropdownBill").classList.remove("show");
}
/* dentist drop down function  appointment */
function myFunctionAppointment() {
  document.getElementById("myDropdownAppointment").classList.toggle("show");
  document.getElementById("myDropdownDentist").classList.remove("show");
  document.getElementById("myDropdownClinic").classList.remove("show");
  document.getElementById("myDropdownBill").classList.remove("show");
}

/* dentist drop down function  bill */
function myFunctionBill() {
	document.getElementById("myDropdownBill").classList.toggle("show");
  document.getElementById("myDropdownAppointment").classList.remove("show");
  document.getElementById("myDropdownDentist").classList.remove("show");
  document.getElementById("myDropdownClinic").classList.remove("show");
}



// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn') ) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}



/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}