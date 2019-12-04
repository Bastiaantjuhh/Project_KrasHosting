<?php
// FOR DEBUGGING ONLY
$debug          = true;
$sqlHost        = "127.0.0.1";
$sqlUsername    = "root";
$sqlPassword    = "root";
$sqlDatabase    = "krasproject";

if ($debug === true) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

include "class/login.interface.class.php";
include "class/login.klanten.class.php";
include "class/login.medewerker.class.php";
include "class/registratie.class.php";

$mysql = new mysqli($sqlHost, $sqlUsername, $sqlPassword, $sqlDatabase);

session_start();
?>