<?php session_start(); ?>
<?php
include "autoload.php";

$content = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($loginKlanten->doLogin($_POST["email"], $_POST["wachtwoord"]) === true) {
        //header('Location: index.php');
        echo "successvol";
    } else {
        $content = "<div class='alert alert-danger'>Incorrect login. probeer het a.u.b. opnieuw</div>";
        echo $loginKlanten->showLogin();
    }
} else {
    $content = $loginKlanten->showLogin();
}

echo $content;
?>

