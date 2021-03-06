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

foreach (glob("cms/class/*.php") as $bestend) { include $bestend; }

$mysql              = new mysqli($sqlHost, $sqlUsername, $sqlPassword, $sqlDatabase);
$template           = new Template(true);
$loginKlanten       = new LoginKlant();
$loginMedewerkers   = new LoginMedewerker();
$registratie        = new Registratie();
$pakketten          = new Pakketten();
$nieuws             = new Nieuws();
?>