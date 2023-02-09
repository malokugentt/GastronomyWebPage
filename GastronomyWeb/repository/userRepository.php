<?php 
include '../database/databaseConnection.php';

class UserRepository{
    private $connection;

    function __construct(){
        $conn = new DBConnection;
        $this->connection = $conn->startConnection();
    }

    function insertUser($user){
        $conn = $this->connection;

        $id = $user->getId();
        $name = $user->getName();
        $surname = $user->getSurname();
        $email = $user->getEmail();
        $username = $user->getUsername();
        $password = $user->getPassword();

        $sql = "INSERT INTO user (userid,name,surname,email,username,password) VALUES (?,?,?,?,?)";
        
        $statement = $conn->prepare($sql);
        $statement->execute([$id,$name,$surname,$email,$username]);
        echo "<script> alert('User has been inserted successfuly!') </script>";
    }

    function getAllUsers(){
        $conn = $this->connection;

        $sql = "SELECT * FROM users";
        $statement = $conn->query($sql);
        $users = $statement->fetchAll();

        return $users;
    }

    function getUserByUsernameAndPassword($username,$password){
      
    }

    function getUserById($id){
      $conn = $this->connection;

      $sql = "SELECT * FROM users WHERE userid='$id'";
      $statement=$conn->query($sql);
      $user = $statement->fetch();

      return $user;
    }


    function updateUser($id,$name,$surname,$email,$username){
        $conn = $this->connection;

        $sql = "UPDATE users SET name=?,surname=?,email=?,username=? where userid=?";

        $statement = $conn->prepare($sql);

        $statement->execute([$name,$surname,$email,$username,$id]);
        echo "<script> alert('User has been updated successfuly!') </script>";
        
    }

    function deleteUserById($id){
        $conn = $this->connection;

        $sql = "DELETE FROM users WHERE userid=?";

        $statement = $conn->prepare($sql);
        $statement->execute([$id]);
        echo "<script> alert('User has been deleted successfuly!') </script>";
    }
}


?>