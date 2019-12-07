<?php include "autoload.php"; ?>
<?php $pakketten->verwijderenPakket($_GET["id"]); ?>
<?php header('Location: pakketten.php'); ?>