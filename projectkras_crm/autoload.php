<?php
// Voor debugging aan in live modus uit zetten.
$debug          = true;

// MySQL gegevens
$sqlHost        = "mysql";
$sqlUsername    = "root";
$sqlPassword    = "root";
$sqlDatabase    = "krasproject";

if ($debug === true) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

foreach (glob("class/*.php") as $bestend) { include $bestend; }

$mysql              = new mysqli($sqlHost, $sqlUsername, $sqlPassword, $sqlDatabase);
$template           = new Template();
$crm                = new CRM();
$loginMedewerker    = new Login();
$rechten            = new Rechten();
$medewerkerBeheer   = new Beheer();

session_start();
?>