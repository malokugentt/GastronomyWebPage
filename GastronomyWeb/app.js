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

const form = document.getElementById("form");


form.addEventListener('submit', e => {
	e.preventDefault();
	
	validate();
});


function validate(){
  var username = document.getElementById("username").value;
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;
  var inner = document.getElementById("alert1");
  var inner1 = document.getElementById("alert2");
  var inner3 = document.getElementById("alert3");
  
 
  //Validimi i username-it
  if(!username.match(/^[a-zA-Z\-]+$/)){
    //alert("Username should only contain characters!");
    inner.innerText = 'Username should only contain characters!';
  }
  

  // Validimi i email-it
  if (!email.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/)) {
    inner1.innerText = 'Please type in a functional email!';
  }
 

  //Validimi i Password-it
  if(!password.match(/^[A-Z].*[0-9]{3}$/)){
      inner3.innerText = 'Password should start with an uppercase letter and end with 3 numbers!';

    }

   else
   {
    document.form.submit();
   }
    
}