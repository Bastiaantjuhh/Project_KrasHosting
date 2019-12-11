<?php session_start(); ?>
<?php if(!isset($_SESSION["logged-in"])) { header('Location: login.php'); } ?>
<?php include "autoload.php"; ?>
<?php
if ($rechten->getRechten("r_bewerken", $_SESSION["userid"]) === "0") {
    $content = $template->loadToegangError();
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $crm->klantBewerken($_GET["id"], $_POST["voornaam"], $_POST["achternaam"], $_POST["email"], $_POST["address"], $_POST["postcode"], $_POST["nummer"], $_POST["plaats"]);
        $content = '<h1 class="mt-4">Klant Bewerken</h1>';
        header("Location: klanten.php");
    } else {
        $content = '<h1 class="mt-4">Klant Bewerken</h1>';
        $content .= $crm->klantBewerkenForm($_GET["id"]);
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