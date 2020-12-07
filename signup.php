<?php

require_once 'db_connect.php';
session_start();
if (isset($_SESSION['loggedin'])) {
  header("location: welcome.php");
}

$username = $password = $confirm_password = "";
$username_error = $password_error = $confirm_password_error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if (empty(trim($_POST['username']))) {
    $username_error = "Username cannot be empty";
  }
  else{
    $sql = 'SELECT * FROM users WHERE username = ?';
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
      $param_username = trim($_POST['username']);
      mysqli_stmt_bind_param($stmt, 's', $param_username);
      
      if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) == 1) {
          $username_error = "username already taken";
        }
        else {
          $username = trim($_POST['username']);
        }
      }
      else {
        echo "somethimg went wrong";
      }
      mysqli_stmt_close($stmt);
    }
  }


// password checking

if (empty(trim($_POST['username']))) {
  $password_error = "password cannot be empty";
}
elseif(strlen(trim($_POST['password']))<5){
  $password_error = "password cannot be this short";
}else {
  $password = trim($_POST['password']);
}

//confirm password checking

if (empty(trim($_POST['username']))) {
  $confirm_password_error = "confirm password cannot be empty";
}
elseif(trim($_POST['password']) !== trim($_POST['confirm_password'])){
  $confirm_password_error = "confirm password should match ";
}

//executing sql

if (empty($username_error) && empty($password_error) && empty($confirm_password_error)) {
  $sql1 = 'INSERT INTO users (username, password) VALUES (?, ?)';
  $stmt = mysqli_prepare($conn, $sql1);
  if($stmt){
    mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

    $param_username = $username;
    $param_password = password_hash($password, PASSWORD_DEFAULT);

    if (mysqli_stmt_execute($stmt)) {
      header("location: login.php");
    }
    else{
      echo "something went wrong.. could not redirect..";
    }
  }
  mysqli_stmt_close($stmt);
mysqli_close($conn);
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
<h5 class="m-2">Sign Up</h5>
<form action="signup.php" method="post">
  <div class="form-group">
    <span class="text-danger"><?php echo $username_error;?></span>
    <input type="email" name="username" class="form-control w-25 ml-auto mr-auto" style="background-color: rgba(0, 0, 0, 0.301);"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-light">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
  <span class="text-danger"><?php echo $password_error;?></span>
    <input type="password" name="password" class="form-control w-25 ml-auto mr-auto" style="background-color: rgba(0, 0, 0, 0.301);"  id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
  <span class="text-danger"><?php echo $confirm_password_error;?></span>
    <input type="password" name="confirm_password" class="form-control w-25 ml-auto mr-auto" style="background-color: rgba(0, 0, 0, 0.301);"  id="exampleInputPassword1" placeholder="Confirm Password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">I agree <a href="#" class="text-light">Terms</a> and <a href="#" class="text-light">Privacy policy</a></label>
  </div>
  <button type="submit" class="btn ml-auto mr-auto btn-outline-light btn-lg w-25 btn-block" style="background-color: rgba(0, 0, 0, 0.301);"><b>Submit</b></button>
</form>
<h5 class="text-light m-5"><i class="fa fa-bicycle fa-lg" aria-hidden="true"></i> You are just few steps away</h5>
</div>
<!-- ******************************************************************************* -->
</div>
<!-- ******************************************************************************* -->
</body>
</html>