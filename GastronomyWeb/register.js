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



form.addEventListener('submit', e => {
	e.preventDefault();
	
	validate();
});


function validate(){
  var name = document.getElementById("name").value;
  var surname = document.getElementById("surname").value;
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;
  
 
  var inner = document.getElementById("alert1");
  var inner1 = document.getElementById("alert2");
  var inner3 = document.getElementById("alert3");
  var inner4 = document.getElementById("alert4");
  
  
  
 
  //Validimi i username-it
  if(!name.match(/^[a-zA-Z\-]+$/)){
    //alert("Username should only contain characters!");
    inner.innerText = 'Name should only contain characters!';
  }
  

  if(!surname.match(/^[a-zA-Z\-]+$/)){
    //alert("Username should only contain characters!");
    inner1.innerText = 'Surname should only contain characters!';
  }
  

  // Validimi i email-it
  if (!email.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/)) {
    inner3.innerText = 'Please type in a functional email!';
  }
 

  //Validimi i Password-it
  if(!password.match(/^[A-Z].*[0-9]{3}$/)){
      inner4.innerText = 'Password should start with an uppercase letter and end with 3 numbers!';

    }

   


   
   else
   {
    document.form.submit();
   }
   
    
}
  