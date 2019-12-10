<?php session_start(); ?>
<?php include "autoload.php"; ?>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($loginMedewerker->doLogin($_POST["email"], $_POST["wachtwoord"]) === true) {
        header('Location: index.php');
    } else {
        $content = "<div class='alert alert-danger'>Incorrect login. probeer het a.u.b. opnieuw</div>";
        echo $loginMedewerker->showLogin();
    }
} else {
    $content = $loginMedewerker->showLogin();
}
?>
<html>
<head>
    <title>KrasHosting CRM</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="assets/css/login.css" rel="stylesheet">
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
</head>
<body class="text-center"><?php echo $content; ?></body>
</html>