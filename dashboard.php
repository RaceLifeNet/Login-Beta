<?php
session_start();
if(!isset($_SESSION['user'])){
   header("location: login.php");
}else{
   $name = $_SESSION['user'][2];
   $cash = $_SESSION['user'][3];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style.css">
   <title>Dashboard</title>
</head>
<body>
   <div class="dashboardContainer">
      <div class="avatar">
         <img src="avatar.png">
      </div>
      <div class="welcomeMessage">
      <b><?php echo $name ?></b> <strong> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Cash $<?php echo $cash ?></strong>
      </div>
      <a href="logout.php">Logout</a>
</body>
</html>