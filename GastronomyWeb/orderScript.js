/* Gastronomy Webpage
Authors: Elird Elshani & Gent Maloku
GPZa */

form.addEventListener('submit', e => {
  e.preventDefault();

  validate();
});


function validate() {
  var name = document.getElementById("name").value;
  var surname = document.getElementById("surname").value;
  var phone = document.getElementById("phone").value;
  var address = document.getElementById("address").value;

  var inner = document.getElementById("alert1");
  var inner1 = document.getElementById("alert2");
  var inner3 = document.getElementById("alert3");
  var inner4 = document.getElementById("alert4");


  if (!name.match(/^[a-zA-Z\-]+$/)) {

    inner.innerText = 'Name should only contain characters!';
  }

  if (!surname.match(/^[a-zA-Z\-]+$/)) {

    inner1.innerText = 'Surname should only contain characters!';
  }

  if (!phone.match(/^\d+$/)) {
    inner3.innerText = 'Please type in a functional phone number!';
  }

  if (!address.match(/^[a-zA-Z\-]+$/)) {
    inner4.innerText = 'Address can only contain characters!'
  }

  else {
    document.form.submit();
  }

}
