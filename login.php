<?php

if (session_status()) {
  session_start();
  if (isset($_SESSION['loggedin'])) {
    header("location: welcome.php");
  }
}
// handle login

if (isset($_SESSION['usernmae'])) {
  header("location: welcome.php");
}
require_once('db_connect.php');

$username = $password = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (empty(trim($_POST['username'])) || empty(trim($_POST['password']))) {
    $error = "*Required input fields cannot be empty";
  }else{
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
  }
  if (empty($error)) {
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $param_username);
    $param_username = $username;

    if (mysqli_stmt_execute($stmt)) {
      mysqli_stmt_store_result($stmt);

      if (mysqli_stmt_num_rows($stmt) == 1) {
        mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);

        if (mysqli_stmt_fetch($stmt)) {
          if (password_verify($password, $hashed_password)) {
            session_start();
            $_SESSION["username"] = $username;
            $_SESSION["id"] = $id;
            $_SESSION["loggedin"] = true;
            
            header("location: welcome.php");
          }else{
            $error = "password entered is incorrect";
          }
        }
      }else{
        $error = "No such username exists";
      }
    }

  }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="style/images/TQ_logo.png" type="image/gif" sizes="16x16">
    <title>Tweet Tweet | Quak Quak</title>
    <link rel="stylesheet" href="style/signup.css">
    <!-- ******************************************************************************* -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/387d5ac1fe.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- ******************************************************************************* -->
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Caption&display=swap" rel="stylesheet">
</head>
<!-- ******************************************************************************* -->
<div class="signup_bk">
<!-- ******************************************************************************* -->
<?php
include 'nav.php';
?>
<!-- ******************************************************************************* -->
<div class="mid_txt">
<p class="middle_text">Tweet tweet | Quack Quack</p>
<h5 class="m-2">Login</h5>
<form action="login.php" method="post">
  <div class="form-group">
  <span class="text-danger"><?php echo $error;?></span>
    <input type="email" name="username" class="form-control w-25 ml-auto mr-auto" style="background-color: rgba(0, 0, 0, 0.301);"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-light">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <input type="password" name="password" class="form-control w-25 ml-auto mr-auto" style="background-color: rgba(0, 0, 0, 0.301);"  id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn ml-auto mr-auto btn-outline-light btn-lg w-25 btn-block" style="background-color: rgba(0, 0, 0, 0.301);"><b>Submit</b></button>
  <p class="form-text text-light mt-4">Have trouble logging? <a href="#" class="text-light">Click here.</a></p>
  <p class="form-text text-light">Don't have account? <a href="#" class="text-light">Signup here.</a></p>
</form>
<h5 class="text-light m-5"><i class="fa fa-bicycle fa-lg" aria-hidden="true"></i> Explore things you never know!</h5>
</div>
<!-- ******************************************************************************* -->
</div>
<!-- ******************************************************************************* -->
</body>
</html>