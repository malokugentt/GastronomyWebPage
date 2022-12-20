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


        //Validimi i emrit
        var nameRegex = /^[/^[A-Z][a-zA-Z ]/;

        //Validimi i mbiemrit
        var surnameRegex =/^[/^[A-Z][a-zA-Z ]/;

        //Validimi i username-it
        var usernameRegex =/^username.length < 8 || username.length > 15/

        //Validimi i email-it
        var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

        //Validimit i password-it
        var passwordRegex = /^[A-Z].*\d{3}/;

        var registerButton = document.getElementById("registerbutton");
        var namemsg = document.getElementById("nameMessage");
        var surnameemsg = document.getElementById("surnameMessage");
        // var usernmaemsg = document.getElementById("usernameMessage");
        var emailmsg = document.getElementById("emailMessage");
        var passwordmsg = document.getElementById("passwordMessage");
        

        registerButton.addEventListener("click", function(event){
         var name = document.getElementById("name").value;
         var surname = document.getElementById("surname").value;
         var username = document.getElementById("username").value;
         var email = document.getElementById("email").value;
         var password = document.getElementById("password").value;
        
         if(name == ""){
            namemsg.innerText="Fill Name"
            event.preventDefault();
         }else{
            if(nameRegex.test(name)){
              namemsg.innerText="Nuk u plotesua me sukses";
            }else{
                namemsg.innerText="U plotsua me sukses"
                event.preventDefault();
            }
         }
         if(surname == ""){
            surnameemsg.innerText="Fill Surname"
            event.preventDefault();
         }else{
            if(surnameRegex.test(surname)){
                alert("Surname:" + surname)
            }else{
                surnameemsg.innerText="U plotsua me sukses"
                event.preventDefault();
            }
         }
        //  if(username == ""){
        //     usernmaemsg.innerText="Fill Username"
        //     event.preventDefault();
        //  }else{
        //     if(usernameRegex.test(username)){
        //         alert("Username:" + username)
        //     }else{
        //         usernmaemsg.innerText="U plotsua me sukses"
        //         event.preventDefault();
        //     }
        //  }
         if(email == ""){
            emailmsg.innerText="Fill Email"
            event.preventDefault();
         }else{
            if(emailRegex.test(email)){
                alert("Email:" + email)
            }else{
                emailmsg.innerText="U plotsua me sukses"
                event.preventDefault();
            }
         }
         if(password == ""){
            passwordmsg.innerText="Fill Password"
            event.preventDefault();
         }else{
            if(passwordRegex.test(password)){
                alert("Password:" + password)
            }else{
                passwordmsg.innerText="U plotsua me sukses"
                event.preventDefault();
            }
         }
        }
        )
