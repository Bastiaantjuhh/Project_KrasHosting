<?php //if(!isset($_SESSION["logged-in"])) { header('Location: login.php'); } ?>
<?php include "autoload.php"; ?>
<?php
if ($rechten->getRechten("r_verwijderen", $_SESSION["medewerker"]) === "0") {
    $content = $template->loadToegangError();
} else {
    $content = '<h1 class="mt-4">Klanten</h1>';
    $content .= '<p>Klant is naar het archief verplaatst</p>';
    $content .= $crm->doKlantToArchief($_GET["id"]);
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