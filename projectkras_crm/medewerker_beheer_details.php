<?php //if(!isset($_SESSION["logged-in"])) { header('Location: login.php'); } ?>
<?php include "autoload.php"; ?>
<?php
if ($rechten->getRechten("r_admin", $_SESSION["medewerker"]) === "0") {
    $content = $template->loadToegangError();
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Lezen & scrijven is wel ingebouwd echter niet in gebruik. 
        // Bewuste keuze misshien is het namelijk voor later wel nodig.
        
        // $rechten->setRechten("r_lezen", $_GET["id"], $_POST["r_lezen"]);
        // $rechten->setRechten("r_scrijven", $_GET["id"], $_POST["r_scrijven"]);

        $rechten->setRechten("r_verwijderen", $_GET["id"], $_POST["r_verwijderen"]);
        $rechten->setRechten("r_bewerken", $_GET["id"], $_POST["r_bewerken"]);
        $rechten->setRechten("r_admin", $_GET["id"], $_POST["r_admin"]);
        $content = "Gegevens zijn opgeslagen";
    
    } else {
        $content = '<h1 class="mt-4">Medewerker Beheer</h1>'; 
        $content .= $medewerkerBeheer->getMedewerker($_GET["id"]);
        $content .= '<h1 class="mt-4">Medewerker Rechten</h1>';
        $content .= '<form method="POST" action="">';
        $content .= $rechten->getRechtenLijst($_GET["id"]);
        $content .= '<input type="submit" value="Rechten opslaan">';
        $content .= '</form>';
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <?php echo $template->loadHead(); ?>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <div class="bg-light border-right" id="sidebar-wrapper"><?php echo $template->loadSidebar(); ?></div>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom"><?php echo $template->loadNav(); ?></nav>
            <div class="container-fluid">
                <?php echo $content; ?>
            </div>
        </div>
    </div>
    <?php echo $template->loadFooter(); ?>
</body>
</html>