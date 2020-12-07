<?php
require_once ('db_connect.php');
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
}
$id = $_SESSION['id'];

$to_follow =  $_GET['to_follow'];
$username = $_SESSION['username'];


$sql = 




?>