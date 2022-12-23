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
  var username = document.getElementById("username").value;
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;
 
  //Validimi i username-it
  if(!username.match(/^username.length < 8 || username.length > 15/)){
    alert("Username duhet te jete ma i gjate se 8 e me i shkurt se 15 karaktere");
  }

  // Validimi i email-it
  if (!email.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/)) {
    alert("Email-i duhet të jete standart!");
  }
  //Validimi i Password-it
  if(!password.match(/^[A-Z].*[0-9]{3}$/)){
      alert("Passwordi duhet te filloj me shkronje te madhe dhe duhet te perfundoj me 3 numra.")

    }
}