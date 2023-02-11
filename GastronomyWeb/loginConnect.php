<?php
class Login {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "testGastronomy";
    private $conn;
    
    public function __construct() {
        // Connect to the database
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        
        // Verify the connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    
    public function verifyLogin() {
        // Get the login data
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        // Hashing the password
        $hashed_password = hash('sha512', $password);

        if ( !$username || !$email || !$password) {
            echo "<script type='text/javascript'>alert('Error: Missing form data. All fields are required.');</script>";
            header('Refresh: 0; URL=login.html');
            return;
        }

         //Validimi i username-it
         if(!preg_match("/^[a-zA-Z0-9_]+$/", $username)){
            echo "<script type='text/javascript'>alert('Error: Username can only contain numbers, characters and underscores!');</script>";
            header('Refresh: 0; URL=login.html');
        }

        if (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/", $email)) {
            echo "<script type='text/javascript'>alert('Error: Please type in a functional email!');</script>";
            header('Refresh: 0; URL=login.html');
        }

         //Validimi i password-it
         if(!preg_match("/^[A-Z].*[0-9]{3}$/", $password)){
            echo "<script type='text/javascript'>alert('Error: Password should start with an uppercase letter and end with 3 numbers!');</script>";
            header('Refresh: 0; URL=login.html');
        }
  
        
        // Verify the login data
        $sql = "SELECT * FROM users WHERE username='$username' and email='$email' and password='$hashed_password'";
        $result = $this->conn->query($sql);
        
        // Check if the user exists
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            // Check if the user is an admin
            if ($user['status'] === 'admin') {
                // Create the session
                session_start();
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['role'] = 'admin';
                
                // Redirect to the admin page
                header("Location: adminpage.php");
                exit;
            } else if ($user['status'] === 'user') {
                // Create the session
                session_start();
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $username;
                
                // Redirect to the index page
                header("Location: userpage.php");
                exit;
            }
        } else {
            // Redirect to the error page
            echo "<script type='text/javascript'>alert('Username, Email or Password incorrect!');</script>";
            header('Refresh: 0; URL=login.html');
            exit;
        }
        
        // Close the connection to the database
        $this->conn->close();
    }
}

$login = new Login();
$login->verifyLogin();

?>