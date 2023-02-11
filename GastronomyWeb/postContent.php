<!-- Gastronomy WebPage
Authors: Elird Elshani & Gent Maloku
GPZa -->
<?php

$db = mysqli_connect('localhost','root','','testGastronomy');


if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {

    
    $title = $_POST['title'];
    $description = $_POST['description'];
    $button_text = $_POST['button_text'];
    $button_link = $_POST['button_link'];
    $class = $_POST['class'];
    $author = $_POST['author'];
  

    
    $sql = "INSERT INTO content (title, description, button_text, button_link, class, author)
            VALUES ('$title', '$description', '$button_text', '$button_link', '$class', '$author')";

    if (mysqli_query($db, $sql)) {
       header("Location: postImage.html");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }

    mysqli_close($db);
}
?>
