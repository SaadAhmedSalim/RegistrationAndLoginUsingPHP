<?php

session_start();

if (isset($_SESSION['username'])) {
  $_SESSION['msg'] = "You must log in first to view this page";
  header("location: login.php");
}

if (isset($_GET['logout'])) {

  session_destroy();
  unset($_SESSION['username']);
  header("location: login.php");
}

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Home Page</title>
   </head>
   <body>

     <h1>This is the Home Page</h1>
     <?php
     if (isset($_SESSION['success'])) : ?>

     <div>

       <h3>
         <?php
         echo $_SESSION['success'];
         unset($_SESSION['success']);
          ?>


       </h3>
     </div>
   <?php endif ?>

   //if the user logs in then it will show user Name

   <?php if (isset($_SESSION['username'])) : ?>

     <h3>Welcome <strong> <?php echo $_SESSION['username']; ?></strong></h3>
     <button> <a href="dashboard.php?logout='1' "></a></button>

  <?php endif ?>

   </body>
 </html>
