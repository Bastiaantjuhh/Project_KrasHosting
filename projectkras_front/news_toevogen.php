<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$_SESSION["LOGGED_IN"] = TRUE;
$_SESSION["IS ADMIN"] = TRUE;
//$_SESSION["USER"] = $_GET['USER'];


$mysql = new mysqli("localhost","root","root","krasproject");

$stmt = $mysql->prepare("INSERT INTO `news` (`datum`, `titel`, `auteur`, `content`) VALUES (?,?,?,?)");
$stmt->bind_param("ssss",$_POST['datum'],$_POST['titel'],"Medewerker",$_POST['content']);
//$stmt->bind_param($_POST['datum'], $_POST['title'],$_POST['autuer'],$_POST['content']);

$stmt->execute();
$stmt->close();
//header("location:index_KrasHosting.php");