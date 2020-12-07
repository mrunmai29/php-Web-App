<?php
require_once ('db_connect.php');
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
}

// to check if user already filled form or not

$id = $_SESSION['id'];
$dp = 'uploads/dp_'.$id;

if (file_exists($dp)) {
    header("location: home_page.php");
}


?>


<!-- ******************************************************************************* -->

<?php
$error = "";
if(isset($_POST["submit"])) {
   $img_name = $_FILES['img_dp']['name'];
   $img_tmp_name = $_FILES['img_dp']['tmp_name'];
   $img_size = $_FILES['img_dp']['size'];
   $img_type = $_FILES['img_dp']['type'];
   $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);
   $img_name = pathinfo($img_name, PATHINFO_FILENAME);
   $img_name = "dp_".$_SESSION['id'];

   $final_file = "uploads/".$img_name.".".$img_ext;

   $check = getimagesize($img_tmp_name);
   
   $error = "";
   if($check !== false) {
        $error = "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        $error = "File is not an image.";
        $uploadOk = 0;
      }
    if ($_FILES["img_dp"]["size"] > 500000) {
        $error = "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    if($img_type != "jpg") 
    {
        $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        $upload = move_uploaded_file($img_tmp_name, $final_file);
        header("location: getting_you_know.php");
    }else{
        $error = "Could not upload your dp.";
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
<h4>Welcome, You can upload your profile photo here.</h4>
<p>Only jpg files are accepted, try to upload file of ratio 1:1</p>
<form action="welcome_dp.php" method="post" enctype="multipart/form-data">
<span class="text-danger"><?php echo $error;?></span>
<div class="custom-file mb-3 mt-4 w-25">
    <input type="file" class="custom-file-input w-25" id="customFile" name="img_dp">
    <label class="custom-file-label" for="customFile">Choose image for DP</label>
</div>
<button type="submit" value="Upload Image" name="submit" class="btn ml-auto mr-auto btn-outline-light btn-lg w-25 btn-block" style="background-color: rgba(0, 0, 0, 0.301);"><b>Upload</b></button>
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