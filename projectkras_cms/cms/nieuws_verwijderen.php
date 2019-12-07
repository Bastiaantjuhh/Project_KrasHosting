<?php include "autoload.php"; ?>
<?php $nieuws->verwijderenNieuws($_GET["id"]); ?>
<?php header('Location: nieuws.php'); ?>