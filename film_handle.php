<?php
require_once 'db_connect.php';
session_start();
date_default_timezone_set('Asia/Kolkata');
$error = "";
$id = $_SESSION['id'];
$sql = "SELECT * FROM `users` WHERE `users`.`id` = $id;";
$results = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($results);
if ($row > 1) {
    $no_of_posts = $row['no_of_posts'];
}
echo $no_of_posts;
$no_of_posts = $no_of_posts + 1;

$date_time = date("YmdHis");

$sql1 = "UPDATE `users` SET `no_of_posts` = '$no_of_posts' WHERE `users`.`id` = $id;";
$results1 = mysqli_query($conn, $sql1);
if ($results1) {
    echo "done...";
}




if(isset($_POST["submit"])) {
   $img_name = $_FILES['file']['name'];
   $img_tmp_name = $_FILES['file']['tmp_name'];
   $img_size = $_FILES['file']['size'];
   $img_type = $_FILES['file']['type'];
   $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);
   $img_name = pathinfo($img_name, PATHINFO_FILENAME);
   $img_name = $date_time."file_".$_SESSION['id']."_post_".$no_of_posts;

   $final_file = "films/".$img_name.".".$img_ext;

   
   if(isset($_POST["submit"])) {
    $check = getimagesize($img_tmp_name);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
    }
   }
   
    if(move_uploaded_file($img_tmp_name, $final_file)){
        echo "ok";
        header("location: home_page.php");
    }
}
?>