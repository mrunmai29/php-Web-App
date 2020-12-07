<?php
require_once ('db_connect.php');
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
}

$id = $_SESSION['id'];

?>


<?php
// $stuff="";
// for ($i=1; $i < 7; $i++) { 
//     $cookie_n = '"stuff'.$i.'"';
//     echo $cookie_n;
//     if(!isset($_COOKIE[$cookie_n])) {
//         $stuff.$i = "";
//       } else {
//         echo $_COOKIE[$cookie_n]."<br>";
//     }
// }
$array_of_stuff = [];
if(!isset($_COOKIE["stuff1"])) {
  $stuff1 = "";
} else {
  $stuff1 = $_COOKIE["stuff1"];
  array_push($array_of_stuff, $stuff1);
}

if(!isset($_COOKIE["stuff2"])) {
    $stuff2 = "";
  } else {
    $stuff2 = $_COOKIE["stuff2"];
    array_push($array_of_stuff, $stuff2);
  }

  if(!isset($_COOKIE["stuff3"])) {
    $stuff3 = "3";
  } else {
    $stuff3 = $_COOKIE["stuff3"];
    array_push($array_of_stuff, $stuff3);
  }

  if(!isset($_COOKIE["stuff4"])) {
    $stuff4 = "";
  } else {
    $stuff4 = $_COOKIE["stuff4"];
    array_push($array_of_stuff, $stuff4);
  }

  if(!isset($_COOKIE["stuff5"])) {
    $stuff5 = "";
  } else {
    $stuff5 = $_COOKIE["stuff5"];
    array_push($array_of_stuff, $stuff5);
  }

  if(!isset($_COOKIE["stuff6"])) {
    $stuff6 = "";
  } else {
    $stuff6 = $_COOKIE["stuff6"];
    array_push($array_of_stuff, $stuff6);
  }


?>

<!-- UPDATE `users` SET `stuff` = '{ [0]=> string(9) \"education\" [1]=> string(7) \"fashion\" [2]=> string(6) \"celebs\" [3]=> string(3) \"rel\" [4]=> string(6) \"trends\" [5]=> string(7) \"indmovi\" }' WHERE `users`.`id` = 1; -->


<?php
$stuff_array ="";
for ($i=0; $i < count($array_of_stuff); $i++) { 
    $stuff_array = $stuff_array.$array_of_stuff[$i]." ";
}
echo $stuff_array;

$sql1 = "UPDATE `users` SET `stuff` = '$stuff_array' WHERE `users`.`id` = $id;";
$result = mysqli_query($conn, $sql1);
if ($result) {
    header("location: home_page.php");
}else{
    header("location: home_page.php?stuff=0");
}



?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="style/images/TQ_logo.png" type="image/gif" sizes="16x16">
    <title>Tweet Tweet | Quak Quak</title>
    <link rel="stylesheet" href="style/home.css">
    <!-- ******************************************************************************* -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/387d5ac1fe.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- ******************************************************************************* -->
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Caption&display=swap" rel="stylesheet">
    <style>
    *{
        font-family: 'PT Sans Caption', sans-serif;
    }
    .heading {
        font-family: 'PT Sans Caption', sans-serif;
        font-size: 40px;
        margin-top: 50px;
        color: white;
    }
    .wc_txt{
    font-size: 50px;
    color: white;
    text-align: center;
    margin-top: 100px;
    }
    </style>
</head>
<!-- ******************************************************************************* -->
<body>
<!-- ******************************************************************************* -->
<div class="home_bk">
<!-- ******************************************************************************* -->
<div class="text-center p-2 ">
<a href="home.php"><img class="mb-3" src="style/images/TQ_logo.png" style="width: 50px; height: 50px;"></a>
<span class="heading text-center">Tweet tweet | Quack Quack</span>
</div>
<!-- ******************************************************************************* -->
<div class="mid_txt">
<p class="wc_txt">Welcome <?php echo $name;?>!</p>
<button type="button" class="btn ml-auto mr-auto btn-outline-light btn-lg w-25 btn-block" style="background-color: rgba(0, 0, 0, 0.301);"><b>Get Started</b></button>
<button type="button" class="btn ml-auto mr-auto btn-dark btn-lg w-25 btn-block">Already logged in</button>
<h5 class="text-light m-5"><i class="fa fa-bicycle fa-lg" aria-hidden="true"></i> Here you'll love to explore</h5>
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
</body>
</html> -->