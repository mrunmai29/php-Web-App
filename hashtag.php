<?php
require_once ('db_connect.php');
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
}
$id = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="style/images/TQ_logo.png" type="image/gif" sizes="16x16">
    <title>Tweet Tweet | Quak Quak</title>
    <link rel="stylesheet" href="style/home_page.css">
    <script src="https://kit.fontawesome.com/679fd07d5f.js" crossorigin="anonymous"></script>
    <!-- ******************************************************************************* -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/387d5ac1fe.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- ******************************************************************************* -->
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Caption&display=swap" rel="stylesheet">
<style>
* {
    margin: 0;
    padding: 0;
    font-family: 'PT Sans Caption', sans-serif;
}

body {
    background-color:  #0304059a;
}

pre {
    font-family: "PT Sans Caption", sans-serif;
    font-size: 1rem;
    line-height: 1.5;
    color: #b4bdc5;
}

.cont {
    font-family: "PT Sans Caption", sans-serif;
    font-size: 1rem;
    line-height: 1.5;
    color: #b4bdc5 !important;
}
</style>
</head>
<!-- ******************************************************************************* -->
<body>
<!-- ******************************************************************************* -->
<?php include 'nav2.php'; ?>
<!-- ******************************************************************************* -->
<div class="container m-auto">
<div class="row ">
<!-- ******************************************************************************* -->
<div class="col-8 bg-dark">
<div class="container rounded bg-light text-center p-3" style="background-color:rgba(0, 0, 0, 0.5);">
<h5 class="text-center mb-2 p-3">What's on your mind?</h5>
<h4 style="display: inline-block;" class="ml-5" ><a class="text-dark" href="#myModal1" data-toggle="modal" data-target="#myModal1"><i class="fa fa-file-image-o" aria-hidden="true"></i><br><span>Pic</span></a></h4>
<h4 style="display: inline-block;" class="ml-5" ><a class="text-dark" href="#myModal2" data-toggle="modal" data-target="#myModal2"><i class="fas fa-font"></i><br><span>Tweet</span></a></h4>
<h4 style="display: inline-block;" class="ml-5" ><a class="text-dark" href="#myModal3" data-toggle="modal" data-target="#myModal3"><i class="fas fa-quote-right"></i><br><span>Quote</span></a></h4>
<h4 style="display: inline-block;" class="ml-5 mr-5" ><a class="text-dark" href="#myModal4" data-toggle="modal" data-target="#myModal4"><i class="fas fa-align-center"></i><br><span>Story</span></a></h4>
</div>

<!-- ******************************************************************************* -->
<!-- Modal -->
<div class="modal fade" id="myModal4" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Post the story you want, here</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <form action="story_handle.php" method="post">
        <div class="form-group">
          <label for="exampleFormControlInput1">Title</label>
          <input name="title" type="title" class="form-control" id="exampleFormControlInput1" placeholder="I am thinking of...">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Write here..</label>
          <textarea name="story" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-dark">Post</button>
        </div>
      </div>
      </form>
      <!-- ******************* -->
    </div>
</div>
<!-- Modal2 -->
<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Post what you're thinking..</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <p>You can add hashtags to represent your topic of tweet.</p>
        <form action="tweet_handle.php" method="post">
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Write here..</label>
          <textarea name="tweet" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-dark">Post</button>
        </div>
      </div>
      </form>
      <!-- ******************* -->
    </div>
</div>
<!-- Modal3 -->
<div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Post what you're thinking..</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <form action="quote_handle.php" method="post">
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Write here..</label>
          <textarea name="quote" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-dark">Post</button>
        </div>
      </div>
      </form>
      <!-- ******************* -->
    </div>
</div>
<!-- Modal4 -->
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Please choose image/video you want to upload here</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <form action="film_handle.php" method="post" enctype="multipart/form-data">
        <input name="file" type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default">Close</button>
        </div>
      </div>
      <!-- ******************* -->
    </div>
</div>
<!-- ******************************************************************************* -->
<div class="container p-2 mt-3 text-center  text-light">
<h5>Following are results of #hashtag <?php echo $_GET['tag']; ?>!</h5>
</div>


<?php
$sql3 = "SELECT * FROM `stuffs` ORDER BY `date` DESC";
$results3 = mysqli_query($conn, $sql3);
$noresults = true;
while($row = mysqli_fetch_assoc($results3)){
  $tag = $row['tag'];
  $arr_tag = (explode(" ",$tag));
  
  if (in_array($_GET['tag'], $arr_tag)) {
    $content = $row['content'];
    $date_content = $row['date'];

    $dt = substr($date_content, 0, 10);
    $t_dt = date("Y-m-d");
    $diff = abs(strtotime($t_dt) - strtotime($dt));
    $years = floor($diff / (365*60*60*24));
    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
    $yr = "";
    $mn = "";
    $dy = "";
    $postfix = " ago";
    if ($years == 0) {
      $yr = "";
      if ($months == 0) {
        $mn = "";
        if ($days == 0) {
          $dy = "";
          $postfix = "today";
        }else{
          $dy = $days." days";
        }
      }else {
        $mn = $months." months";
      }
    }else {
      $yr = $years." years";
    }
    $str_dt = " ".$yr.$mn.$dy.$postfix;
    $user_content = $row['user_id'];
    $sql4 = "SELECT * FROM `users` WHERE `users`.`id` = '$user_content';";
    $results4 = mysqli_query($conn, $sql4);
    $row = mysqli_fetch_assoc($results4);
    if ($row) {
        $fname_of = $row['first_name'];
        $lname_of = $row['last_name'];
        $dp_id = $row['id'];
        $dp_name = "dp_".$dp_id;
        $username = $row['username'];
    }
  
    echo '<div class="mt-2 container rounded border border-secondary text-light pt-3 pb-3" style="background-color: rgb(47 47 47);">
    <img src="uploads/'.$dp_name.'.jpg" style="width: 50px; height: 50px;" class="rounded-circle border border-light img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="'.$fname_of.'">
    <span><b><a class="text-light" href="user_page_got.php?username='.$username.'">'.$fname_of.' '.$lname_of.'</a></b></span><small>'.$str_dt.'</small>
    <p class="cont pt-3">'.$content.'</p>
    <h3 class="text-light mt-2">
    <i class="fas fa-heart pl-4"></i>
    <i class="fa fa-comment pl-4" aria-hidden="true"></i>
    <i class="fa fa-share pl-4" aria-hidden="true"></i></h3>
    <form action="comment_handle.php" method="post">
    <div class="form-group">
    <div class="input-group mb-3">
    <input type="text" class="form-control bg-dark text-light" placeholder="comment here.." aria-label="Recipient\'s username" aria-describedby="basic-addon2">
    <div class="input-group-append">
    <button type="submit" class="btn btn-outline-light" type="button">Post</button>
    </div>
    </div>
    </div>
    </form>
    </div>';
    $noresults = false;
}
}
if ($noresults) {
    echo '<div class="container p-2 mt-3 text-center  text-light">
    <h3>NO RESULTS found of #hashtag '.$_GET["tag"].'!</h3>
    </div>';
}


?>



<!-- ******************************************************************************* -->
</div>
<!-- ******************************************************************************* -->
<div class="col-3 pt-3 bg-light">
<h4>Recent Posts</h4>
<hr class="bg-dark">
<b>Lora Daisy</b>
<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel, culpa...<a href="#">read more</a></p>
<hr>
<b>Lora Daisy</b>
<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel, culpa...<a href="#">read more</a></p>
<hr>
<b>Lora Daisy</b>
<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel, culpa...<a href="#">read more</a></p>
</div>
<!-- ******************************************************************************* -->
</div></div>

</body>
</html>








