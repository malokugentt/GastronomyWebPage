/* Gastronomy Webpage
Authors: Elird Elshani & Gent Maloku
GPZa */
const inputs = document.querySelectorAll(".input");

function focusFunc() {
  let parent = this.parentNode;
  parent.classList.add("focus");
}

function blurFunc() {
  let parent = this.parentNode;
  if (this.value == "") {
    parent.classList.remove("focus");
  }
}

inputs.forEach((input) => {
  input.addEventListener("focus", focusFunc);
  input.addEventListener("blur", blurFunc);
});



function validate(){
  alert("ffffffffff")
  // Marrim vlerat e inputit nga forma
  var name = document.getElementById("name").value;
  var surname = document.getElementById("surname").value;
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;

  // Validimi i emrit dhe mbiemrit
  if (!name.match(/^[A-Z][a-z]+$/)) {
    alert("Emri duhet të filloj me shkronjë të madhe dhe të përmbajë vetëm tekst!");
    return false;
  }
  if (!surname.match(/^[A-Z][a-z]+$/)) {
    alert("Mbiemri duhet të filloj me shkronjë të madhe dhe të përmbajë vetëm tekst!");
    return false;
  }

  // Validimi i emrit të përdoruesit
  if (username.length < 8 || username.length > 15) {
    alert("Emri i përdoruesit duhet të jetë me i gjatë se 8 karaktere dhe me i vogël se 15!");
    return false;
  }

  // Validimi i email-it
  if (!email.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/)) {
    alert("Email-i duhet të jete standart!");
  }
  //Validimi i Password-it
  if(!password.match(/^[A-Z].*[0-9]{3}$/)){
      alert("Passwordi duhet te filloj me shkronje te madhe dhe duhet te perfundoj me 3 numra.")
  }

  };
 
  /*
  document.getElementById("registerbtn").addEventListener("click",function(e){
    console.log("test")
    e.preventDefault();
    
    var name = document.getElementById("name").value;
    var surname = document.getElementById("surname").value;
    //var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
  
  
    // Validimi i emrit dhe mbiemrit
    if (!name.match(/^[A-Z][a-z]+$/)) {
      alert("Emri duhet të filloj me shkronjë të madhe dhe të përmbajë vetëm tekst!");
      e.preventDefault();
     // return false;
    }
    if (!surname.match(/^[A-Z][a-z]+$/)) {
      alert("Mbiemri duhet të filloj me shkronjë të madhe dhe të përmbajë vetëm tekst!");
      e.preventDefault();
     // return false;
    }
  
    // Validimi i emrit të përdoruesit
    if (username.length < 8 || username.length > 15) {
      alert("Emri i përdoruesit duhet të jetë me i gjatë se 8 karaktere dhe me i vogël se 15!");
      e.preventDefault();
     // return false;
    }
  
    // Validimi i email-it
    if (!email.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/)) {
      alert("Email-i duhet të jete standart!");
      e.preventDefault();
    }
    //Validimi i Password-it
    if(!password.match(/^[A-Z].*[0-9]{3}$/)){
        alert("Passwordi duhet te filloj me shkronje te madhe dhe duhet te perfundoj me 3 numra.")
        e.preventDefault();
    }
  })*/