/* Gastronomy Webpage
Authors: Elird Elshani & Gent Maloku
GPZa */


form.addEventListener('submit', e => {
	e.preventDefault();
	
	validate();
});


function validate(){
  var name = document.getElementById("name").value;
  var surname = document.getElementById("surname").value;
  var phone = document.getElementById("phone").value;
  
  
 
  var inner = document.getElementById("alert1");
  var inner1 = document.getElementById("alert2");
  var inner3 = document.getElementById("alert3");
 
  
  
  
  
 
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
  if (!phone.match(/^\d+$/)) {
    inner3.innerText = 'Please type in a functional phone number!';
  }
 

  
   


   
   else
   {
    document.form.submit();
   }
   
    
}
  