<?php session_start(); ?>
<?php if(!isset($_SESSION["logged-in"]) || !$_SESSION["medewerker"] === true) { header('Location: login.php'); } ?>
<?php include "autoload.php"; ?>
<?php $nieuws->verwijderenNieuws($_GET["id"]); ?>
<?php header('Location: nieuws.php'); ?>