<!-- Gastronomy WebPage
Authors: Elird Elshani & Gent Maloku
GPZa -->
<?php

class FormHandler {
    private $conn;

    public function __construct() {
        // Connect to the database
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
        if (isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["address"]) && 
            isset($_POST["city"]) && isset($_POST["phone"]) && isset($_POST["desc"])) {
            $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
            $surname = filter_var($_POST["surname"], FILTER_SANITIZE_STRING);
            $address = filter_var($_POST["address"],FILTER_SANITIZE_STRING);
            $city = filter_var($_POST["city"],FILTER_SANITIZE_STRING);
            $phone = filter_var($_POST["phone"],FILTER_SANITIZE_STRING);
            $desc = filter_var($_POST["desc"],FILTER_SANITIZE_STRING);

            if (!$name || !$surname || !$address || !$city || !$phone || !$desc) {
                echo "<script type='text/javascript'>alert('Error: Missing form data. All fields are required.');</script>";
                header('Refresh: 0; URL=register.html');
                return;
            }

            $stmt = $this->conn->prepare("INSERT INTO orders (name, surname, address, city, phone, orderdesc)
                                          VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssis", $name, $surname, $address, $city, $phone, $desc);
            $stmt->execute();
            header("Location:userpage.php");

           
        } else {
            echo "Error: Missing form data.";
        }
    }

    public function __destruct() {
        
        $this->conn->close();
    }
}

$formHandler = new FormHandler();
$formHandler->processForm();

?>

