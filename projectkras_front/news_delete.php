<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

session_start();
//
//if (!isset($_SESSION["logged_in"]))
//   echo "Session faild";

//$_SESSION["USER"] = $_GET['USER'];
$_SESSION["LOGGED_IN"] = TRUE;
$_SESSION["IS ADMIN"] = TRUE;




$mysql = new mysqli("localhost","root","root","krasproject");

if ($mysql->connect_error) {
    die("Connection failed: " . $mysql->connect_error);
}

$sql ="DELETE FROM news WHERE id ={$_GET['id']}";
$result = $mysql->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>
        delete
    </title>
</head>
<body>
<h1>verwijderen</h1>

<form method="get" action="news_read.php">
    <input type="text" value="" placeholder="voornaam">
    <input type="text" value="" placeholder="achternaam">
    <input type="submit" value="Submit">
</form>
</body>
</html>

