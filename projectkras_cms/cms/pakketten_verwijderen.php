<?php session_start(); ?>
<?php if(!isset($_SESSION["logged-in"]) || !$_SESSION["medewerker"] === true) { header('Location: login.php'); } ?>
<?php include "autoload.php"; ?>
<?php $pakketten->verwijderenPakket($_GET["id"]); ?>
<?php header('Location: pakketten.php'); ?>