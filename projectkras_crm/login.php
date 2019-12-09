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
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <style>
    html,
body {
  height: 100%;
}

body {

  -ms-flex-align: center;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.alert {
    width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>
</head>
<body class="text-center">

<?php echo $content; ?>


</body>
</html>