<?php
include "autoload.php";

?>
<!doctype html>
<html lang="nl">
    <head>
        <meta charset="utf-8" />
        <title>Inloggen</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://getbootstrap.com/docs/4.3/examples/sign-in/signin.css" rel="stylesheet">
        <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
            font-size: 3.5rem;
            }
        }
        </style>
    </head>
    <body class="text-center">
    <div class="container">
        <div id="con">
            <h1>Log In</h1>
            <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                if ($loginMedewerker->doLogin($_POST["email"], $_POST["password"]) === true) {
                    $_SESSION["logged-in"]  = true;
                    header('Location: index.php');

                    
                } else {
                    echo "<div class='redbox'>Incorrect login. probeer het a.u.b. opnieuw</div>";
                }
            } else {
                echo $loginMedewerker->showLogin();
            }
            ?>
        </div>

    </div>
    </body>

    
</html>