<?php session_start(); ?>
<?php if(!isset($_SESSION["logged-in"])) { header('Location: login.php'); } ?>
<?php include "autoload.php"; ?>
<?php

// TODO RECHTEN GOEDZETTEN
if ($rechten->getRechten("r_admin", $_SESSION["userid"]) === "0") {
    $content = $template->loadToegangError();
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       echo $crm->nieuweKlant($_POST["voornaam"], $_POST["achternaam"], $_POST["email"], hash("sha1", $_POST["wachtwoord"]), $_POST["address"], $_POST["postcode"], $_POST["nummer"], $_POST["plaats"]);
       $content = '<h1 class="mt-4">Klant Toevoegen</h1>';
       $content .= "<p>Klant is successvol toegevoegd</p>";
    
    } else {
        $content = '<h1 class="mt-4">Klant Toevoegen</h1>';
        $content .= $crm->nieuweKlantForm();
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