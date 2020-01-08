<?php session_start(); ?>
<?php if(!isset($_SESSION["logged-in"]) && !isset($_SESSION["klant"])) { header("Location: login.php"); } ?>