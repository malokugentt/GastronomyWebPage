<?php
// Connect to the database
$db = mysqli_connect('localhost','root','','testGastronomy');

// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// If the form is submitted
if (isset($_POST['submit'])) {

    // Get the form data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $button_text = $_POST['button_text'];
    $button_link = $_POST['button_link'];
    $class = $_POST['class'];
    $author = $_POST['author'];
  

    // Insert the data into the content table
    $sql = "INSERT INTO content (title, description, button_text, button_link, class, author)
            VALUES ('$title', '$description', '$button_text', '$button_link', '$class', '$author')";

    if (mysqli_query($db, $sql)) {
       header("Location: postImage.html");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }

    

    // Close the connection
    mysqli_close($db);
}
?>
