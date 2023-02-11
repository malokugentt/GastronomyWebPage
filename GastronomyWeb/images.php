<!-- Gastronomy WebPage
Authors: Elird Elshani & Gent Maloku
GPZa -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testGastronomy";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM images";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {

       echo  "<img src=\"".$row["image_link"]."\" alt=\"\" class=\"".$row["class"]."\">";
    }
       
   
} else {
    echo "0 results";
}
$conn->close();
?>