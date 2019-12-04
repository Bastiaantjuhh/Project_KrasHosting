<?php

?>

<!DOCTYPE html>
<html>
<head>
<title>Index</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
    <div class="container">
        <div class="nav">
            <a href="index_KrasHosting.php">Home</a>
            <a href="pakketen.php">Pakketen</a>
            <a href="overons.php">Over ons</a>
            <a href="contact.php">Contact</a>
            <a href="inloggen.php" class="inloggen">Inloggen/registreren</a>
        </div>
    <div class="main">
        <div class="header">
            <h1 id="welkom">Welkom</h1>
            <h1 id="op">op</h1>
            <h1 id="kras">KrasHosting</h1>
        </div>

                <div id="slideshow">
                    <div class="slide-wrapper">



                    <?php
//
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
//mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

session_start();

$mysql = new mysqli("localhost","root","root","krasproject");

$id = $_SESSION["user"];

if ($mysql->connect_error) {
    die("Connection failed: " . $mysql->connect_error);
}



$sql = "SELECT  `id`, `datum`, `titel`, `auteur`, `content` FROM `news`";


$result = $mysql->query($sql);

// alles werkt tot nu

$r='';
$row='';
    while($row = $result->fetch_assoc()) {
        $r .= '<div class="slide">';

        $r .= '<h2>Titel: ' . htmlspecialchars($row['titel']);
        $r .= '</h2><br>';
      
        $r .= '<p>Datum: ' . htmlspecialchars($row['datum']);
        $r .= '</p><br>';
     
        
      
        $r .= '<p>' . htmlspecialchars($row['content']) . "</p>";
      
        $r .= "</div>";


    };

$mysql->close();

echo $r
?>


                        <!--
                        <div class="slide"> <a href="nieuwsberichten.php">Nieuwsberichten</a></div>
                        <div class="slide"> <a href="nieuwsberichten.php">Nieuwsberichten</a></div>
                        <div class="slide"> <a href="nieuwsberichten.php">Nieuwsberichten</a></div>
                        <div class="slide"> <a href="nieuwsberichten.php">Nieuwsberichten</a></div>
                        <div class="slide">5</div>-->
                    </div>
                </div>
    </div>

        <div class="overons">
            over ons

        </div>
        <div id="footing">
        <br><br><p id="footinfo"> © Copyright 2019 ROC Tilburg |
            Kasteeldreef, 3512 KJ Utrecht |
            Tel: +31306590005 |
            K.V.K. nr. 32084974 |
            BTW nr.NL170452785B01</p>
    </div>
    </div>
</body>
</html>