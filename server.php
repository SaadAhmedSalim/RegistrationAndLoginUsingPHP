<?php

session_start();

// initialize variables
$usename = "";
$age = "";
$email = "";
$gender = "";
$pasword = "";
$cpasword = "";
$errors = array();  // for form validation


// connecting SQLiteDatabase

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "StudentCourse";

$connection = mysqli_connect($servername, $username, $password, $dbname);

  if (!$connection) {
          echo "Connection failed ";
        } else {
          echo "Connected Successfully <br>";
        }


//Register user
if (isset($_POST['signup'])) {
  // receive all input values from the form
  $usename = mysqli_real_escape_string($connection,$_POST['username']);
  $age = mysqli_real_escape_string($connection,$_POST['age']);
  $gender = mysqli_real_escape_string($connection,$_POST['gender']);
  $email = mysqli_real_escape_string($connection,$_POST['email']);
  $pasword = mysqli_real_escape_string($connection,$_POST['password']);
  $cpasword = mysqli_real_escape_string($connection,$_POST['cpassword']);

  // form validation

  if (empty($usename)) {array_push($errors, "Username is required"); }
  if (empty($age)) {array_push($errors, "Age is required"); }
  if (empty($gender)) {array_push($errors, "Gender is required"); }
  if (empty($pasword)) {array_push($errors, "Password is required"); }
  if (empty($email)) {array_push($errors, "Email is required"); }
  if ($pasword != $cpasword) {array_push($errors, "Password do not match!"); }

  // check database for existing user with same UserName or email

  $user_check_query = "SELECT * FROM registration WHERE username = '$usename' or email = '$email' LIMIT 1";

  $results = mysqli_query($connection, $user_check_query);
  $user = mysqli_fetch_assoc($results);

  // if user exists
  if ($user) {
        if ($user['username'] === $username) {array_push($errors, "User Name Already Exists!");}
        if ($user['email'] === $email) {array_push($errors, "Email Already Has Been Registered by an User!");}
    }

    //Register the user if no errors


  if (count($errors) == 0) {

        $password = md5($pasword);
        //print $password;
        $query = "INSERT INTO registration(username, age, gender, email, password) VALUES ('$usename', '$age', '$gender', '$email', '$password')";

        mysqli_query($connection,$query);
        $_SESSION['username'] = $usename;
        $_SESSION['success'] = "You are now logged in";

        header("location: dashboard.php");
      }

}

if (isset($_POST['login_btn'])) {

  $usename = mysqli_real_escape_string($connection, $_POST['username']);
  $pasword = mysqli_real_escape_string($connection, $_POST['password']);

  if (empty($usename)) {array_push($errors, "Username is required"); }
  if (empty($pasword)) {array_push($errors, "Password is required"); }


  if (count($errors) == 0) {
    
    $password = md5($pasword);

    $query = "SELECT * FROM registration WHERE username = '$usename' AND password = '$password'";
    $results = mysqli_query($connection, $query);

    if (mysqli_num_rows($results)) {

      $_SESSION['username'] = $usename;
      $_SESSION['success'] = "Successfully Logged In";
      header("location: dashboard.php");
    }else {
      array_push($errors, "Username/Password Wrong! Please Try Again.");
    }

  }

}




 ?>
