<?php
session_start();

unset($_SESSION["logged-in"]);
unset($_SESSION["username"]);
unset($_SESSION["u_realname"]);
unset($_SESSION["medewerker"]);

session_destroy();

header("Location: index.php")
?>