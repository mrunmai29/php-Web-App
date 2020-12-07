<?php
require_once ('db_connect.php');
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
}
$id = $_SESSION['id'];

$username =  $_GET['username'];
if ($username == $_SESSION['username']) {
  header("location: user_page.php");
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="style/images/TQ_logo.png" type="image/gif" sizes="16x16">
    <title>Tweet Tweet | Quak Quak</title>
    <link rel="stylesheet" href="style/user_page.css">
    <script src="https://kit.fontawesome.com/679fd07d5f.js" crossorigin="anonymous"></script>
    <!-- ******************************************************************************* -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/387d5ac1fe.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- ******************************************************************************* -->
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Caption&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">

    </head>
<!-- ******************************************************************************* -->
<body>
<!-- ******************************************************************************* -->
<?php include 'nav2.php'; ?>
<!-- ******************************************************************************* -->

<?php
$username =  $_GET['username'];


$sql = "SELECT * FROM `users` WHERE `username` = '$username';";
$result  = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if ($row) {
        $fn = $row['first_name'];
        $ln = $row['last_name'];
        $dt = substr($row['date'], 0, 10);
        $bio = $row['bio'];
        $id = $row['id'];
        $dp_n = "dp_".$id;
        $flr = $row['followers'];
        $fln = $row['following'];
        $frnd = $row['friends'];
    
    }
?>



<div class="jmb text-dark jumbotron <b>jumbotron-fluid" style="font-family: 'Josefin Sans', sans-serif; text-transform: capitalize;">
  <div class="container">
  <div class="row">
  <div class="col-3">
  <img src="uploads/<?php echo $dp_n.".jpg";?>" class="rounded border border-light" alt="Cinque Terre" style="width: 100%; height:auto;">
  </div>
  <div class="col-9">
    <h1><?php echo $fn." ".$ln; ?></h1>
    <p><?php echo $bio;?></p>
    <p><?php echo "Date of joining: ".$dt;?></p>
    <p><a class="text-dark" href="#"><b><?php echo "Number of followers: ".$flr;?></b></a></p>
    <p><a class="text-dark" href="#"><b><?php echo "Number of following: ".$fln;?></b></a></p>
    <p><a class="text-dark" href="#"><b><?php echo "Number of friends: ".$frnd;?></b></a></p>
    <button type="button" class="btn btn-light"><a class="text-dark" href="_followers_handle.php?to_follow=<?php echo $username;?>">Follow</a></button>
    </div>
    </div>
  </div>
</div>
<div class="container mt-0">
    <hr class="bg-dark">
    




                <?php
                if (isset($_GET["tweet"]) && trim($_GET["tweet"]) == 'true'){
                    echo '<h3 class="text-dark"><a href="'.$_SERVER['REQUEST_URI'].'&tweet=false"><i class="fas fa-camera"></i></a></h3>
                    <div class="row">';
                    $sql3 = "SELECT * FROM `stuffs` WHERE `user_id` = ".$id." ORDER BY date DESC";
                    $results3 = mysqli_query($conn, $sql3);
                    
                    while($row = mysqli_fetch_assoc($results3)){
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
                      $str_dt = $yr.$mn.$dy.$postfix;

                      
                    echo '
                      <div class="mt-2 container rounded border border-light text-dark p-3">
                      <img src="uploads/'.$dp_n.'.jpg" style="width: 50px; height: 50px;" class="rounded-circle border border-light img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="'.$fn.'">
                      <span><b>'.$fn.' '.$ln.'</b></span>
                      <small>'.$str_dt.' </small>
                      <p class="cont pt-3">'.$content.'</p>
                      <h3 class="text-info mt-2">
                      <i class="fas fa-heart pl-4"></i>
                      <i class="fa fa-comment pl-4" aria-hidden="true"></i>
                      <i class="fa fa-share pl-4" aria-hidden="true"></i></h3>
                      <form action="comment_handle.php" method="post">
                    <div class="form-group">
                    <div class="input-group mb-3">
                    <input type="text" class="form-control bg-light text-dark" placeholder="comment here.." aria-label="Recipient\'s username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-outline-light" type="button">Post</button>
                    </div>
                  </div>
                    </div>
                  </form>
                  <hr>
                      </div>
                ';
                  }}else {
                      echo '<h3 class="text-dark"><a href="'.$_SERVER['REQUEST_URI'].'&tweet=true"><i class="fa fa-quote-right" aria-hidden="true"></i></a></h3>
                      <div class="row">';

                    $dir = "films/";

                    $arr = scandir($dir);
                    rsort($arr);
                    $sql2 = "SELECT * FROM `users` WHERE `users`.`id` = '$id'; ";
                    $results = mysqli_query($conn, $sql2);
                    
                    $row = mysqli_fetch_assoc($results);
                    if ($row) {
                    $i = 0;
                    
                      while ($arr[$i] !== "..") {
                        $src = "films/".$arr[$i];
                        $year = substr($arr[$i], 21, 4);
                        $month = substr($arr[$i], 4, 2);
                        $date = substr($arr[$i], 6, 2);
                        $hr = substr($arr[$i], 8, 2);
                        $min = substr($arr[$i], 10, 2);
                        $sec = substr($arr[$i], 12, 2);
                        if (substr($arr[$i], -2) !== "_") {
                            $num_ = -2;
                          }else{
                            $num_ = -1;
                          }
                      
                          $post_n = substr($arr[$i], $num_);
                          // echo substr($arr[$i], 20, 1)."<br>";
                          if (substr($arr[$i], 20, 1) !== "_") {
                            $num = 2;
                          }else{
                            $num = 1;
                          }
                          $user_id = substr($arr[$i], 19, $num);

                          $_po =  strpos($src,"_");
                          $_id = substr($src, $_po+1, 1);
                          // echo $user_id." ".$num."<br>";
                          // echo $src;
                          // echo "<br>";
                          // echo $user_id;
                          // echo "<br>";
                          
                          // echo "<br>";
                          if ($_id == $id) {
                            echo '
                            <div class="col-4 mt-2"><div class="card bg-light" style="width:100%; height: auto;">
                            <img class="card-img-top border border-light" src="'.$src.'" style="width:100%; height: 230px;" alt="Card image"></div>
                          </div>';
                          }
                    $i++;
                      }
                    }
                  }
                ?>

    </div>
</div>















</body>
</html>