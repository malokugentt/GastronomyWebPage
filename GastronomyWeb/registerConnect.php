<!-- Gastronomy WebPage
Authors: Elird Elshani & Gent Maloku
GPZa -->
<?php

class FormHandler {
    private $conn;

    public function __construct() {
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "testGastronomy";

        $this->conn = new mysqli($servername, $username, $password, $dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function processForm() {
        if (isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["username"]) && 
            isset($_POST["email"]) && isset($_POST["password"]) ) {
            $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
            $surname = filter_var($_POST["surname"], FILTER_SANITIZE_STRING);
            $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
            $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
            $hashed = hash('sha512',$password);

            if (!$name || !$surname || !$username || !$email || !$password) {
                echo "<script type='text/javascript'>alert('Error: Missing form data. All fields are required.');</script>";
                header('Refresh: 0; URL=register.html');
                return;
            }
      
          
      
            
            

            //Validimi i emrit
            if(!preg_match("/^[a-zA-Z\-]+$/", $name) ){
                echo "<script type='text/javascript'>alert('Error: Name should only contain characters!');</script>";
                header('Refresh: 0; URL=register.html');
            }
          
            //Validimi i mbiemrit
            if(!preg_match("/^[a-zA-Z\-]+$/", $surname)){
                echo "<script type='text/javascript'>alert('Error: Surname should only contain characters!');</script>";
                header('Refresh: 0; URL=register.html');
            }
          
            //Validimi i email-it
            if (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/", $email)) {
                echo "<script type='text/javascript'>alert('Error: Please type in a functional email!');</script>";
                header('Refresh: 0; URL=register.html');
            }
          
            //Validimi i password-it
            if(!preg_match("/^[A-Z].*[0-9]{3}$/", $password)){
                echo "<script type='text/javascript'>alert('Error: Password should start with an uppercase letter and end with 3 numbers!');</script>";
                header('Refresh: 0; URL=register.html');
            }
          
            //Validimi i username-it
            if(!preg_match("/^[a-zA-Z0-9_]+$/", $username)){
                echo "<script type='text/javascript'>alert('Error: Username can only contain numbers, characters and underscores!');</script>";
                header('Refresh: 0; URL=register.html');
            }

            $checkUsername = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
            $checkUsername->bind_param("s", $username);
            $checkUsername->execute();
            $result = $checkUsername->get_result();

            if ($result->num_rows > 0) {
                echo "<script type='text/javascript'>alert('Error: Username already exists.');</script>";
                header('Refresh: 0; URL=register.html');
                return;
            }

          
      
            $stmt = $this->conn->prepare("INSERT INTO users (name, surname, username, email, password)
                                      VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $name, $surname, $username, $email, $hashed);
            $stmt->execute();
      
               echo "<script type='text/javascript'>alert('User registered!');</script>";
                header('Refresh: 0; URL=login.html');
        } 
      
        
        
        else {
            echo "Error: Missing form data.";
        }
        
    }
   
    public function __destruct() {
        // Close the database connection
        $this->conn->close();
    }
}

$formHandler = new FormHandler();
$formHandler->processForm();

?>