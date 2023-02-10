<?php



session_start();

if(isset($_GET['logout'])) {
   session_destroy();
   header("Location: login.html");
   exit;
}




// Get the admin name from the session
$adminName = $_SESSION['username'];

?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="website icon" type="png" href="images/websitelogo.png">
   <title>Admin Page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="useradminStyle.css">

</head>
<body>
   <header>
   <img src="images/pagelogo.png" class="logo" alt="">
   </header>
   
<div class="container">

   <div class="content">
      <h3>hi, <span>admin</span></h3>
      <h1>Welcome, <?php echo $adminName; ?>!</h1>
     
      <a href="view/dashboard.php" class="btn">Users</a>
      <a href="ordersTable.php" class="btn">Orders</a>
      <a href="?logout=1" class="btn">logout</a>
   </div>

</div>

</body>
</html>