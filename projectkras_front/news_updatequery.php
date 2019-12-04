<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//if ($mysql->connect_error) {
//    die("Connection failed: " . $mysql->connect_error);
//}
$mysql = new mysqli("localhost","root","root","krasproject");

$_SESSION["LOGGED_IN"] = TRUE;
//$_SESSION["USER"];

$datum1 = $mysql->real_escape_string($_POST["datum"]);
$title1=$mysql->real_escape_string($_POST["titel"]);
$autuer1=$mysql->real_escape_string($_POST["autuer"]);
$content1=$mysql->real_escape_string($_POST["content"]);
$id=$mysql->real_escape_string($_POST["id"]);

$sql = "UPDATE `news` SET `datum` ='{$datum1}' , `titel`='{$title1}' , `autuer` = '{$autuer1}' , `content` = '{$content1}' WHERE `id`={$id}";
$result = $mysql->query($sql);
var_dump($result);
?>