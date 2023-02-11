<!-- Gastronomy WebPage
Authors: Elird Elshani & Gent Maloku
GPZa -->
<!DOCTYPE html>
<html>
<head>
<style>
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      border: 1px solid black;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>
  <h1>Admin Dashboard</h1>
  <table>
    <tr>
    
    </tr>
    <?php
      class Database
      {
        private $servername;
        private $username;
        private $password;
        private $dbname;
        private $conn;
    
        public function __construct($servername, $username, $password, $dbname)
        {
            $this->servername = $servername;
            $this->username = $username;
            $this->password = $password;
            $this->dbname = $dbname;
    
            $this->connect();
        }
    
        private function connect()
        {
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        }
    
        public function getData($table)
        {
            $sql = "SELECT userid, name, surname, email, status FROM $table";
            $result = $this->conn->query($sql);
    
            if ($result->num_rows > 0) {
                return $result;
            } else {
                return false;
            }
        }
    
        public function __destruct()
        {
            $this->conn->close();
        }
      }
      
      class Table
      {
        public function showData($result)
        {
            echo "<table><tr><th>User ID</th><th>Name</th><th>Surname</th><th>Email</th><th>Status</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["userid"] . "</td><td>" . $row["name"] . "</td><td>" . $row["surname"] . "</td><td>" . $row["email"] . "</td><td>" . $row["status"] . "</td></tr>";
                
            }
            echo "</table>";
        }
      }
      
      $db = new Database("localhost", "root", "", "testGastronomy");
      $data = $db->getData("users");
      
      if ($data) {
        $table = new Table();
        $table->showData($data);
      } else {
        echo "0 results";
      }
    ?>
  </table>
</body>
</html>