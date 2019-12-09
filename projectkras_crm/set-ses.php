<?php
include "autoload.php";
session_start();
var_dump($_SESSION);
echo $loginMedewerker->getUID();
echo "<h2>" . $_SESSION["userid"] ."</h2>";
echo $rechten->getRechten("r_admin", $_SESSION["userid"]);