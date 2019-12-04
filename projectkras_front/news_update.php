<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//if ($mysqli->connect_error) {
//    die("Connection failed: " . $mysqli->connect_error);


//if (!isset($_SESSION["loggedin"]))
//    header("location:login.html");

$mysqli = new mysqli("localhost","root","root","krasproject");
$result = $mysqli->query("SELECT * FROM news WHERE id={$_GET['id']}");
$row = $result->fetch_assoc();
$date = $row["datum"];
$titel = $row["titel"];
$autuer = $row['autuer'];
$content = $row['content'];

?>

<!DOCTYPE html>

<html>
<head>
    <title>
       news opdracht
    </title>
</head>
<body>
<h1>NEWS - Update </h1>
<form method="post" action="news_updatequery.php">
    <input  name="id"  type="hidden" value="<?php echo $_GET["id"] ?>">
    <input name="datum" type="text" value="<?php echo $date ?>" placeholder="datum">
    <input  name="titel" type="text" value="<?php echo $titel ?>" placeholder="titel">
    <input  name="autuer" type="text" value="<?php echo $autuer ?>" placeholder="autuer">
    <input  name="content" type="text" value="<?php echo $content ?>" placeholder="content">
    <input name="bewaren"  type="submit" value="bewaren">
</form>
</body>
</html>


