<?php
// for story 4

require_once 'db_connect.php';
session_start();
$string = $_POST['quote'];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$user_id = $_SESSION['id'];
$sql1 = "INSERT INTO `stuffs` (`id`, `tag`, `content`, `user_id`, `type` ,`date`) VALUES (NULL, 'notag', '$string', '$user_id', 'quote',current_timestamp());";
$results = mysqli_query($conn, $sql1);
if ($results) {
  echo "ok";
  header("location: home_page.php");
}else {
  echo "not ok";
}
echo var_dump($results);

}
?>