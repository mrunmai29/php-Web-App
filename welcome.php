<?php
require_once ('db_connect.php');
session_start();

?>

<!-- ****************************************************************** -->
<?php
// check name exists or not

$id = $_SESSION['id'];
$sql = 'SELECT * FROM `users` WHERE `users`.`id` = '.$id.' ; ';
$result = mysqli_query($conn, $sql);
$row = $result -> fetch_assoc();
if ($row['first_name'] || $row['last_name'] || $row['bio']) {
  header("location: home_page.php");
}
?>
<!-- ****************************************************************** -->

<?php

$first_name = $last_name = $bio = "";
$error = $success = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

// prepare sql
$id = $_SESSION['id'];
$sql = 'SELECT * FROM `users` WHERE `users`.`id` = '.$id.' ; ';
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
  $first_name = $_POST['firstname'];
  $last_name = $_POST['lastname'];
  $bio = $_POST['bio'];
  $stmt = $conn->prepare("UPDATE `users` SET `first_name` = ? , `last_name` = ? , `bio` = ?  WHERE `users`.`id` = ".$id.";");
  $stmt->bind_param("sss", $first_name, $last_name, $bio);

  $stmt->execute();
  $success = "Updated Successfully!&#128578";
  $stmt->close();
  $conn->close();
  header("location: welcome_dp.php");
}else{
  $error = "Oops! Could not update, try after sometime.";
}

}
?>


<!-- ******************************************************************************* -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="style/images/TQ_logo.png" type="image/gif" sizes="16x16">
    <title>Tweet Tweet | Quak Quak</title>
    <link rel="stylesheet" href="style/welcome.css">
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
<body>
<!-- ******************************************************************************* -->
<div class="home_bk">
<!-- ******************************************************************************* -->
<?php include 'nav.php'; ?>
<!-- ******************************************************************************* -->
<div class="mid_txt mt-4">
<!-- <p class="middle_text">Tweet tweet | Quack Quack</p> -->
<h4>Welcome, Please fill the below fields.</h4>

<form action="welcome.php" method="post">
  <div class="form-group">
  <span class="text-danger"><?php echo $error;?></span>
  <span class="text-success"><?php echo $success;?></span>
    <input type="name" name="firstname" class="form-control w-25 ml-auto mr-auto mt-3"  id="exampleInputname1" aria-describedby="nameHelp" placeholder="Enter first name">
    <input type="name" name="lastname" class="form-control w-25 ml-auto mr-auto mt-3"  id="exampleInputname2" aria-describedby="nameHelp" placeholder="Enter last name">

  </div>
  <div class="form-group">
    <input type="Bio" name="bio" class="form-control w-25 ml-auto mr-auto"   id="exampleInputBio1" placeholder="Bio">
  </div>
  <button type="submit" class="btn ml-auto mr-auto btn-outline-light btn-lg w-25 btn-block" style="background-color: rgba(0, 0, 0, 0.301);"><b>Submit</b></button>
  <p class="form-text text-light mt-4">Wanna skip? <a href="getting_you_know.php" class="text-light">Click here.</a></p>
  <p class="form-text text-light">Wanna tell more? <a href="#" class="text-light">Click here.</a></p>
</form>


<h5 class="text-light m-5"><i class="fa fa-bicycle fa-lg" aria-hidden="true"></i> You came here, we are grateful!</h5>
</div>
<!-- ******************************************************************************* -->
<div class="text-light fixed-bottom">
    <ul>
        <li class="mr-2 ml-3" style="display:inline;"><a class="text-light" href="#"> Terms </a></li><li class="mr-2" style="display:inline;"><a class="text-light" href="#"> Privacy </a></li><li class="mr-2" style="display:inline;"><a class="text-light" href="#"> Jobs </a></li><li class="mr-2" style="display:inline;"><a class="text-light" href="#"> Support </a></li>
    </ul>
</div>
<!-- ******************************************************************************* -->
</div>
<!-- ******************************************************************************* -->
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
</body>
</html>