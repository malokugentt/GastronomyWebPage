<!-- Gastronomy WebPage
Authors: Elird Elshani & Gent Maloku
GPZa -->
<?php

$db = mysqli_connect('localhost','root','','testGastronomy');

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_POST['submit'])) {
  
    $image_link = $_POST['image_link'];
    $class = $_POST['class'];

    
    $sql = "INSERT INTO images (image_link,class)
            VALUES ('$image_link','$class')";

    if (mysqli_query($db, $sql)) {
        echo "<script type='text/javascript'>alert('Post created!');</script>";
        header('Refresh: 0; URL=index.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }

    mysqli_close($db);
}
?>