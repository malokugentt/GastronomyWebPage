<!-- Gastronomy WebPage
Authors: Elird Elshani & Gent Maloku
GPZa -->
<html>
<head></head>
<body>
   
    
</body>
<?php
class OrdersTable {
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

    

    public function generateTable() {
        
        $sql = "SELECT * FROM orders";
        $result = $this->conn->query($sql);
        echo " <div class=\"maintable\">";
        echo "<a href=\"/GastronomyWeb/adminpage.php\" class=\"backbtn\">Return to Admin Page</a>";
        echo "<h1>Orders: </h1>";
        echo "<table>";
        echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Surname</th>";
        echo "<th>Address</th>";
        echo "<th>City</th>";
        echo "<th>Phone</th>";
        echo "<th>Description</th>";
        echo "</tr>";
        echo " </div>";

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["surname"] . "</td>";
                echo "<td>" . $row["address"] . "</td>";
                echo "<td>" . $row["city"] . "</td>";
                echo "<td>" . $row["phone"] . "</td>";
                echo "<td>" . $row["orderdesc"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data found</td></tr>";
        }

        echo "</table>";
    }

    public function __destruct() {
        
        $this->conn->close();
    }
}

$ordersTable = new OrdersTable();
$ordersTable->generateTable();
?>

</html>
<style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap");
*
{
    font-family: 'Montserrat', sans-serif;
    margin: 0;
    padding: 0;

}

header {

    background-color: #6d9d0b;
  width: 100%;
  padding: 10px;
  
}

 h1{
    
    text-align: center;
    color: #f2f2f2;
    padding: 10px;
}


body{
   background-color:#dddddd;
}

table {

margin: 0 auto;
width: 80%;
height: 500px;
padding: 0 auto;
 
}

th, td {
border: 1px solid #dddddd;
padding: 12px;
text-align: left;
border-radius: 10px;
box-shadow: rgba(0, 0, 0, 0.03) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
}

th {
background-color: #6d9d0b;
color: white;
}

tr {
background-color: #f2f2f2;
}

a {
background-color: #6d9d0b;
color: white;
padding: 10px;
text-decoration: none;
border-radius: 4px;
transition: 0.2s ease-in-out;
box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
}

.maintable{
    margin: 80px;
    margin-top: 50px;
    background-color: ghostwhite;
    padding:50px;
    align-items: center;
    border-radius: 30px;
    box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px inset, rgba(0, 0, 0, 0.09) 0px -3px 5px inset;
}

h1{
    font-family: 'Poppins',sans-serif;
    color: lightslategray;
    text-align: left;
    padding-left: 120px;
    margin:0 auto;
    margin-top: 10px;
}

.backbtn{
    margin-left: 120px;
   margin-bottom: 30px;
   margin-bottom: 20px;
}

a:hover {
background-color: #72eb3a;
}

@media (max-width: 600px) {
   table {
      width: 100%;
   }
   th, td, a {
      display:flex;
      border: none;
   }
   th {
      background-color: #337ab7;
      color: white;
   }
   tr:nth-child(even) {
      background-color: #f2f2f2;
   }
}
</style>

