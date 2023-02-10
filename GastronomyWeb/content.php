<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testGastronomy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM content";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class=\"".$row["class"]."\">";
        echo "<h2>" . $row["title"] . "</h2>";
        echo "<p>" . $row["description"] . "</p>";
        echo "<p>Posted by: " . $row["author"] . "</p>";
        echo "<a href=".$row["button_link"]. ">" . $row["button_text"] . "</a>";
        echo "</div>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>