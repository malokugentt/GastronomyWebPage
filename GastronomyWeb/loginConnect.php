<!-- Gastronomy WebPage
Authors: Elird Elshani & Gent Maloku
GPZa -->
<?php
class Login {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "testGastronomy";
    private $conn;
    
    public function __construct() {
        
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        
        
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    
    public function verifyLogin() {
        
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $hashed_password = hash('sha512', $password);

        if ( !$username || !$email || !$password) {
            echo "<script type='text/javascript'>alert('Error: Missing form data. All fields are required.');</script>";
            header('Refresh: 0; URL=login.html');
            return;
        }

         
         if(!preg_match("/^[a-zA-Z0-9_]+$/", $username)){
            echo "<script type='text/javascript'>alert('Error: Username can only contain numbers, characters and underscores!');</script>";
            header('Refresh: 0; URL=login.html');
        }

        if (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/", $email)) {
            echo "<script type='text/javascript'>alert('Error: Please type in a functional email!');</script>";
            header('Refresh: 0; URL=login.html');
        }

         
         if(!preg_match("/^[A-Z].*[0-9]{3}$/", $password)){
            echo "<script type='text/javascript'>alert('Error: Password should start with an uppercase letter and end with 3 numbers!');</script>";
            header('Refresh: 0; URL=login.html');
        }
  
        
        
        $sql = "SELECT * FROM users WHERE username='$username' and email='$email' and password='$hashed_password'";
        $result = $this->conn->query($sql);
        
        
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            
            if ($user['status'] === 'admin') {
                
                session_start();
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['role'] = 'admin';
                
                
                header("Location: adminpage.php");
                exit;
            } else if ($user['status'] === 'user') {
                
                session_start();
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $username;
                
                
                header("Location: userpage.php");
                exit;
            }
        } else {
            
            echo "<script type='text/javascript'>alert('Username, Email or Password incorrect!');</script>";
            header('Refresh: 0; URL=login.html');
            exit;
        }
        
        
        $this->conn->close();
    }
}

$login = new Login();
$login->verifyLogin();

?>