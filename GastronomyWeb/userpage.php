<?php



session_start();

if(isset($_GET['logout'])) {
    session_destroy();

    header("Location: login.html");
   
    exit;
 }



// Get the user name from the session
$userName = $_SESSION['username'];

?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="website icon" type="png" href="images/websitelogo.png">
   <title>User Page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="useradminStyle.css">

</head>
<body>
   <header>
   <img src="images/pagelogo.png" class="logo" alt="">
   </header>


   
<div class="container">

   <div class="content">
      <h3>hi, <span>user</span></h3>
      <h1>welcome, <?php echo $userName; ?>!</h1> 
      <p>ready to order?</p>
     
      <a href="index.php" class="btn">Home</a>
      <a href="order.html" class="btn">Order</a>
      <a href="?logout=1" class="btn">logout</a>
   </div>

</div>

</body>
</html>