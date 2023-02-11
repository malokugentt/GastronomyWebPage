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

$sql = "SELECT * FROM menuContent";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        
        echo "<div class=\"".$row["class"]."\">";
               echo  "<h2>".$row["header"]."</h2>";
                echo "<p>".$row["paragraph"]."</p>";
                echo "<p>Posted by: ".$row["author"]." </p>";
                echo "<a href=\"#\">".$row["price"]."</a>";
                
               echo  "<img src=\"".$row["image"]."\" class=\"contentphoto\">";
            echo "</div>";
          
    }
} else {
    echo "0 results";
}
$conn->close();
?>