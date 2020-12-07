<?php
// for tweet 2

require_once 'db_connect.php';
session_start();

$string = $_POST['tweet'];

$htag = "#";
$arr = explode(" ", $string);
$arrc = count($arr);
$i = 0;
$htag_saved = "";
while ($i < $arrc) {
  if (substr($arr[$i], 0, 1) === $htag) {
    $arr[$i] = '<a href="hashtag.php?tag='.$arr[$i].'">'.$arr[$i].'</a>';
    $htag_saved = $htag_saved.$arr[$i]." ";
  }
  $i++;
}
  $string = implode(" ", $arr);
  echo $string;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$user_id = $_SESSION["id"];
$string_saved = str_replace('#', '', $string);
$htag_saved = str_replace('#', '', $htag_saved);
$string_saved_db = ($string_saved);
$htag_saved_db = strip_tags($htag_saved);
$sql1 = "INSERT INTO `stuffs` (`id`, `tag`, `content`, `user_id`, `type` ,`date`) VALUES (NULL, '$htag_saved_db', '$string_saved_db', '$user_id', 'tweet',current_timestamp());";
$results = mysqli_query($conn, $sql1);
if ($results) {
  echo "ok";
  header("location: home_page.php");
}else {
  echo "not ok";
}
echo var_dump($results);
echo "<br>".$htag_saved."<br>".$string_saved."<br>".$user_id;

}
?>