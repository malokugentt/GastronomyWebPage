<!-- Gastronomy WebPage
Authors: Elird Elshani & Gent Maloku
GPZa -->
<!DOCTYPE html>
<html lang="en">
<head>
  
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="website icon" type="png" href="images/websitelogo.png">
</head>
<body>
    <header>  
        <img src="images/pagelogo.png" class="logo" alt="">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="menupage.php">Menu</a></li>
            <li><a href="login.html">Log In</a></li>
            <li><a href="register.html">Register</a></li>
        </ul>
    </header>
    <section class="banner">
        <div class="imageBox">
          <?php include 'images.php'?>
         </div>
        <div class="contentBox">
        <?php include 'content.php'?>
            </div>
        </div>
        <ul class="controls">
            <li onclick="prevSlide();prevSlideText();"></li>
            <li onclick="nextSlide();nextSlideText();"></li>
        </ul>
    </section>
   <script src="script.js"></script>
</body>
</html>