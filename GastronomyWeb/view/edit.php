<?php
include_once '../repository/userRepository.php';

$userId = $_GET['id'];

$userRepository = new UserRepository();

$user = $userRepository->getUserById($userId);




?>

<style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');

    form {
        font-family: 'Montserrat', sans-serif;
  width: 500px;
  margin: 50px auto;
  padding: 20px;
  background-color: #f2f2f2;
  border-radius: 10px;
}

p {
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 10px;
}

input[type="text"], input[type="password"] {
  width: 100%;
  padding: 12px 20px;
  margin-bottom: 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
}

input[type="submit"] {
  width: 100%;
  padding: 12px 20px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
}

input[type="submit"]:hover {
  background-color: #3e8e41;
}

</style>


<form action="" method="POST">
        <p>ID:</p><input type="text" name="id" value="<?=$user['userid']?>" readonly> <br><br>
        <p>Name:</p><input type="text" name="name" value="<?=$user['name']?>"> <br><br>
       <p>Surname:</p> <input type="text" name="surname" value="<?=$user['surname']?>"> <br><br>
       <p>Email:</p> <input type="text" name="email" value="<?=$user['email']?>"> <br><br>
       <p>Username:</p> <input type="text" name="username" value="<?=$user['username']?>"> <br><br>
       
      

        <input type="submit" name="save" value="Save"> <br><br>
</form>


<?php
if(isset($_POST['save'])){
    $id = $userId;
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    

    $userRepository->updateUser($id,$name,$surname,$email,$username,$password);
    header("location:dashboard.php");
}

?>