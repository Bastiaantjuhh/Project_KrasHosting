<?php
include "autoload.php";

$loginMedewerker = new LoginMedewerker();
?>
<!doctype html>
<html lang="nl">
    <head>
        <meta charset="utf-8" />
        <title>Inloggen</title>
    </head>
    <link rel="stylesheet" href="style/style.css">


    <style>
        input,label{
            display: block;
            margin: 0.3em;
            text-align: center;
        }
        a {
            color: white;
        }
    </style>
    <body>
    <div class="container">
        <div class="nav">
            <a href="index_KrasHosting.php">Home</a>
            <a href="pakketen.php">Pakketen</a>
            <a href="overons.php">Over ons</a>
            <a href="contact.php">Contact</a>
            <a href="inloggen.php" class="inloggen">Inloggen/registreren</a>
        </div>

        <div id="con">
            <h1>Log In</h1>
            <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                if ($loginMedewerker->doLogin($_POST["email"], $_POST["password"]) === true) {
                    echo "Welkom"; 
                } else {
                    echo "<div class='redbox'>Incorrect login. probeer het a.u.b. opnieuw</div>";
                }
            } else {
                echo $loginMedewerker->showLogin();
            }
            ?>
            <a href="inloggen.php"><button>Inloggen Klanten</button></a>
        </div>

    </div>
    </body>
</html>