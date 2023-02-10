<?php
// Connect to the database
$db = mysqli_connect('localhost','root','','testGastronomy');

// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// If the form is submitted
if (isset($_POST['submit'])) {

   
  
    $image_link = $_POST['image_link'];
    $class = $_POST['class'];

   

    // Insert the image link into the images table
    $sql = "INSERT INTO images (image_link,class)
            VALUES ('$image_link','$class')";

    if (mysqli_query($db, $sql)) {
        echo "<script type='text/javascript'>alert('Post created!');</script>";
        header('Refresh: 0; URL=index.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }

    // Close the connection
    mysqli_close($db);
}
?>